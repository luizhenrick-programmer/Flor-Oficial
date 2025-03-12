<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model {
    use HasFactory;

    protected $fillable = ['cep', 'rua', 'numero', 'bairro', 'cidade', 'estado'];

    public function user() {
        return $this->hasOne(User::class, 'endereco_id');
    }
}
