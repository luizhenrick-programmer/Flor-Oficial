<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        $produtos = [
            ['Vestido Floral', 'vestido-floral', 'Vestido estampado floral, ideal para o verão.', 199.99, 10, 50, 1, 'M', 'publicado'],
            ['Short Jeans', 'short-jeans', 'Short jeans casual, perfeito para o dia a dia.', 89.99, 5, 40, 2, 'P', 'publicado'],
            ['Moletom Canguru', 'moletom-canguru', 'Moletom confortável com bolso canguru.', 149.90, 15, 30, 3, 'G', 'publicado'],
            ['Biquíni Preto', 'biquini-preto', 'Biquíni estiloso para aproveitar o verão.', 119.90, 10, 20, 4, 'M', 'publicado'],
            ['Jaqueta de Couro', 'jaqueta-couro', 'Jaqueta de couro sintético, moderna e versátil.', 299.99, 20, 15, 5, 'GG', 'publicado'],
            ['Camisa Polo', 'camisa-polo', 'Camisa polo clássica para um visual elegante.', 99.90, 0, 35, 6, 'M', 'publicado'],
            ['Calça Jeans Slim', 'calca-jeans-slim', 'Calça jeans slim fit para um visual moderno.', 179.99, 10, 25, 7, 'G', 'publicado'],
            ['Calça Social', 'calca-social', 'Calça social preta para eventos formais.', 199.99, 15, 20, 8, 'M', 'publicado'],
            ['Blazer Masculino', 'blazer-masculino', 'Blazer masculino sofisticado.', 349.90, 25, 10, 9, 'GG', 'publicado'],
            ['Saia Plissada', 'saia-plissada', 'Saia plissada elegante para ocasiões especiais.', 129.90, 10, 30, 10, 'M', 'publicado'],
            ['Vestido Preto', 'vestido-preto', 'Vestido preto básico e elegante.', 159.99, 10, 25, 1, 'P', 'publicado'],
            ['Short de Algodão', 'short-algodao', 'Short confortável para momentos casuais.', 79.99, 5, 40, 2, 'G', 'publicado'],
            ['Moletom Oversized', 'moletom-oversized', 'Moletom oversized para um look despojado.', 139.90, 10, 30, 3, 'GG', 'publicado'],
            ['Maiô Azul', 'maio-azul', 'Maiô azul vibrante para piscina e praia.', 129.90, 5, 15, 4, 'M', 'publicado'],
            ['Jaqueta Jeans', 'jaqueta-jeans', 'Jaqueta jeans clássica para diversas combinações.', 219.99, 20, 15, 5, 'G', 'publicado'],
            ['Regata Básica', 'regata-basica', 'Regata confortável para o verão.', 49.90, 0, 50, 6, 'M', 'publicado'],
            ['Jeans Reto', 'jeans-reto', 'Jeans corte reto confortável e moderno.', 189.99, 10, 25, 7, 'G', 'publicado'],
            ['Calça Cargo', 'calca-cargo', 'Calça cargo estilosa e prática.', 209.99, 15, 20, 8, 'M', 'publicado'],
            ['Terno Clássico', 'terno-classico', 'Terno clássico para eventos formais.', 599.90, 50, 5, 9, 'GG', 'publicado'],
            ['Vestido Midi', 'vestido-midi', 'Vestido midi elegante e confortável.', 189.99, 10, 30, 1, 'M', 'publicado'],
            ['Shorts de Linho', 'short-linho', 'Short de linho sofisticado para o verão.', 99.90, 5, 40, 2, 'P', 'publicado'],
            ['Moletom Sem Capuz', 'moletom-sem-capuz', 'Moletom sem capuz para um visual casual.', 129.90, 10, 30, 3, 'G', 'publicado'],
            ['Sunga Vermelha', 'sunga-vermelha', 'Sunga estilosa para o verão.', 89.99, 5, 20, 4, 'M', 'publicado'],
            ['Jaqueta Parka', 'jaqueta-parka', 'Jaqueta parka ideal para dias frios.', 259.99, 20, 15, 5, 'GG', 'publicado'],
            ['Blusa Manga Longa', 'blusa-manga-longa', 'Blusa manga longa básica e confortável.', 79.90, 0, 50, 6, 'M', 'publicado'],
            ['Jeans Skinny', 'jeans-skinny', 'Calça jeans skinny ajustada ao corpo.', 169.99, 10, 25, 7, 'G', 'publicado'],
            ['Calça Jogger', 'calca-jogger', 'Calça jogger confortável e moderna.', 189.99, 15, 20, 8, 'M', 'publicado'],
            ['Gravata Clássica', 'gravata-classica', 'Gravata clássica para ocasiões especiais.', 49.90, 0, 35, 9, 'Único', 'publicado'],
            ['Macacão Feminino', 'macacao-feminino', 'Macacão estiloso e confortável.', 219.99, 10, 30, 10, 'M', 'publicado'],
        ];

        foreach ($produtos as $produto) {
            DB::table('produto')->insert([
                'nome' => $produto[0],
                'url' => $produto[1],
                'descricao' => $produto[2],
                'preco' => $produto[3],
                'desconto' => $produto[4],
                'quantidade' => $produto[5],
                'categoria_id' => $produto[6],
                'tamanho' => $produto[7],
                'status' => $produto[8],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
