<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'nome', 'url', 'descricao', 'preco', 'quantidade',
        'categoria_id', 'cor', 'marca', 'status', 'tamanho',
        'criado_por'
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }
}

