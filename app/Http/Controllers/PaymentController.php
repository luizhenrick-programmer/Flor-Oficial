<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;  // Correção aqui, importe o SDK
use MercadoPago\Payment;

class PaymentController extends Controller
{
    public function __construct()
    {
        SDK::setAccessToken(config('services.mercadopago.access_token'));
    }

    public function createPayment(Request $request)
    {
        $payment = new Payment();
        $payment->transaction_amount = $request->amount;
        $payment->token = $request->token;
        $payment->description = "Descrição do pagamento";
        $payment->payment_method_id = $request->payment_method_id;
        $payment->payer = array(
            "email" => $request->payer_email
        );

        $payment->save();

        if ($payment->status == 'approved') {
            return response()->json(['status' => 'success', 'message' => 'Pagamento aprovado!']);
        } else {
            return response()->json(['status' => 'failure', 'message' => 'Pagamento não aprovado!']);
        }
    }

    public function createPixPayment(Request $request)
    {
        \MercadoPago\SDK::setAccessToken(config('services.mercadopago.access_token'));

        $preference = new \MercadoPago\Preference();
        $item = new \MercadoPago\Item();
        $item->title = "Curso Gateways de Pagamentos com PHP8";
        $item->quantity = 1;
        $item->unit_price = 150.00;
        $preference->items = array($item);

        // Configurações específicas para o Pix
        $payer = new \MercadoPago\Payer();
        $payer->email = $request->payer_email;
        $preference->payer = $payer;

        $preference->save();

        return response()->json(['qr_code' => $preference->init_point]);
    }

    public function createPaymentLink(Request $request)
    {
        \MercadoPago\SDK::setAccessToken(config('services.mercadopago.access_token'));

        $preference = new \MercadoPago\Preference();
        $item = new \MercadoPago\Item();
        $item->title = "Curso Gateways de Pagamentos com PHP8";
        $item->quantity = 1;
        $item->unit_price = 150.00;
        $preference->items = array($item);

        $preference->save();

        return response()->json(['payment_link' => $preference->init_point]);
    }
}
