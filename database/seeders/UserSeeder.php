<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Thays Conrado',
                'cpf' => '000.000.000.21',
                'telefone' => '+5561996543214',
                'username' => 'admin.conrado',
                'role' => 'admin',
                'email' => 'thaysconrado@admin.floroficial.com',
                'status' => 'ativo',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Erika Silva',
                'cpf' => '000.000.000.56',
                'telefone' => '+5561999651246',
                'username' => 'gerente.silva',
                'role' => 'gerente',
                'email' => 'gerente@floroficial.com',
                'status' => 'ativo',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Gabriela Alencar',
                'cpf' => '000.000.000.78',
                'telefone' => '+5561992457135',
                'username' => 'vendedora.alencar',
                'role' => 'vendedor',
                'email' => 'vendedora@floroficial.com',
                'status' => 'ativo',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jose Pinto',
                'cpf' => '000.000.000.87',
                'telefone' => '+5561998542748',
                'username' => 'josepinto123',
                'role' => 'cliente',
                'email' => 'josepinto@gmail.com',
                'status' => 'ativo',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
