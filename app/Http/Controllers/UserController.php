<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function dashboard() {
        return view('home');
    }

    public function comprar() {
        $produtos = Produto::all();
        return view("loja", compact('produtos'));
    }
}
