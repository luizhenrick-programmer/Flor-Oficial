@extends('layouts.app')

@section('titulo', 'Carrinho de Compras')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Lista de Itens do Carrinho -->
            <div class="col-md-8">
                <h2 class="mb-4">Carrinho de Compras</h2>

                @foreach($cartItems as $item)
                    <!--fazer função para aparecer os itens no carrinho que o usuario adicionar, com crud  -->
                @endforeach
            </div>

            <!-- Resumo do Pedido -->
            <div class="col-md-4">
                <div class="border p-3">
                    <h4>Resumo do Pedido</h4>
                    <p>Subtotal ({{ count($cartItems) }} produtos): <strong>R$ {{ number_format($total, 2, ',', '.') }}</strong></p>
                    <button class="btn w-100" style="background-color: #FF69B4; color: white;">Fechar Pedido</button>
                </div>
            </div>
        </div>
    </div>
@endsection
