<?php

namespace App\API;

use Exception;

class PixPaymentService
{
    public function createPixPayment($data)
    {
        $accessToken = env('MERCADO_PAGO_ACCESS_TOKEN');
        $idempotencyKey = uniqid();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-Idempotency-Key: '.$idempotencyKey,
                'Authorization: Bearer '.$accessToken,
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            throw new Exception('Erro ao processar o pagamento: ' . $error);
        }
        return json_decode($response, true);
    }
}

