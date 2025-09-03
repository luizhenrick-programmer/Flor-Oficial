<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';
    protected $fillable = ['titulo', 'subtitulo', 'descricao', 'imagem'];
}
