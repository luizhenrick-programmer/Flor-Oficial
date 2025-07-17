<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $fillable = ['user_id', 'data_pedido', 'status', 'total', 'tipo_entrega'];

    public function itens()
    {
        return $this->hasMany(ItemPedido::class, 'pedido_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
