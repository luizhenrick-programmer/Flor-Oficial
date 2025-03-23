<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Endereco;
use App\Models\Marcas;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        $produtos = Produto::with(['variacoes', 'categoria'])->get();
        $usuarios = User::where('role', '=', 'cliente');
        return view('admin.dashboard', compact('produtos', 'usuarios'));
    }

    public function ecommerce()
    {
        return view('ecommerce.index');
    }

    public function showProduto($id)
    {

        $produto = Produto::with('categoria')->findOrFail($id);

        // Produtos da mesma categoria (exceto o atual)
        $relacionados = Produto::where('categoria_id', $produto->categoria_id)
            ->where('id', '!=', $produto->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('produto.show', compact('produto', 'relacionados'));
    }

    public function filtrar(Request $request)
    {
        $query = Produto::query();

        // Filtrar por categoria
        if ($request->has('categorias')) {
            $query->whereIn('categoria_id', $request->categorias);
        }

        // Filtrar por cor
        if ($request->has('cores')) {
            foreach ($request->cores as $cor) {
                $query->whereJsonContains('cor', $cor);
            }
        }

        // Filtrar por tamanho
        if ($request->has('tamanhos')) {
            foreach ($request->tamanhos as $tamanho) {
                $query->where('tamanho', 'LIKE', '%' . $tamanho . '%');
            }
        }

        // Filtrar por marca
        if ($request->has('marcas')) {
            $query->whereIn('marca_id', $request->marcas);
        }

        $produtos = $query->get();

        return view('partials.produtos', compact('produtos'))->render();
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
        return view('ecommerce.categoria', compact('categorias'));
    }

    public function criarCategoria()
    {
        return view('ecommerce.criar_categoria');
    }

    public function cadastrar_funcionario()
    {
        return view('colaboradores.cad-funcionario');
    }

    public function marcas()
    {
        $marcas = Marcas::all();
        return view('ecommerce.marcas', compact('marcas'));
    }

    public function criarMarcas()
    {
        $marcas = Marcas::all();
        return view('ecommerce.criar_marcas', compact('marcas'));
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
        } catch (\Exception $e) {
            return redirect()->route('e-commerce.criar_marcas')->with('error', 'Ocorreu um erro ao criar a marca: ' . $e->getMessage());
        }
    }

    public function colaboradores()
    {
        return view('colaboradores.index');
    }

    public function salvarFuncionario(Request $request)
    {
        // Validação
        $request->validate([
            'nomeCompleto' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:users,cpf',
            'rg' => 'required|string|max:20',
            'cargo' => 'required|string|in:admin,gerente,vendedor',
            'email' => 'required|email|unique:users,email',
            'telefone' => 'required|string|max:20',
            'cep' => 'required|string|max:10',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        // Criar endereço e salvar no banco
        $endereco = Endereco::create([
            'cep' => $request->cep,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
        ]);

        // Criar usuário e associar endereço
        User::create([
            'name' => $request->nomeCompleto,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'role' => $request->cargo,
            'email' => $request->email,
            'password' => Hash::make('123456'), // Defina uma senha padrão
            'endereco_id' => $endereco->id, // Relacionamento correto
        ]);

        return redirect()->route('colaboradores.listar')->with('success', 'Funcionário cadastrado com sucesso!');
    }



    public function financeiro()
    {
        return view('financeiro.index');
    }

    public function pagamento() {}

    public function clientes()
    {
        $clientes = User::where('role', 'cliente')->paginate(10); // Paginação opcional
        return view('ecommerce.clientes', compact('clientes'));
    }

    public function listarFuncionarios()
    {
        $colaboradores = User::whereIn('role', ['gerente', 'vendedor'])->paginate(10);
        return view('colaboradores.listar-funcionarios', compact('colaboradores'));
    }

    public function ReceitasDespesas()
    {
        return view('financeiro.index');
    }
}
