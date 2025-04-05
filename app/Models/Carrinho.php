<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'carrinho';
    protected $fillable = ['user_id'];

    public function itens()
    {
        return $this->hasMany(ItemCarrinho::class, 'carrinho_id');
    }
}

