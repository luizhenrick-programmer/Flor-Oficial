<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCarrinho extends Model
{
    protected $fillable = [
        'carrinho_id',
        'quantidade',
        'preco',
    ];
}
