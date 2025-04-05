<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\ItemCarrinho;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\call;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = Carrinho::with('itens')->where('user_id', Auth::id())->first();

        return view('carrinho.cart', compact('carrinho'));
    }


    public function add(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['error' => 'Usuário não autenticado.'], 401);
        }

        $carrinho = Carrinho::firstOrCreate(['user_id' => $userId]);

        $item = ItemCarrinho::where('carrinho_id', $carrinho->id)
            ->where('produto_id', $request->produto_id)
            ->first();

        if ($item) {
            $item->increment('quantidade', $request->quantidade);
        } else {
            $item = ItemCarrinho::create([
                'carrinho_id' => $carrinho->id,
                'produto_id' => $request->produto_id,
                'quantidade' => $request->quantidade,
                'preco_unitario' => $request->preco_unitario
            ]);
        }


        return response()->json($item);
    }


    public function removeItem($id)
    {
        $item = ItemCarrinho::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Item removido do carrinho']);
    }


    public function store(Request $request)
    {
        $carrinho = Carrinho::create(['user_id' => $request->user_id]);
        return response()->json($carrinho, 201);
    }

    public function show($id)
    {
        $carrinho = Carrinho::with('itens')->where('user_id', $id)->first();
        return response()->json($carrinho);
    }

    public function destroy($id)
    {
        ItemCarrinho::findOrFail($id)->delete();
        return response()->json(['message' => 'Item removido com sucesso']);
    }

    public function itens()
    {
        // Busca o carrinho do usuário logado
        $carrinho = Carrinho::with('itens')->where('user_id', Auth::id())->first();

        // Verifica se o carrinho existe e conta os itens
        $quantidade = $carrinho ? $carrinho->itens->sum('quantidade') : 0;

        // Armazena a quantidade na sessão para ser usada na view
        session(['cart_count' => $quantidade]);

        return response()->json(['quantidade' => $quantidade]);
    }
}
