<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdutoVariacao extends Model
{

    protected $table = 'produto_variacoes';
    use HasFactory;

    // Se você seguiu o padrão de nomes, pode remover o protected $table.
    // O Laravel vai procurar por 'produto_variacoes' automaticamente.

    protected $fillable = [
        'produto_id',
        'tamanho',
        'cor',
        'estoque'
    ];

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}