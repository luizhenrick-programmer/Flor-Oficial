<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function ecommerce()
    {
        return view('admin.ecommerce.index');
    }

    public function produto()
    {
        $produtos = Produto::all();
        return view('admin.ecommerce.produto', compact('produtos'));
    }

    public function criarProduto()
    {
        return view('admin.ecommerce.criar_produto');
    }

    public function storeEvento(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'url' => 'nullable|url',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categoria,id',
            'cor' => 'required|array|min:1',
            'tamanho' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'status' => 'required|in:publicado,inativo',
            'arquivo' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('arquivo')) {
            $arquivoPath = $request->file('arquivo')->store('arquivos', 'public');
            $validated['url'] = Storage::url($arquivoPath); // Substituir o campo URL pelo caminho do arquivo
        }

        $validated['criado_por'] = Auth::user()->id;

        Produto::create($validated);

        return redirect()->route('admin.ecommerce')->with('success', 'Produto criado com sucesso!');
    }


    public function cadFuncionario()
    {
        return view('admin.colaboradores.cad-funcionario');
    }


    public function colaboradores()
    {
        return view('admin.colaboradores.index');
    }

    public function financeiro()
    {
        return view('admin.financeiro.index');
    }
}
