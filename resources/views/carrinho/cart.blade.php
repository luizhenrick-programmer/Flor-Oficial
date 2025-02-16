@extends('layouts.app')

@section('titulo', 'Carrinho de Compras')

@section('content')
    <div class="container mt-5">
        <div class="row container">
            <!-- Lista de Itens do Carrinho -->
            <div class="col-md-8">
                <h2 class="mb-4">Carrinho de Compras</h2>

                @if(session('mensage'))
                    <div class="alert alert-success">
                        {{ session('mensage') }}
                    </div>
                    <div class="modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach($itens as $item)
                    <div class="card mb-3 p-3">
                        <div class="row g-3 align-items-center">
                            <!-- Imagem do Produto -->
                            <div class="col-md-2">
                                <img src="{{ asset($item->attributes->url) }}" alt="{{ $item->nome }}"
                                     class="rounded-lg shadow-lg w-full object-cover aspect-[3/4]">
                            </div>



                            <div class="col-md-6">
                                <h5>{{ $item->name }}</h5>
                                <p class="text-success">Quantidade no carrinho: {{ $item->quantity }}</p>

                                <div class="d-flex align-items-center mt-2">
                                    {{-- Botão de diminuir quantidade --}}
                                    <form action="{{ route('updateCart') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="quantity" value="{{ max(1, $item->quantity - 1) }}">
                                        <button class="btn btn-outline-secondary btn-sm"
                                                type="submit"
                                            {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                            -
                                        </button>
                                    </form>

                                    {{-- Exibe a quantidade atual --}}
                                    <span class="mx-3">{{ $item->quantity }}</span>

                                    {{-- Botão de aumentar quantidade (SEM LIMITE) --}}
                                    <form action="{{ route('updateCart') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                        <button class="btn btn-outline-secondary btn-sm" type="submit">
                                            +
                                        </button>
                                    </form>

                                    {{-- Botão de remover item --}}
                                    <form action="{{ route('removerCart') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-outline-danger btn-sm ms-3" type="submit">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>



                            <!-- Preço -->
                            <div class="col-md-3 text-end">
                                <p>Preço</p>
                                <h5 class="text-danger">R$ {{ number_format($item->price, 2, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Resumo do Pedido -->
            <div class="col-md-4">
                <div class="border p-3 rounded shadow-sm bg-light position-sticky" style="top: 20px;">
                    <h5>Subtotal ({{ count($itens) }} produtos): <strong>R$ {{ number_format($subtotal, 2, ',', '.') }}</strong></h5>
                    {{-- pagamento--}}
                    <a href="{{ route('cliente.pagamento') }}">
                        <button class="btn w-100 btn-primary btn-lg" style="background-color: #FF69B4">Fechar pedido</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
