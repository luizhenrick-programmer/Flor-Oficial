<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produto';

    protected $fillable = [
        'nome', 'descricao', 'preco', 'desconto', 'categoria_id', 'marca_id', 'status', 'criado_por',
    ];

    public function variacoes(): HasMany
    {
        return $this->hasMany(ProdutoVariacao::class);
    }

    public function imagens(): HasMany
    {
        return $this->hasMany(ProdutoImagem::class);
    }

    public function imagemPrincipal()
    {
        return $this->hasOne(ProdutoImagem::class)->where('principal', true);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categorias::class);
    }

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marcas::class);
    }

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'criado_por');
    }

    /**
     * Accessors (Opcional, mas ajuda muito)
     */
    public function getPrecoComDescontoAttribute()
    {
        return $this->preco - $this->desconto;
    }
}