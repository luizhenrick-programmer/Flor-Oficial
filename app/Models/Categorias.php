<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
        'nome',
        'descricao',
        'criado_por'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'categoria_id');
    }
}
