<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Pedido, ItemPedido, Carrinho, ItemCarrinho, ProdutoVariacao};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Log};

class PedidoController extends Controller
{
    /**
     * Lista os pedidos do Próprio Usuário (Meus Pedidos)
     */
    public function index()
    {
        $pedidos = Pedido::where('user_id', Auth::id())
            ->with(['itens.produto', 'pagamento']) // Eager loading leve
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * O Coração do E-commerce: Transformar Carrinho em Pedido
     */
    public function store(Request $request)
    {
        // 1. Validar entrega
        $request->validate([
            'tipo_entrega' => 'required|in:entrega_domicilio,retirada_loja',
            // Adicione validação de endereço aqui se necessário
        ]);

        $user = Auth::user();
        
        // Busca o carrinho com os produtos e variações para checar estoque
        $carrinho = Carrinho::with(['itens.produto', 'itens.variacao'])
                    ->where('user_id', $user->id)
                    ->first();

        if (!$carrinho || $carrinho->itens->isEmpty()) {
            return redirect()->route('loja.index')->with('error', 'Seu carrinho está vazio.');
        }

        // Filtra itens se vier do front (checkbox), senão pega todos
        $itensParaProcessar = $request->has('itensSelecionados') 
            ? $carrinho->itens->whereIn('id', $request->itensSelecionados)
            : $carrinho->itens;

        // INÍCIO DA TRANSAÇÃO (Tudo ou Nada)
        return DB::transaction(function () use ($user, $itensParaProcessar, $request, $carrinho) {
            try {
                // 1. Cria o Pedido (Cabeçalho)
                $pedido = Pedido::create([
                    'user_id' => $user->id,
                    'status' => 'pendente', // Aguardando pagamento
                    'tipo_entrega' => $request->tipo_entrega,
                    'total' => 0, // Vamos somar no loop para garantir precisão
                ]);

                $totalCalculado = 0;

                foreach ($itensParaProcessar as $itemCart) {
                    $produto = $itemCart->produto;
                    $variacao = $itemCart->variacao;

                    // 2. CHECK DE ESTOQUE (Segurança Crítica)
                    if ($variacao->estoque < $itemCart->quantidade) {
                        throw new \Exception("O produto {$produto->nome} ({$variacao->tamanho}) acabou de esgotar! Estoque atual: {$variacao->estoque}");
                    }

                    // 3. Define o preço real ATUAL (Ignora o preço antigo do carrinho)
                    $precoReal = $produto->preco - ($produto->desconto ?? 0);

                    // 4. Cria o Item do Pedido (Snapshot)
                    ItemPedido::create([
                        'pedido_id'    => $pedido->id,
                        'produto_id'   => $produto->id,
                        'variacao_id'  => $variacao->id, // VITAL: Saber qual tamanho saiu
                        'produto_nome' => $produto->nome, // Snapshot do nome
                        'quantidade'   => $itemCart->quantidade,
                        'preco_unitario' => $precoReal,
                    ]);

                    // 5. Baixa o Estoque
                    $variacao->decrement('estoque', $itemCart->quantidade);

                    $totalCalculado += ($precoReal * $itemCart->quantidade);
                }

                // 6. Atualiza o total do pedido
                $pedido->update(['total' => $totalCalculado]);

                // 7. Limpa os itens processados do carrinho
                // Usamos destroy com array de IDs para ser rápido
                ItemCarrinho::destroy($itensParaProcessar->pluck('id'));

                // Se o carrinho ficar vazio, opcionalmente deletamos a sessão ou o carrinho
                if ($carrinho->itens()->count() === 0) {
                   // $carrinho->delete(); // Opcional: manter histórico ou limpar
                }

                return redirect()->route('pagamento.checkout', ['pedido' => $pedido->id])
                                 ->with('success', 'Pedido gerado com sucesso!');

            } catch (\Exception $e) {
                // Se der erro (ex: sem estoque), o DB::transaction desfaz tudo
                Log::error("Erro Pedido: " . $e->getMessage());
                return redirect()->route('carrinho.index')->with('error', $e->getMessage());
            }
        });
    }

    /**
     * Detalhes de um Pedido Específico
     */
    public function show($id)
    {
        $pedido = Pedido::with(['itens.variacao', 'pagamento'])
                        ->where('user_id', Auth::id()) // Segurança: só vê o próprio pedido
                        ->findOrFail($id);

        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Atualização de Status (Geralmente usado via API ou Webhooks de Pagamento)
     */
    public function update(Request $request, $id)
    {
        // Esse método geralmente fica protegido para ADMINs ou Webhooks
        // Se for para o cliente cancelar, precisamos validar
        
        $pedido = Pedido::findOrFail($id);

        // Cliente só pode cancelar se estiver pendente
        if ($request->status === 'cancelado' && $pedido->user_id === Auth::id()) {
            if ($pedido->status === 'pendente') {
                
                // DEVOLVER ESTOQUE!
                foreach ($pedido->itens as $item) {
                    $item->variacao()->increment('estoque', $item->quantidade);
                }

                $pedido->update(['status' => 'cancelado']);
                return back()->with('message', 'Pedido cancelado e estoque estornado.');
            }
        }

        return back()->with('error', 'Não é possível alterar este pedido.');
    }
}