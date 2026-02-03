<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Carrinho, ItemCarrinho, Produto, ProdutoVariacao};
use Illuminate\Support\Facades\{Auth, Session, DB};

class CarrinhoController extends Controller
{
    /**
     * Método Auxiliar Privado para evitar repetição de código.
     * Ele resolve o problema do session_id vs user_id em um só lugar.
     */
    private function obterCarrinho()
    {
        $userId = Auth::id();
        $sessionId = Session::getId();

        return Carrinho::firstOrCreate(
            $userId ? ['user_id' => $userId] : ['session_id' => $sessionId],
            ['session_id' => $sessionId]
        );
    }

    public function index()
    {
        // Carregamos as relações necessárias com colunas específicas para poupar RAM na HostGator
        $carrinho = $this->obterCarrinho()->load([
            'itens.produto:id,nome,preco,desconto',
            'itens.variacao:id,produto_id,tamanho,cor'
        ]);

        $subtotal = 0;
        foreach ($carrinho->itens as $item) {
            // O preço vem do BANCO, não do request (Segurança!)
            $precoFinal = $item->produto->preco - $item->produto->desconto;
            $subtotal += $item->quantidade * $precoFinal;
        }

        return view('carrinho.cart', [
            'carrinho' => $carrinho,
            'subtotal' => $subtotal,
            'frete' => 0 // Lógica de frete virá depois
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produto,id',
            'variacao_id' => 'required|exists:produto_variacoes,id',
            'quantidade' => 'required|integer|min:1'
        ]);

        $carrinho = $this->obterCarrinho();

        // Verifica se ESSA variação específica já está no carrinho
        $item = ItemCarrinho::where('carrinho_id', $carrinho->id)
                            ->where('variacao_id', $request->variacao_id)
                            ->first();

        if ($item) {
            $item->increment('quantidade', $request->quantidade);
        } else {
            ItemCarrinho::create([
                'carrinho_id' => $carrinho->id,
                'produto_id'  => $request->produto_id,
                'variacao_id' => $request->variacao_id,
                'quantidade'  => $request->quantidade,
                // Note: Removemos o preço daqui. O preço é dinâmico até o Checkout.
            ]);
        }

        return redirect()->route('shopping')->with('success', 'Flor adicionada ao carrinho!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:carrinho_itens,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $carrinho = $this->obterCarrinho();

        // Segurança: Só permite atualizar itens que pertencem ao carrinho do usuário atual
        $item = ItemCarrinho::where('id', $request->id)
                            ->where('carrinho_id', $carrinho->id)
                            ->firstOrFail();

        $item->update(['quantidade' => $request->quantity]);

        return redirect()->back()->with('message', 'Quantidade atualizada!');
    }

    public function destroy($id)
    {
        $carrinho = $this->obterCarrinho();
        
        // Só deleta se o item for do dono do carrinho
        ItemCarrinho::where('id', $id)
                    ->where('carrinho_id', $carrinho->id)
                    ->delete();

        return redirect()->route('carrinho.index');
    }
}