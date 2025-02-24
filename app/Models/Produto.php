<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'nome', 'url', 'descricao', 'preco', 'quantidade',
        'categoria_id', 'cor', 'marca_id', 'status', 'tamanho',
        'criado_por'
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }

    public function storeArquivo($arquivo)
    {
        if($arquivo) {
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }

    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

}

