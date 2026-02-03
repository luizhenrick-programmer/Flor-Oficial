<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Produto, Categorias, Marcas};

class EcommerceController extends Controller
{
    /**
     * A Home Page da Flor Oficial (Landing Page)
     * Aqui mostramos o "filé mignon": promoções e lançamentos.
     */
    public function index()
    {
        // 1. Destaques / Promoções (produto com desconto)
        $ofertas = Produto::with('imagemPrincipal')
            ->where('status', 'publicado')
            ->where('desconto', '>', 0)
            ->inRandomOrder() // Mistura para a home não ficar sempre igual
            ->take(4)
            ->get();

        // 2. Lançamentos (Os 8 últimos cadastrados)
        $novidades = Produto::with(['imagemPrincipal', 'categoria'])
            ->where('status', 'publicado')
            ->latest()
            ->take(8)
            ->get();

        // 3. Categorias Populares (Para exibir ícones na home)
        // O withCount ajuda a mostrar apenas categorias que tem produto
        $categoriasDestaque = Categorias::has('produtos')
            ->withCount('produto')
            ->take(6)
            ->get();

        return view('ecommerce.index', compact('ofertas', 'novidades', 'categoriasDestaque'));
    }

    /**
     * Página Institucional "Sobre Nós"
     */
    public function about()
    {
        return view('ecommerce.about');
    }

    /**
     * Página de Contato / SAC
     */
    public function contact()
    {
        return view('ecommerce.contact');
    }

    /**
     * Envio do formulário de contato (Opcional)
     */
    public function sendContact(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required'
        ]);

        // Aqui você pode enviar um e-mail real ou salvar no banco
        // Mail::to('admin@floroficial.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'Mensagem enviada! Entraremos em contato em breve.');
    }

    /**
     * Busca Global (Aquela lupa no topo do site)
     */
    public function search(Request $request)
    {
        $termo = $request->input('q');

        // Se a busca for vazia, redireciona para a loja completa
        if (!$termo) {
            return redirect()->route('loja.index');
        }

        // Busca inteligente por nome ou descrição
        $produto = Produto::where('status', 'publicado')
            ->where(function($query) use ($termo) {
                $query->where('nome', 'LIKE', "%{$termo}%")
                      ->orWhere('descricao', 'LIKE', "%{$termo}%");
            })
            ->with(['imagemPrincipal', 'categoria'])
            ->paginate(12);

        // Reutilizamos a view da loja, mas passando os resultados da busca
        return view('loja.index', compact('produto', 'termo')); // Certifique-se que sua view loja aceita $termo
    }
}