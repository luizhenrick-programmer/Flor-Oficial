<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;


use App\Models\Produto;

use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        $produtos = Produto::with(['variacoes', 'categoria'])->get();
        $usuarios = User::where('role', '=', 'cliente');
        return view('admin.dashboard', compact('produtos', 'usuarios'));
    }

}
