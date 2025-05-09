<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrinho;
use App\Models\ItemPedido;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $carrinho = Carrinho::with('itens')->where('user_id', $request->user_id)->first();

        if (!$carrinho) {
            return response()->json(['message' => 'Carrinho não encontrado'], 404);
        }

        $itensSelecionados = $request->input('itensSelecionados', []);

        if (empty($itensSelecionados)) {
            return back()->with('message', 'Nenhum item selecionado.');
        }

        $itens = $carrinho->itens->whereIn('id', $itensSelecionados);

        $pedido = Pedido::create([
            'user_id' => $request->user_id,
            'data_pedido' => now(),
            'status' => 'pendente',
            'total' => $itens->sum(fn($item) => $item->quantidade * $item->preco_unitario),
            'tipo_entrega' => 'entrega_domicilio'
        ]);

        foreach ($itens as $item) {
            ItemPedido::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $item->produto_id,
                'quantidade' => $item->quantidade,
                'preco_unitario' => $item->preco_unitario
            ]);
        }

        return redirect()->route('pagamento.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $pedido = Pedido::findOrFail($id);

        // Valida se o status é permitido
        $statusPermitidos = ['pendente', 'enviado', 'entregue', 'cancelado'];
        if (!in_array($request->status, $statusPermitidos)) {
            return response()->json(['message' => 'Status inválido'], 400);
        }

        $pedido->update(['status' => $request->status]);

        return response()->json(['message' => 'Status atualizado com sucesso']);
    }


    public function destroy(string $id)
    {
        //
    }
}
