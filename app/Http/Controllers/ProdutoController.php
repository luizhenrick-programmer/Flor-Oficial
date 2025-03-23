<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\ProdutoImagem;
use App\Models\ProdutoVariacao;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with(['variacoes', 'categoria'])->paginate(10);
        return view('produtos.index', compact('produtos'));
    }


    public function create()
    {
        return view('produtos.create', ['categorias' => Categorias::all(), 'marcas' => Marcas::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:1',
            'desconto' => 'required|numeric|min:1',
            'marca_id' => 'nullable|exists:marcas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'status' => 'required|in:publicado,inativo',
            'variacoes' => 'required|array|min:1',
            'variacoes.*.tamanho' => 'required|string|in:PP,P,M,G,GG,XG',
            'variacoes.*.cores' => 'required|array|min:1',
            'variacoes.*.cores.*' => 'string',
            'variacoes.*.estoque' => 'required|integer|min:0',
            'arquivos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $produto = Produto::create([
                'nome' => $validated['nome'],
                'descricao' => $validated['descricao'],
                'preco' => $validated['preco'],
                'desconto' => $validated['desconto'],
                'marca_id' => $validated['marca_id'] ?? null,
                'categoria_id' => $validated['categoria_id'],
                'status' => $validated['status'],
                'criado_por' => Auth::id(),
            ]);

            foreach ($validated['variacoes'] as $var) {
                ProdutoVariacao::create([
                    'produto_id' => $produto->id,
                    'tamanho' => $var['tamanho'],
                    'cores' => json_encode(array_values($var['cores'])),
                    'estoque' => $var['estoque'],
                ]);
            }

            if ($request->hasFile('arquivos')) {
                foreach ($request->file('arquivos') as $arquivo) {
                    $path = $arquivo->store('produtos', 'public');
                    ProdutoImagem::create([
                        'produto_id' => $produto->id,
                        'url' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('produtos.create')->with('success', 'Produto cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao criar produto: ' . $e->getMessage());
            return redirect()->route('produtos.create')->with('error', 'Erro ao criar produto.');
        }
    }



    public function show($id)
    {
        return view('produtos.show', ['produto' => Produto::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('produtos.edit', ['produto' => Produto::findOrFail($id), 'categorias' => Categorias::all(), 'marcas' => Marcas::all()]);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:1',
            'marca_id' => 'nullable|exists:marcas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'status' => 'required|in:publicado,inativo',
        ]);

        $produto->update($validated);

        return redirect()->route('produtos.edit', $produto->id)->with('success', 'Produto atualizado com sucesso!');
    }



    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        // Remover imagens do storage
        foreach ($produto->imagens as $imagem) {
            Storage::delete(str_replace('/storage/', '', $imagem->url));
            $imagem->delete();
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso!');
    }
}
