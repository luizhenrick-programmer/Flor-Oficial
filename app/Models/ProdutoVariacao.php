<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoVariacao extends Model
{
    use HasFactory;

    protected $table = 'produto_variacoes';

    protected $fillable = [
        'produto_id',
        'tamanho',
        'cores',
        'estoque'
    ];

    protected $casts = [
        'cores' => 'array',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
