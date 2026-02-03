<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorias extends Model
{
    use HasFactory;

    // Como seu model chama "Categorias" (plural), o Laravel deve achar a tabela "categorias" sozinho.
    // Mas para garantir, deixamos explícito.
    protected $table = 'categorias';

    protected $fillable = [
        'nome', 
        'descricao', 
        'criado_por'
    ];

    /**
     * Relacionamento: Uma Categoria TEM MUITOS Produtos
     * Nome da função: 'produtos' (no plural)
     */
    public function produtos(): HasMany
    {
        // O segundo parâmetro 'categoria_id' é a chave estrangeira na tabela de produtos
        return $this->hasMany(Produto::class, 'categoria_id');
    }
}