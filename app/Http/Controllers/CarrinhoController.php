<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function showCart()
    {
        $cartItems = session()->get('cart', []);
        $total = array_reduce($cartItems, function($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        return view('carrinho.cart', compact('cartItems', 'total'));
    }
}
