<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrinho;
use App\Models\Categorias;
use App\Models\ItemCarrinho;
use App\Models\Marcas;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function dashboard() {
        $produtos = Produto::with(['variacoes', 'categoria', 'imagens'])->get();
        $carrinho = Carrinho::with('itens.produto')->where('user_id', Auth::user()->id)->first();
        return view('home', compact('produtos', 'carrinho'));
    }

    public function comprar()
    {
        $categorias = Categorias::all();
        $marcas = Marcas::all();
        $produtos = Produto::with(['variacoes', 'categoria', 'imagens'])->get();
        return view('loja', compact('produtos', 'categorias', 'marcas'));
    }

}
