@extends('layouts.app')

@section('titulo', 'Carrinho de Compras')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Lista de Itens do Carrinho -->
            <div class="col-md-8">
                <h2 class="mb-4">Carrinho de Compras</h2>

                @if(session('mensagem'))
                    <div class="alert alert-success">
                        {{ session('mensagem') }}
                    </div>
                @endif

                @foreach($itens as $item)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5>{{ $item->name }}</h5>
                                <p>Quantidade:
                                    <button class="btn btn-sm btn-secondary" onclick="updateQuantity({{ $item->id }}, -1)">-</button>
                                    <span class="mx-2">{{ $item->quantity }}</span>
                                    <button class="btn btn-sm btn-secondary" onclick="updateQuantity({{ $item->id }}, 1)">+</button>
                                </p>
                                <p>Preço Unitário: R$ {{ number_format($item->price, 2, ',', '.') }}</p>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-danger" onclick="removeItem({{ $item->id }})">Remover</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Resumo do Pedido -->
            <div class="col-md-4">
                <div class="border p-3">
                    <h4>Resumo do Pedido</h4>
                    <p>Subtotal ({{ count($itens) }} produtos): <strong>R$ </strong></p>
                    <a href="{{ route('cliente.pagamento') }}">
                    <button class="btn w-100 btn-primary btn-lg" style="background-color: #FF69B4">Finalizar Compra</button>
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
