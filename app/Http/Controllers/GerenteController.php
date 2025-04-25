<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

class GerenteController extends Controller
{

    public function dashboard() {
        $produtos = Produto::with(['variacoes', 'categoria'])->get();
        $usuarios = User::where('role', '=', 'cliente');
        return view('gerente.dashboard', compact('produtos', 'usuarios'));
    }

    
}
