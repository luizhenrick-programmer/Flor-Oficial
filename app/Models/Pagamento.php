<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'carrinho_id', 'status',
        'valor', 'data_pagamento',
    ];
}
