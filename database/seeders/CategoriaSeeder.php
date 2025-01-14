<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nome' => 'Vestidos',
                'descricao' => 'Roupas versáteis e femininas que podem ser usadas em uma variedade de ocasiões, desde o casual do dia a dia até eventos mais formais. Normalmente, proporcionam conforto e facilidade ao vestir.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Shorts',
                'descricao' => 'Peças de vestuário curtas e práticas, ideais para o clima quente e ocasiões descontraídas. São confortáveis e perfeitas para o verão ou atividades ao ar livre.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Moletons',
                'descricao' => 'Roupas de tecido felpudo ou algodão, projetadas para o máximo conforto. Combinam estilo casual com a praticidade de um look relaxado, sendo ideais para dias frios ou momentos de descanso.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Trajes de Banho',
                'descricao' => 'Roupas de banho projetadas para o uso em piscinas e praias, oferecendo conforto e proteção contra o sol. Incluem biquínis, maiôs e sungas em diversos estilos e cortes.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Jaquetas',
                'descricao' => 'Peças de vestuário que oferecem proteção contra o frio, adicionando uma camada extra de estilo ao look. Podem ser utilizadas tanto em ocasiões casuais quanto mais formais.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Camisas e Tops',
                'descricao' => 'Peças de vestuário superiores que oferecem conforto e sofisticação, usadas tanto em ocasiões formais quanto informais. Podem ser combinadas com diversas outras peças para diferentes estilos.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Jeans',
                'descricao' => 'Peças de vestuário feitas com tecido denim, reconhecidas por sua durabilidade e versatilidade. Podem ser usadas em qualquer ocasião e se adaptam facilmente a diferentes estilos.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Calças',
                'descricao' => 'Peças de vestuário que cobrem do quadril até os tornozelos, oferecendo conforto e elegância em uma variedade de estilos. São ideais para o trabalho, lazer ou eventos casuais.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Homens',
                'descricao' => 'Roupas masculinas projetadas para atender às necessidades do dia a dia e ocasiões especiais. Focam em conforto, durabilidade e um design funcional.',
                'criado_por' => '1'
            ],
            [
                'nome' => 'Mulheres',
                'descricao' => 'Roupas femininas que celebram a diversidade de estilos e corpos, oferecendo uma gama de peças que variam entre conforto e sofisticação. Destinam-se a todas as ocasiões e momentos do dia.',
                'criado_por' => '1'
            ],
        ]);
    }
}
