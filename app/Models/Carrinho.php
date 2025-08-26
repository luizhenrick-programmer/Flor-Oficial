<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'carrinho';
    protected $fillable = ['user_id', 'session_id'];

    public function itens()
    {
        return $this->hasMany(ItemCarrinho::class, 'carrinho_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function current() {
        if (Auth::check()) {
            return static::firstOrCreate(['user_id' => Auth::id()]);
        }

        return static::firstOrCreate(['session_id' => session()->getId()]);
    }

}
