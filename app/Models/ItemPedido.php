<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemPedido extends Model
{
    protected $table = 'item_pedido';
    protected $fillable = [
        'pedido_id', 'produto_id', 'variacao_id', 
        'produto_nome', 'preco_unitario', 'quantidade'
    ];

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
