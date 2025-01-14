<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\API\PixPaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pagamento()
    {
        try {
            $pixService = new PixPaymentService();

            $paymentData = [
                "description" => "Payment for product",
                "external_reference" => "MP0001",
                "payer" => [
                    "email" => "test_user_123@testuser.com",
                    "identification" => [
                        "type" => "CPF",
                        "number" => "95749019047",
                    ],
                ],
                "payment_method_id" => "pix",
                "transaction_amount" => 58.00,
            ];


            $pagamento = $pixService->createPixPayment($paymentData);

            if (isset($pagamento->id)) {
                return view('payment.success', [
                    'imagem_pix' => $pagamento->point_of_interaction->transaction_data->qr_code_base64,
                    'copia_cola' => $pagamento->point_of_interaction->transaction_data->qrcode,
                ]);
            }
            return redirect()->back()->with('error', 'Erro ao criar pagamento.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
