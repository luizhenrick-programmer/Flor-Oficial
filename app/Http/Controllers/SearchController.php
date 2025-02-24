<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Exemplo de busca em um modelo chamado Product
        $results = Produto::where('nome', 'like', "%{$query}%")
            ->orWhere('descricao', 'like', "%{$query}%")
            ->get();

        return view('search.results', compact('results', 'query'));
    }
}
