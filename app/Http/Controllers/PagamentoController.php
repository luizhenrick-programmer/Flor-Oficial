<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\SDK;
use MercadoPago\Payment;
use MercadoPago\Payer;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Resources\Preference;

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

    // Adicione credenciais
    MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACESS_TOKEN'));

    $client = new PreferenceClient();
    $preference = $client->create([
    "items"=> array(
        array(
        "title" => $pedido->itens->produto->name,
        "quantity" => $pedido->itens->quantidade,
        "unit_price" => $pedido->total
        )
    )
    ]);

    echo $preference;

    $preference = new Preference();
    $preference->back_urls = array(
        "success" => "https://www.tu-sitio/success",
        "failure" => "http://www.tu-sitio/failure",
        "pending" => "http://www.tu-sitio/pending"
    );
    $preference->auto_return = "approved";

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
