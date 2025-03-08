<?php

namespace App\API;

use Exception;
use Illuminate\Support\Facades\Log;

class PixPaymentService
{
    public function createPixPayment($data)
    {
        $accessToken = env('MERCADO_PAGO_ACCESS_TOKEN');

        if (!$accessToken) {
            throw new Exception('Token do Mercado Pago não encontrado no .env');
        }

        $idempotencyKey = uniqid();
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-Idempotency-Key: ' . $idempotencyKey,
                'Authorization: Bearer ' . $accessToken,
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            Log::error('Erro na requisição Mercado Pago: ' . $error);
            throw new Exception('Erro ao processar o pagamento: ' . $error);
        }

        $decodedResponse = json_decode($response, true);

        // Log para depuração
        Log::info('Resposta da API Mercado Pago:', $decodedResponse);

        if (isset($decodedResponse['error'])) {
            throw new Exception('Erro do Mercado Pago: ' . $decodedResponse['message']);
        }

        return $decodedResponse;
    }
}
