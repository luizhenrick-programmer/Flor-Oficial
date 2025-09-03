<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home_page')->insert([
            [
                'titulo' => 'Título',
                'descricao' => 'Descrição Padrão',
                'imagem' => 'huweiuugwfiugfwiygwf'
            ]
        ]);
    }
}
