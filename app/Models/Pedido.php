<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $table = 'pedido';

    protected $fillable = ['user_id', 'tipo_entrega', 'status', 'total'];

    public function itens(): HasMany
    {
        return $this->hasMany(ItemPedido::class);
    }

    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }
}
