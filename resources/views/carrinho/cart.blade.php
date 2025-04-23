@extends('layouts.app')

@section('titulo', 'Carrinho de Compras')

@section('content')
    <div class="container p-5">
        <div class="row container">
            <h2 class="mb-4">Carrinho de Compras</h2>
            <!-- Lista de Itens do Carrinho -->
            <div class="col-md-8">
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
                                <input type="checkbox" class="form-check-input checkbox-item" name="itensSelecionados[]"
                                    value="{{ $item->id }}" data-preco="{{ $item->preco_unitario }}"
                                    data-quantidade="{{ $item->quantidade }}">

                                <!-- Imagem do Produto -->
                                <div class="col-md-2">
                                    <img src="{{ asset($item->produto->imagem ?? 'assets/images/Flor Oficial.png') }}"
                                        class="w-16 h-16 object-cover rounded-md border border-gray-300"
                                        alt="{{ $item->produto->nome }}">
                                </div>
                                <div class="col-md-6">
                                    <h5>{{ $item->produto->nome }}</h5>
                                    <p class="text-success">Quantidade no carrinho: {{ $item->quantidade }}</p>

                                    <div class="d-flex align-items-center mt-2">

                                        <!-- Botão de aumentar quantidade -->
                                        <form action="{{ route('carrinho.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="quantity" value="{{ $item->quantidade - 1 }}">
                                            <button class="btn btn-outline-secondary btn-sm" type="submit"><i
                                                    class="fa-solid fa-minus"></i></button>
                                        </form>

                                        <!-- Exibe a quantidade atual -->
                                        <span class="mx-3">{{ $item->quantidade }}</span>

                                        <form action="{{ route('carrinho.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="quantity" value="{{ $item->quantidade + 1 }}">
                                            <button class="btn btn-outline-secondary btn-sm" type="submit"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </form>

                                        <!-- Botão de remover item -->
                                        <form action="{{ route('carrinho.destroy', ['carrinho' => $carrinho->id]) }}" method="POST">
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
            @if(count($carrinho->itens) > 0)
                <div class="col-md-4">
                    <div class="border rounded shadow-sm bg-white p-4 position-sticky" style="top: 20px;">
                        <h5 class="mb-3 fw-bold">Resumo do Pedido</h5>

                        <!-- Lista de itens resumida -->
                        <ul class="list-group mb-3">
                            @foreach($carrinho->itens as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-semibold">{{ $item->produto->nome }}</span>
                                        <br>
                                        <small class="text-muted">Qtd: {{ $item->quantidade }}</small>
                                    </div>
                                    <span class="fw-bold">R$
                                        {{ number_format($item->produto->preco * $item->quantidade, 2, ',', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Totais -->
                        <div class="mb-2 d-flex justify-content-between">
                            <span>Subtotal ({{ count($carrinho->itens) }} produtos):</span>
                            <strong>R$ <span id="subtotalValor">0,00</span></strong>
                        </div>

                        {{-- Frete ou desconto pode entrar aqui futuramente --}}
                        <div class="mb-2 d-flex justify-content-between">
                            <span>Frete:</span>
                            <strong>R$ 10,00</strong>
                        </div>

                        <hr>

                        <div class="mb-4 d-flex justify-content-between fs-5">
                            <span class="fw-bold">Total:</span>
                            <strong class="text-success">R$ <span id="totalValor">0,00</span></strong>

                        </div>

                        <form action="{{ route('pedido.store') }}" method="POST" id="formFecharPedido">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="tipo_entrega" value="normal">

                            <!-- Os checkboxes já estão no loop, então não precisa repetir aqui -->

                            <button type="submit" class="btn btn-lg btn-block w-100 text-white fw-bold" style="background-color: #FF69B4">
                                Fechar Pedido
                            </button>
                        </form>

                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function atualizarSubtotal() {
                let subtotal = 0;
                $('.checkbox-item:checked').each(function () {
                    const preco = parseFloat($(this).data('preco'));
                    const qtd = parseInt($(this).data('quantidade'));
                    subtotal += preco * qtd;
                });
                $('#subtotalValor').text(subtotal.toLocaleString('pt-BR', { minimumFractionDigits: 2 }));
                $('#totalValor').text((subtotal + 10).toLocaleString('pt-BR', { minimumFractionDigits: 2 })); // Frete fixo 10
            }

            $('.checkbox-item').on('change', atualizarSubtotal);
            atualizarSubtotal();

            $('#formFecharPedido').on('submit', function () {
                // Remove checkboxes antigos se existirem
                $(this).find('input[name="itensSelecionados[]"]').remove();

                // Clona os checkboxes selecionados e adiciona ao form
                $('.checkbox-item:checked').each(function () {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'itensSelecionados[]',
                        value: $(this).val()
                    }).appendTo('#formFecharPedido');
                });

                // Se nenhum item for selecionado, bloqueia o envio
                if ($('.checkbox-item:checked').length === 0) {
                    alert("Nenhum item selecionado.");
                    return false;
                }
            });
        });
    </script>

@endsection
