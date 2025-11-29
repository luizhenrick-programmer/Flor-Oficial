<?php

namespace App\Models;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'descricao',
        'imagem',
        'desconto1',
        'desconto2',
        'desconto3',
        'desconto4'
    ];

    public function produto1()
    {
        return $this->belongsTo(Produto::class, 'desconto1');
    }

    public function produto2()
    {
        return $this->belongsTo(Produto::class, 'desconto2');
    }

    public function produto3()
    {
        return $this->belongsTo(Produto::class, 'desconto3');
    }

    public function produto4()
    {
        return $this->belongsTo(Produto::class, 'desconto4');
    }
}
