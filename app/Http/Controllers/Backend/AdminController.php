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
            $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string|max:1000',
                'preco' => 'required|numeric|min:0',
                'marca_id' => 'required|exists:marcas,id',
                'quantidade' => 'required|integer|min:0',
                'categoria_id' => 'required|exists:categorias,id',
                'tamanho' => 'required|string|in:PP,P,M,G,GG,XG',
                'cor' => 'required|array|min:1',
                'arquivo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'status' => 'required|in:publicado,inativo',
            ], [
                'nome.required' => 'O campo nome é obrigatório.',
                'nome.string' => 'O campo nome deve ser um texto.',
                'nome.max' => 'O nome não pode ter mais que 255 caracteres.',

                'url.required' => 'O campo URL é obrigatório.',
                'url.url' => 'O campo URL deve conter um endereço válido.',

                'descricao.string' => 'O campo descrição deve ser um texto.',
                'descricao.max' => 'A descrição não pode ter mais que 1000 caracteres.',

                'preco.required' => 'O campo preço é obrigatório.',
                'preco.numeric' => 'O campo preço deve ser um número.',
                'preco.min' => 'O campo preço deve ser no mínimo 0.',

                'marca_id.required' => 'O campo marca é obrigatório.',
                'marca_id.exists' => 'A marca selecionada não é válida.',

                'quantidade.required' => 'O campo quantidade é obrigatório.',
                'quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
                'quantidade.min' => 'A quantidade deve ser no mínimo 0.',

                'categoria_id.required' => 'O campo categoria é obrigatório.',
                'categoria_id.exists' => 'A categoria selecionada não é válida.',

                'tamanho.required' => 'O campo tamanho é obrigatório.',
                'tamanho.string' => 'O campo tamanho deve ser um texto.',
                'tamanho.in' => 'O tamanho deve ser um dos seguintes valores: PP, P, M, G, GG ou XG.',

                'cor.required' => 'O campo cor é obrigatório.',
                'cor.array' => 'O campo cor deve ser uma lista de cores.',
                'cor.min' => 'Selecione pelo menos uma cor.',

                'arquivo.required' => 'O campo arquivo é obrigatório.',
                'arquivo.file' => 'O arquivo enviado deve ser válido.',
                'arquivo.mimes' => 'O arquivo deve ser dos tipos: jpg, jpeg, png ou pdf.',
                'arquivo.max' => 'O arquivo não pode ter mais que 2 MB.',

                'status.required' => 'O campo status é obrigatório.',
                'status.in' => 'O status deve ser "publicado" ou "inativo".',
            ]);



            if ($request->hasFile('arquivo')) {
                $arquivoPath = $request->file('arquivo')->store('arquivos', 'public');
                $validated['url'] = Storage::url($arquivoPath);
            }
            $validated['criado_por'] = Auth::user()->id;

            Produto::create($validated);

            return redirect()->route('e-commerce.criar_produto')->with('success', 'Produto criado com sucesso!');
        }
        catch (\Exception $e) {
            // Redirecionamento com mensagem de erro
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
