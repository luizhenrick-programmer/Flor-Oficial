@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Imagem do produto -->
            <div class="relative">
                <img src="{{ asset($produto->url) }}" alt="{{ $produto->nome }}" class="w-full rounded-lg shadow-lg">
                @if($produto->desconto > 0)
                    <div class="absolute top-2 left-2 bg-pink-400 text-white text-xs font-bold px-3 py-1 rounded-full">
                        {{ $produto->desconto }}% OFF
                    </div>
                @endif
            </div>

            <!-- Detalhes do produto -->
            <div>
                <nav class="text-sm text-gray-400 mb-3">
                    <a href="{{ route('home') }}" class="hover:underline">Início</a> >
                    <a href="{{ $produto->categoria_id }}" class="hover:underline">{{ $produto->categoria->nome }}</a> >
                    <span class="text-black">{{ $produto->nome }}</span>
                </nav>

                <h1 class="text-3xl font-bold mb-3">{{ $produto->nome }}</h1>

                <div class="flex items-center space-x-2 mb-3">
                    @if($produto->desconto > 0)
                        <span class="text-gray-400 line-through text-lg">R$
                            {{ number_format($produto->preco_antigo, 2, ',', '.') }}</span>
                    @endif
                    <span class="text-pink-500 text-3xl font-bold">R$
                        {{ number_format($produto->preco, 2, ',', '.') }}</span>
                </div>

                <a href="#" class="text-xs text-gray-500 underline mb-4 inline-block">Ver mais detalhes</a>

                <!-- Seleção de tamanho -->
                <div class="mb-4">
                    <label for="tamanho" class="block text-sm font-medium mb-1">Tamanho</label>
                    <select id="tamanho" name="tamanho" class="border border-gray-300 rounded-lg py-2 px-3 w-32 text-sm">
                        <option value="{{ $produto->tamanho }}">{{ $produto->tamanho }}</option>
                    </select>
                </div>

                <!-- Formulário de compra -->
                <form action="{{ route('addCart') }}" method="POST" class="flex items-center space-x-4">
                    @csrf
                    <input type="hidden" name="id" value="{{ $produto->id }}">
                    <input type="hidden" name="nome" value="{{ $produto->nome }}">
                    <input type="hidden" name="preco" value="{{ $produto->preco }}">
                    <input type="hidden" name="url" value="{{ $produto->url }}">

                    <!-- Quantidade -->
                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                        <button type="button" class="px-3 py-2 bg-gray-200 text-lg text-gray-600"
                            onclick="changeQuantity(-1)">−</button>
                        <input type="number" name="quantidade" value="1" min="1"
                            class="w-12 text-center border-0 focus:ring-0">
                        <button type="button" class="px-3 py-2 bg-gray-200 text-lg text-gray-600"
                            onclick="changeQuantity(1)">+</button>
                    </div>

                    <!-- Botão comprar -->
                    <button type="submit"
                        class="bg-pink-400 text-white py-2 px-6 rounded-full text-sm font-bold hover:bg-pink-600 transition">
                        COMPRAR
                    </button>
                </form>

                <!-- Descrição -->
                <div class="mt-8">
                    <h2 class="text-sm font-bold text-pink-500 mb-2">Descrição</h2>
                    <p class="text-gray-600">{{ $produto->descricao }}</p>
                </div>
            </div>
        </div>
        <!-- Produtos Relacionados -->
        @if ($relacionados->count() > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-4 text-center">Produtos Relacionados</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach ($relacionados as $item)
                        <div class="border rounded-lg overflow-hidden shadow-lg">
                            <a href="{{ route('produto.show', $item->id) }}" class="block">
                                <img src="{{ asset($item->url) }}" alt="{{ $item->nome }}" class="w-full h-48 object-cover">
                            </a>

                            <div class="p-4">
                                <h3 class="text-sm font-semibold">{{ $item->nome }}</h3>
                                <div class="flex items-center space-x-2 mt-2">
                                    @if($item->desconto > 0)
                                        <span class="text-gray-400 line-through text-xs">R$
                                            {{ number_format($item->preco_antigo, 2, ',', '.') }}</span>
                                    @endif
                                    <span class="text-pink-500 text-lg font-bold">R$
                                        {{ number_format($item->preco, 2, ',', '.') }}</span>
                                </div>

                                <form action="{{ route('addCart') }}" method="POST" class="mt-3">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="nome" value="{{ $item->nome }}">
                                    <input type="hidden" name="preco" value="{{ $item->preco }}">
                                    <input type="hidden" name="url" value="{{ $item->url }}">
                                    <input type="number" name="quantidade" value="1" min="1" class="hidden">

                                    <button type="submit"
                                        class="bg-pink-400 text-white py-1 w-full rounded-full text-xs font-bold hover:bg-pink-600 transition">
                                        COMPRAR
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

    <!-- Script para ajustar a quantidade -->
    <script>
        function changeQuantity(amount) {
            const input = document.querySelector('input[name="quantidade"]');
            let value = parseInt(input.value, 10);
            value = isNaN(value) ? 1 : value;
            value += amount;
            if (value < 1) value = 1;
            input.value = value;
        }
    </script>
@endsection
