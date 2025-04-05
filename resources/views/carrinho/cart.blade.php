@extends('layouts.app')

@section('titulo', 'Carrinho de Compras')

@section('content')
    <div class="container mt-5">
        <div class="row container">
            <!-- Lista de Itens do Carrinho -->
            <div class="col-md-8">
                <h2 class="mb-4">Carrinho de Compras</h2>

                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check-circle"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($carrinho && $carrinho->itens->isNotEmpty())
                    @foreach($carrinho->itens as $item)
                        <div class="card mb-3 p-3">
                            <div class="row g-3 align-items-center">
                                <!-- Imagem do Produto -->
                                <div class="col-md-2">
                                    <img src="{{ asset($item->produto->attributes->image) }}"
                                        class="w-16 h-16 object-cover rounded-md border border-gray-300"
                                        alt="{{ $item->produto->nome }}">
                                </div>
                                <div class="col-md-6">
                                    <h5>{{ $item->produto->nome }}</h5>
                                    <p class="text-success">Quantidade no carrinho: {{ $item->quantidade }}</p>

                                    <div class="d-flex align-items-center mt-2">
                                        <!-- Botão de diminuir quantidade -->
                                        <form action="{{ route('updateCart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="quantity" value="{{ max(1, $item->quantidade - 1) }}">
                                            <button class="btn btn-outline-secondary btn-sm" type="submit" {{ $item->quantidade <= 1 ? 'disabled' : '' }}>-</button>
                                        </form>

                                        <!-- Exibe a quantidade atual -->
                                        <span class="mx-3">{{ $item->quantidade }}</span>

                                        <!-- Botão de aumentar quantidade -->
                                        <form action="{{ route('updateCart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="quantity" value="{{ $item->quantidade + 1 }}">
                                            <button class="btn btn-outline-secondary btn-sm" type="submit">+</button>
                                        </form>

                                        <!-- Botão de remover item -->
                                        <form action="{{ route('removerCart') }}" method="POST">
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
                                    <h5 class="text-danger">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Resumo do Pedido -->
                        @if(count($carrinho->itens) > 0)
                            <div class="col-md-4">
                                <div class="border p-3 rounded shadow-sm bg-light position-sticky" style="top: 20px;">
                                    <h5>Subtotal ({{ count($carrinho->itens) }} produtos): <strong>R$
                                            {{ number_format($subtotal, 2, ',', '.') }}</strong></h5>
                                    {{-- pagamento--}}
                                    <a href="{{ route('pagamento.index') }}">
                                        <button class="btn w-100 btn-primary btn-lg" style="background-color: #FF69B4">Fechar
                                            pedido</button>
                                    </a>
                                </div>
                            </div>
                        @endif
                @else
                    <div class="flex flex-col justify-center bg-orange-100 px-2 text-amber-700 rounded-lg shadow-lg w-2/3 mb-6">
                        <div class="flex flex-row pt-2 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24"
                                height="24">
                                <path fill-rule="evenodd"
                                    d="M12 2a1 1 0 0 1 .866.5l10 17A1 1 0 0 1 22 21H2a1 1 0 0 1-.866-1.5l10-17A1 1 0 0 1 12 2zm0 4a1 1 0 0 0-.993.883L11 7v6a1 1 0 0 0 1.993.117L13 13V7a1 1 0 0 0-1-1zm0 10a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                            </svg>
                            <h3 class="text-lg font-bold">Seu carrinho está vazio... Vamos às compras?</h3>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
