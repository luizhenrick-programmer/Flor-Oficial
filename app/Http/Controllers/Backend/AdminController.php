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

    public function store_produto(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'url' => 'nullable|url', // Se o campo URL não for obrigatório, você pode manter isso como nullable
            'descricao' => 'required|string',
            'preco' => 'required|integer|min:0',
            'quantidade' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categoria,id', // Validação para garantir que a categoria exista no banco
            'cor' => 'required|array|min:1', // Garante que o campo 'cor' seja um array com pelo menos 1 valor
            'tamanho' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'status' => 'required|in:publicado,inativo', // Validação de status para ser 'publicado' ou 'inativo'
            'arquivo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Arquivo opcional
        ]);

        if ($request->hasFile('arquivo')) {
            $arquivoPath = $request->file('arquivo')->store('arquivos', 'public');
            $validated['url'] = Storage::url($arquivoPath);
        }

        // Adicionar o ID do usuário logado para o campo 'criado_por'
        $validated['criado_por'] = Auth::user()->id;

        // Criar o produto com os dados validados
        Produto::create($validated);

        // Redirecionar de volta com uma mensagem de sucesso
        return redirect()->route('admin.ecommerce')->with('success', 'Produto criado com sucesso!');
    }

    public function cadastrar_funcionario()
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

    public function pagamento()
    {
        
    }
}
