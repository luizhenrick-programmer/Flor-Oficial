<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\ItemCarrinho;
use App\Models\Produto;

use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        $produtos = Produto::with(['variacoes', 'categoria'])->get();
        $usuarios = User::where('role', '=', 'cliente');
        $carrinhos = ItemCarrinho::with('user', 'produto')->latest()->get();
        return view('admin.dashboard', compact('produtos', 'usuarios', 'carrinhos'));
    }

}
