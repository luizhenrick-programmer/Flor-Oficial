<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use MercadoPago\SDK;
use MercadoPago\Payment;
use MercadoPago\Payer;

class PagamentoController extends Controller
{
    public function index()
    {
        $pedido = Pedido::where('user_id', Auth::id())->latest()->first();

        return view('pagamento.index', compact('pedido'));
    }

    public function store(Request $request)
{
    $request->validate([
        'pedido_id' => 'required|exists:pedidos,id',
        'valor' => 'required|numeric|min:0',
        'token' => 'required|string',
        'metodo_pagamento' => 'required|string',
        'parcelas' => 'required|integer|min:1',
        'email' => 'required|email',
        'identificacao_tipo' => 'required|string',
        'identificacao_numero' => 'required|string',
        'descricao' => 'required|string',
    ]);

    $pedido = Pedido::findOrFail($request->pedido_id);

    if ($pedido->status !== 'pendente') {
        return response()->json(['message' => 'Este pedido já foi processado'], 400);
    }

    // Integração Mercado Pago
    SDK::setAccessToken(config('services.mercadopago.access_token'));

    $payment = new Payment();
    $payment->transaction_amount = (float) $request->valor;
    $payment->token = $request->token;
    $payment->description = $request->descricao;
    $payment->installments = (int) $request->parcelas;
    $payment->payment_method_id = $request->metodo_pagamento;

    $payer = new Payer();
    $payer->email = $request->email;
    $payer->identification = [
        "type" => $request->identificacao_tipo,
        "number" => $request->identificacao_numero
    ];

    $payment->payer = $payer;
    $payment->save();

    if ($payment->status === 'approved') {
        $pagamento = Pagamento::create([
            'pedido_id' => $pedido->id,
            'valor' => $request->valor,
            'status' => 'aprovado',
            'data_pagamento' => now(),
        ]);

        $pedido->update(['status' => 'pago']);

        return response()->json(['message' => 'Pagamento aprovado', 'pagamento' => $pagamento]);
    } else {
        return response()->json(['message' => 'Pagamento recusado', 'status_detail' => $payment->status_detail], 400);
    }
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
