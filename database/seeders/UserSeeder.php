<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Thays Conrado',
                'cpf' => '00000000021',
                'telefone' => '+5561996543214',
                'username' => 'admin.conrado',
                'role' => 'admin',
                'email' => 'thaysconrado@admin.floroficial.com',
                'status' => 'ativo',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Luiz Henrick de Abreu Evangelista',
                'cpf' => '09974181178',
                'telefone' => '+5561999777155',
                'username' => 'luiz_abreu',
                'role' => 'cliente',
                'email' => 'abreu@gmail.com',
                'status' => 'ativo',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
