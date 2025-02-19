<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Vendedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class VendedorController extends Controller
{

    public function dashboard() {
        return view('vendedor.dashboard');
    }
    public function vendas() {
        return view('vendedor.vendas.index');
    }
    public function lista(Request $request) {
        $query = Produto::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('nome', 'LIKE', '%' . $request->search . '%');
        }

        $produtos = $query->get();

        return view('vendedor.listaProd.lista', compact('produtos'));
    }
}
