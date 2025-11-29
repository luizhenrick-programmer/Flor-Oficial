<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{

    public function index()
    {
        $content = HomePage::first() ?? new HomePage();
        return view('home', compact('content'));
    }

    public function edit()
    {
        $content = HomePage::first(); // assumindo que existe apenas um registro
        $produtos = Produto::all();
        return view('ecommerce.home_page', compact('content', 'produtos'));
    }

    public function update(Request $request)
    {
        $content = HomePage::firstOrCreate([]);


        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'imagem' => 'nullable|image|max:2048',
            'desconto1' => 'required|string|max:255',
            'desconto2' => 'required|string|max:255',
            'desconto3' => 'required|string|max:255',
            'desconto4' => 'required|string|max:255'
        ]);

        if ($request->hasFile('imagem')) {
            // Se já tiver imagem salva, exclui
            if (!empty($content->imagem)) {
                Storage::disk('public')->delete($content->imagem);
            }

            $path = $request->file('imagem')->store('home', 'public');
            $content->imagem = $path;
        }

        $content->titulo = $request->titulo;
        $content->subtitulo = $request->subtitulo;
        $content->descricao = $request->descricao;
        $content->desconto1 = $request->desconto1;
        $content->desconto2 = $request->desconto2;
        $content->desconto3 = $request->desconto3;
        $content->desconto4 = $request->desconto4;
        $content->save();

        return redirect()->back()->with('success', 'Conteúdo atualizado com sucesso!');
    }
}
