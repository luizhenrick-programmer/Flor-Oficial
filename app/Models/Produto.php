<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome', 'descricao', 'preco', 'desconto', 'categoria_id', 'marca_id', 'status', 'criado_por',
    ];

    public function variacoes()
    {
        return $this->hasMany(ProdutoVariacao::class, 'produto_id');
    }

    public function imagens()
    {
        return $this->hasMany(ProdutoImagem::class, 'produto_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marcas::class, 'marca_id');
    }

    public function storeArquivo($arquivo)
    {
        if($arquivo) {
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }

    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }


}
