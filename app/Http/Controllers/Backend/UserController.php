<?php

namespace App\Http\Controllers\Backend;

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
        return view("shop", compact('produtos'));
    }
}
