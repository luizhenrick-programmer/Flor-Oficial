<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Cart::getContent();
        return view('carrinho.cart', compact('itens'));
    }
    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->nome,
            'price' => $request->preco,
            'quantity' => abs($request->quantidade),
            'attributes' => array(
                'image' => $request->imagem
            )
        ]);
        return redirect()->route('cart')->with('message', 'Produto adicionado com sucesso!');
    }
    public function removeCarrinho(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart')->with('message', 'Produto removido com sucesso!');
    }
    public function atulizaCarrinho(Request $request){
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ],
        ]);
        return redirect()->route('cart')->with('message', 'Produto atulizado com sucesso!');
    }
    public function clearCarrinho(Request $request){
        \Cart::clear();
        return redirect()->route('cart')->with('message', 'O Carrinho está vazio!');
    }
}
