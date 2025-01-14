<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'criado_por'
    ];
}
