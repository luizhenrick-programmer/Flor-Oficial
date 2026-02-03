<?php

namespace App\Http\Controllers;

use App\Models\{Produto, ProdutoVariacao, ProdutoImagem, Categorias, Marcas, Carrinho};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Log, Storage};

class ProdutoController extends Controller
{
    /**
     * Index otimizada para a HostGator
     */
    public function index()
    {
        // 1. Eager Loading seletivo (pegando apenas o necessário para a vitrine)
        $produtos = Produto::with([
            'categoria:id,nome', 
            'imagemPrincipal:id,produto_id,url', // Só traz a foto da capa
            'variacoes:id,produto_id,tamanho,cor,estoque'
        ])
        ->where('status', 'publicado')
        ->select('id', 'nome', 'preco', 'desconto', 'categoria_id')
        ->latest()
        ->paginate(12);

        // 2. Carrinho minimalista
        $carrinho = auth()->check() 
            ? Carrinho::where('user_id', auth()->id())->with('itens:id,carrinho_id,produto_id,quantidade')->first() 
            : null;

        return view('produtos.index', compact('produtos', 'carrinho'));
    }

    public function create()
    {
        // Padrão de Model no singular: Categoria e Marca
        return view('produtos.create', [
            'categorias' => Categorias::all(), 
            'marcas' => Marcas::all()
        ]);
    }

    /**
     * Store com tratamento de transação e arquivos
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:0.01',
            'desconto' => 'nullable|numeric|min:0',
            'marca_id' => 'nullable|exists:marcas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'status' => 'required|in:publicado,inativo',
            
            // Variacoes: Agora cada cor é uma linha de estoque
            'variacoes' => 'required|array|min:1',
            'variacoes.*.tamanho' => 'required|string',
            'variacoes.*.cor' => 'required|string', 
            'variacoes.*.estoque' => 'required|integer|min:0',
            
            'arquivos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        return DB::transaction(function () use ($request, $validated) {
            try {
                // 1. Criar Produto
                $produto = Produto::create([
                    'nome' => $validated['nome'],
                    'descricao' => $validated['descricao'],
                    'preco' => $validated['preco'],
                    'desconto' => $validated['desconto'] ?? 0.00,
                    'marca_id' => $validated['marca_id'],
                    'categoria_id' => $validated['categoria_id'],
                    'status' => $validated['status'],
                    'criado_por' => auth()->id(),
                ]);

                // 2. Criar Variações (Uma linha para cada combinação)
                foreach ($validated['variacoes'] as $var) {
                    $produto->variacoes()->create([
                        'tamanho' => $var['tamanho'],
                        'cor' => $var['cor'],
                        'estoque' => $var['estoque'],
                    ]);
                }

                // 3. Salvar Imagens
                if ($request->hasFile('arquivos')) {
                    foreach ($request->file('arquivos') as $index => $arquivo) {
                        $path = $arquivo->store('produtos', 'public');
                        $produto->imagens()->create([
                            'url' => $path,
                            'principal' => $index === 0, // A primeira imagem vira a principal por padrão
                        ]);
                    }
                }

                return redirect()->route('produtos.index')->with('success', 'Flor cadastrada com sucesso!');

            } catch (\Exception $e) {
                Log::error("Erro Flor Oficial: " . $e->getMessage());
                return redirect()->back()->with('error', 'Erro técnico ao salvar. Tente novamente.')->withInput();
            }
        });
    }

    public function show($id)
    {
        // Eager Loading aqui é essencial para a página de detalhes não travar
        $produto = Produto::with(['variacoes', 'imagens', 'categoria'])->findOrFail($id);

        $relacionados = Produto::where('categoria_id', $produto->categoria_id)
            ->where('id', '!=', $id)
            ->where('status', 'publicado')
            ->limit(4)
            ->get(['id', 'nome', 'preco', 'desconto']);

        return view('produtos.show', compact('produto', 'relacionados'));
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        // Como usamos SoftDeletes, não deletamos as imagens do disco agora.
        // Elas só saem se usarmos o forceDelete futuramente.
        $produto->delete(); 

        return redirect()->route('produtos.index')->with('success', 'Produto movido para a lixeira!');
    }
}