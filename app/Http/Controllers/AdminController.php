<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Hash, Auth};
use App\Models\{User, Produto, Pedido, Categorias, Marcas, Endereco, ProdutoVariacao};

class AdminController extends Controller
{
    // =========================================================================
    // 1. DASHBOARD E RELATÓRIOS
    // =========================================================================
    public function dashboard()
    {
        // KPIs (Indicadores) usando count() para performance máxima
        $totalProdutos = Produto::count();
        $totalClientes = User::where('role', 'cliente')->count();
        
        // Faturamento do mês (Pedidos pagos ou enviados)
        $faturamentoMes = Pedido::whereMonth('created_at', now()->month)
            ->whereIn('status', ['pago', 'enviado', 'entregue'])
            ->sum('total');

        // Alerta de Estoque Baixo (Menos de 5 unidades)
        $estoqueBaixo = ProdutoVariacao::with('produtos')
            ->where('estoque', '<', 5)
            ->limit(5)
            ->get();

        // Últimos 5 pedidos
        $ultimosPedidos = Pedido::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProdutos', 'totalClientes', 'faturamentoMes', 'estoqueBaixo', 'ultimosPedidos'
        ));
    }

    public function relatorios()
    {
        return view('admin.relatorios.index');
    }

    public function financeiro()
    {
        return view('admin.financeiro.index');
    }

    // =========================================================================
    // 2. GESTÃO DE PRODUTOS AUXILIARES (Categorias e Marcas)
    // =========================================================================
    
    // --- Categorias ---
    public function categorias()
    {
        $categorias = Categorias::withCount('produtos')->get(); // Já conta quantos produtos tem em cada
        return view('admin.categorias.index', compact('categorias'));
    }

    public function storeCategoria(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255', 'descricao' => 'nullable|string']);
        
        Categoria::create($request->only('nome', 'descricao'));

        return back()->with('success', 'Categoria criada com sucesso!');
    }

    public function destroyCategoria($id)
    {
        Categoria::findOrFail($id)->delete();
        return back()->with('success', 'Categoria removida!');
    }

    // --- Marcas ---
    public function marcas()
    {
        $marcas = Marcas::withCount('produtos')->get();
        return view('admin.marcas.index', compact('marcas'));
    }

    public function storeMarca(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        
        Marcas::create($request->only('nome'));

        return back()->with('success', 'Marca adicionada!');
    }

    // =========================================================================
    // 3. GESTÃO DE PESSOAS (Clientes e Funcionários)
    // =========================================================================

    public function clientes()
    {
        $clientes = User::where('role', 'cliente')
            ->withCount('pedidos') // Útil para ver quem compra mais
            ->latest()
            ->paginate(15);

        return view('admin.clientes.index', compact('clientes'));
    }

    public function funcionarios()
    {
        $funcionarios = User::whereIn('role', ['admin', 'gerente', 'vendedor'])->paginate(10);
        return view('admin.funcionarios.index', compact('funcionarios'));
    }

    public function createFuncionario()
    {
        return view('admin.funcionarios.create');
    }

    /**
     * Cadastro Completo de Funcionário (Com Endereço e Transação)
     */
    public function storeFuncionario(Request $request)
    {
        $request->validate([
            'nomeCompleto' => 'required|string|max:255',
            'cpf' => 'required|string|unique:users,cpf', // Validação única vital
            'email' => 'required|email|unique:users,email',
            'cargo' => 'required|in:admin,gerente,vendedor',
            'rua' => 'required|string',
            'cep' => 'required|string',
            // ... adicione outras validações de endereço
        ]);

        DB::transaction(function () use ($request) {
            // 1. Cria o endereço
            $endereco = Endereco::create([
                'rua' => $request->rua,
                'numero' => $request->numero ?? 'S/N',
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'cep' => $request->cep,
            ]);

            // 2. Cria o usuário vinculado
            User::create([
                'name' => $request->nomeCompleto,
                'email' => $request->email,
                'cpf' => $request->cpf,
                'role' => $request->cargo,
                'password' => Hash::make('Mudar123'), // Senha padrão segura
                'endereco_id' => $endereco->id,
            ]);
        });

        return redirect()->route('admin.funcionarios')->with('success', 'Colaborador cadastrado!');
    }
}