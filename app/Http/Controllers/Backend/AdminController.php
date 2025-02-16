<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Marcas;
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
        $categorias = Categorias::all();
        $marcas = Marcas::all();
        return view('admin.ecommerce.criar_produto', compact('categorias', 'marcas'));
    }

    public function store_produto(Request $request)
{
    try {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|decimal:2|min:1',
            'marca_id' => 'required|exists:marcas,id',
            'quantidade' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'tamanho' => 'required|string|in:PP,P,M,G,GG,XG',
            'cor' => 'required|array|min:1',
            'arquivo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'required|in:publicado,inativo',
        ]);

        if ($request->hasFile('arquivo')) {
            $arquivoPath = $request->file('arquivo')->store('arquivos', 'public');
            $validated['url'] = Storage::url($arquivoPath);
        }

        // Adiciona o campo criado_por manualmente
        $validated['criado_por'] = Auth::id(); // Forma simplificada de pegar o usuário autenticado

        // Criar o produto com todos os campos necessários
        Produto::create([
            'nome' => $validated['nome'],
            'descricao' => $validated['descricao'] ?? null,
            'preco' => $validated['preco'],
            'marca_id' => $validated['marca_id'],
            'quantidade' => $validated['quantidade'],
            'categoria_id' => $validated['categoria_id'],
            'tamanho' => $validated['tamanho'],
            'cor' => json_encode($validated['cor']), // Converte array de cores para JSON
            'url' => $validated['url'] ?? null,
            'status' => $validated['status'],
            'criado_por' => $validated['criado_por'],
        ]);

        return redirect()->route('e-commerce.criar_produto')->with('success', 'Produto criado com sucesso!');
    } catch (\Exception $e) {
        return redirect()->route('e-commerce.criar_produto')->with('error', 'Ocorreu um erro ao criar o produto: ' . $e->getMessage());
    }
}


    public function store_categoria(Request $request)
    {
        try {
            // Validação dos dados
            $validated = $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'required|string',
            ]);

            $validated['criado_por'] = Auth::user()->id;

            // Criando a categoria
            Categorias::create($validated);

            // Redirecionamento com mensagem de sucesso
            return redirect()->route('e-commerce.criar_categoria')->with('success', 'Categoria criada com sucesso!');
        } catch (\Exception $e) {
            // Redirecionamento com mensagem de erro
            return redirect()->route('e-commerce.criar_categoria')->with('error', 'Ocorreu um erro ao criar a categoria: ' . $e->getMessage());
        }
    }


    public function categoria()
    {
        $categorias = Categorias::all();
        return view('admin.ecommerce.categoria', compact('categorias'));
    }

    public function criarCategoria()
    {
        return view('admin.ecommerce.criar_categoria');
    }

    public function cadastrar_funcionario()
    {
        return view('admin.colaboradores.cad-funcionario');
    }

    public function marcas()
    {
        $marcas = Marcas::all();
        return view('admin.ecommerce.marcas', compact('marcas'));
    }

    public function criarMarcas()
    {
        $marcas = Marcas::all();
        return view('admin.ecommerce.criar_marcas', compact('marcas'));
    }

    public function store_marcas(Request $request)
    {
        try {
            $validated = $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'required|string',
            ]);

            $validated['criado_por'] = Auth::user()->id;

            Marcas::create($validated);

            return redirect()->route('e-commerce.criar_marcas')->with('success', 'Produto criado com sucesso!');
        }
        catch (\Exception $e) {
            return redirect()->route('e-commerce.criar_marcas')->with('error', 'Ocorreu um erro ao criar a marca: ' . $e->getMessage());
        }
    }

    public function colaboradores()
    {
        return view('admin.colaboradores.index');
    }

    public function financeiro()
    {
        return view('admin.financeiro.index');
    }

    public function pagamento() {}
}
