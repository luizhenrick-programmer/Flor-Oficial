<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagamento extends Model
{
    protected $table = 'pagamento';
    protected $fillable = [
        'pedido_id', 'valor', 'metodo_pagamento', 
        'status', 'transacao_id', 'data_pagamento'
    ];

    protected $casts = [
        'data_pagamento' => 'datetime',
    ];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }
}
