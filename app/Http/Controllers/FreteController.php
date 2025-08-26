<?php

namespace App\Http\Controllers;

use App\Services\MelhorEnvioFrete;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    protected $melhorEnvio;

    public function __construct(MelhorEnvioFrete $melhorEnvio)
    {
        $this->melhorEnvio = $melhorEnvio;
    }

    public function calcular(string $cep_origem, string $cep_destino)
    {
        $dados = [
            "from" => ["postal_code" => $cep_origem],
            "to"   => ["postal_code" => $cep_destino],
            "products" => [
                ["id" => "1",
                "width" => 11,
                "height" => 17,
                "length" => 20,
                "weight" => 0.3,
                "insurance_value" => 10.5,
                "quantity" => 1]
            ],
            "options" =>[
                "insurance_value" => 10.5,
                "receipt" => false,
                "own_hand" => false
            ],
            "services" => "1,2" 
        ];

        $resultado = $this->melhorEnvio->calcularFrete($dados);

        return response()->json($resultado);
    }
}
