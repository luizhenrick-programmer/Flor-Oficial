<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MelhorEnvioFrete
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = config('services.melhorenvio.base_url');
        $this->token   = config('services.melhorenvio.token');
    }

    private function client()
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Accept'        => 'application/json',
            'User-Agent'    => 'AplicacaoLaravel'
        ]);
    }

    public function calcularFrete(array $dados)
    {
        return $this->client()->post($this->baseUrl . '/me/shipment/calculate', $dados);
    }

    public function gerarEtiqueta(array $dados)
    {
        return $this->client()->post($this->baseUrl . '/me/shipment/checkout', $dados)->json();
    }

    public function pagarEtiqueta(array $dados)
    {
        return $this->client()->post($this->baseUrl . '/me/shipment/pay', $dados)->json();
    }

    public function imprimirEtiqueta($id)
    {
        return $this->client()->get($this->baseUrl . "/me/shipment/print?ids[]=$id")->body();
    }
}
