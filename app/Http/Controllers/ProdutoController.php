<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\ItemCarrinho;
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
    // 1. Busque apenas o que vai usar na vitrine (evite carregar 'descricao' longa aqui)
    $produtos = Produto::with([
        'categoria:id,nome', 
        'imagens:id,produto_id,url', 
        'variacoes:id,produto_id,tamanho,estoque'
    ])
    ->where('status', 'publicado')
    ->select('id', 'nome', 'preco', 'desconto', 'categoria_id') // Seleciona apenas o necessário
    ->paginate(10);

    // 2. Só busque o carrinho se o usuário estiver logado
    $carrinho = null;
    if (auth()->check()) {
        $carrinho = Carrinho::where('user_id', auth()->id())
            ->with(['itens' => function($query) {
                $query->select('id', 'carrinho_id', 'produto_id', 'quantidade');
            }])
            ->first();
    }

    return view('produtos.index', compact('produtos', 'carrinho'));
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
            'desconto' => 'nullable|numeric|min:0',
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
                'desconto' => $validated['desconto'] ?? 0.00,
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
        $produto = Produto::with('variacoes')->findOrFail($id);

        // Busca produtos da mesma categoria, mas exclui o próprio produto atual
        $relacionados = Produto::where('categoria_id', $produto->categoria_id)
                                        ->where('id', '!=', $produto->id)
                                        ->limit(8)
                                        ->get();

        return view('produtos.show', compact('produto', 'relacionados'));
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
