<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Resources\Preference;



class PagamentoController extends Controller
{

    public function checkout()
    {
        $pedido = Pedido::with('itens.produto')->where('user_id', Auth::id())->first();

        if (!$pedido || $pedido->itens->isEmpty()) {
            echo 'DEU RUIM';
        }

        MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));
        $client = new PreferenceClient();

        $items = [];

        foreach ($pedido->itens as $item) {
            $items[] = [
                "title" => $item->produto->nome,
                "quantity" => $item->quantidade,
                "unit_price" => (float) $item->preco_unitario,
                "currency_id" => "BRL"
            ];
        }

        $preference = $client->create([
            "items" => $items,
            "back_urls" => [
                "success" => route('pagamento.sucesso'),
                "failure" => route('pagamento.falha'),
                "pending" => route('pagamento.pendente')
            ],
            "auto_return" => "approved"
        ]);

        return redirect($preference->init_point);
    }
}
