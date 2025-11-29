<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomePage;

class HomePageSeeder extends Seeder
{
    public function run()
    {
        HomePage::firstOrCreate(
            ['id' => 1], // Garante que nunca vai duplicar
            [
                'titulo' => 'Título 1',
                'subtitulo' => 'Subtítulo 1',
                'descricao' => 'Descrição padrão',
                'imagem' => null,
                'desconto1' => null,
                'desconto2' => null,
                'desconto3' => null,
                'desconto4' => null
            ]
        );
    }
}
