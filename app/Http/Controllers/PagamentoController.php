<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\Pedido;

class PagamentoController extends Controller
{
    public function index()
    {
        $carrinho = Pagamento::with('carrinho')->get();
        return view('pagamento.index', compact('carrinho'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'valor' => 'required|numeric|min:0',
        ]);

        $pedido = Pedido::findOrFail($request->pedido_id);

        if ($pedido->status !== 'pendente') {
            return response()->json(['message' => 'Este pedido já foi processado'], 400);
        }

        $pagamento = Pagamento::create([
            'pedido_id' => $pedido->id,
            'valor' => $request->valor,
            'status' => 'pendente',
            'data_pagamento' => now(),
        ]);

        return response()->json(['message' => 'Pagamento criado', 'pagamento' => $pagamento], 201);
    }

    public function show($id)
    {
        $pagamento = Pagamento::with('carrinho')->findOrFail($id);
        return response()->json($pagamento);
    }

    public function update(Request $request, $id)
    {
        $pagamento = Pagamento::findOrFail($id);

        if (!in_array($request->status, ['pendente', 'aprovado', 'recusado'])) {
            return response()->json(['message' => 'Status inválido'], 400);
        }

        $pagamento->update(['status' => $request->status, 'data_pagamento' => now()]);

        if ($request->status === 'aprovado') {
            $pagamento->carrinho->update(['status' => 'pago']);
        }

        return response()->json(['message' => 'Status do pagamento atualizado']);
    }
}
