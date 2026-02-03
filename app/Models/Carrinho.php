<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carrinho extends Model
{

    protected $table = 'carrinho';
    protected $fillable = ['user_id', 'session_id'];

    public function itens(): HasMany
    {
        return $this->hasMany(ItemCarrinho::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}