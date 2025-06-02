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
        // Define o access token da conta Mercado Pago
        MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));
        $client = new PreferenceClient();
        $items = [];
        foreach ($pedido->itens as $item) {
            $items[] = [
                "title" => $item->produto->nome,
                "quantity" => $item->quantidade,
                "unit_price" => 1,
            ];
        }
        $preference = $client->create([
            "items" => $items,
        ]);


        return redirect($preference->init_point);



        $preference = new Preference();
        //...
        $preference->back_urls = array(
            "success" => route('pagamento.sucesso'),
            "failure" => route('pagamento.falha'),
            "pending" => route('pagamento.pendente')
        );
        $preference->auto_return = "approved";
    }
}
