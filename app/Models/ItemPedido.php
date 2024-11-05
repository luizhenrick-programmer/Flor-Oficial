<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $fillable = [
        'pedido_id',
        'quantidade',
        'preco_unitario',
    ];
}
