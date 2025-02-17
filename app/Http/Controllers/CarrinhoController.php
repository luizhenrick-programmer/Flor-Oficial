<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::getContent();
        $subtotal = \Cart::getSubTotal();
        return view('carrinho.cart', compact('itens', 'subtotal'));
    }

    public function adicionaCarrinho(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->nome,
            'price' => $request->preco,
            'stock' => $request->estoque,
            'quantity' => abs($request->quantidade),
            'attributes' => [
                'image' => $request->url
            ]
        ]);

        return redirect()->route('shopping')->with('message', 'Produto adicionado com sucesso!');
    }

    public function removeCarrinho(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart')->with('message', 'Produto removido com sucesso!');
    }

    public function atualizaCarrinho(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ],
        ]);

        return redirect()->route('cart')->with('message', 'Produto atualizado com sucesso!');
    }

    public function clearCarrinho()
    {
        \Cart::clear();
        return redirect()->route('cart')->with('message', 'O Carrinho está vazio!');
    }
}
