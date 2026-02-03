<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdutoImagem extends Model
{
    use HasFactory;
    protected $table = 'produto_imagens';

    protected $fillable = [
        'produto_id',
        'url',
        'principal',
        'ordem'
    ];

    public function getUrlCompletaAttribute(): string
    {
        if (filter_var($this->url, FILTER_VALIDATE_URL)) {
            return $this->url;
        }

        return asset('storage/' . $this->url);
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}