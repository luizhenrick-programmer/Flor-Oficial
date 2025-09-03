<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{

    public function index()
    {
        $content = HomePage::first();
        return view('home', compact('content'));
    }

    public function edit()
    {
        $content = HomePage::first(); // assumindo que existe apenas um registro
        return view('ecommerce.home_page', compact('content'));
    }

    public function update(Request $request)
    {
        $content = HomePage::first();

        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'imagem' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            if ($content->imagem) {
                Storage::delete($content->imagem);
            }
            $path = $request->file('imagem')->store('home', 'public');
            $content->imagem = $path;
        }

        $content->titulo = $request->titulo;
        $content->subtitulo = $request->subtitulo;
        $content->descricao = $request->descricao;
        $content->save();

        return redirect()->back()->with('success', 'Conteúdo atualizado com sucesso!');
    }
}
