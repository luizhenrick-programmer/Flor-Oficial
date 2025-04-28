@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

        <!-- Imagem do produto -->
        <div class="relative">
            <a href="{{ route('produtos.show', $produto->id) }}">
                @if ($produto->imagens->isNotEmpty())
                    <img src="{{ asset('storage/' . $produto->imagens->first()->url) }}" alt="Imagem do produto" class="w-full object-cover aspect-square">
                @else
                    <img src="{{ asset('storage/produtos/sem-imagem.png') }}" alt="Imagem do produto" class="w-full object-cover aspect-square">
                @endif
            </a>

            @if ($produto->desconto > 0)
                @php
                    $porcentagem = round(($produto->desconto / $produto->preco) * 100);
                @endphp
                <div class="absolute top-2 left-2 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $porcentagem }}% OFF
                </div>
            @endif
        </div>

        <!-- Detalhes do produto -->
        <div>
            <a href="{{ route('shopping') }}" class="text-sm font-semibold  no-underline hover:underline">VOLTAR A LOJA</a>

            <h1 class="mt-5 text-2xl font-semibold text-gray-800">{{ $produto->nome }}</h1>

            <!-- Descrição -->
            <div class="mt-2">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Descrição</h2>
                <p class="text-gray-600 leading-relaxed">{{ $produto->descricao }}</p>
            </div>

            <!-- Preço -->
            <div class="flex items-center gap-2 mb-4">
                @if ($produto->desconto > 0)
                    @php
                        $preco_desconto = $produto->preco - $produto->desconto;
                    @endphp
                    <span class="text-orange-400 font-bold text-lg">
                        R$ {{ number_format($preco_desconto, 2, ',', '.') }}
                    </span>
                    <span class="text-gray-400 line-through text-sm">
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </span>
                @else
                    <span class="text-orange-400  font-bold text-lg">
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </span>
                @endif
            </div>

            <!-- Seleção de tamanho -->
            <div class="mb-6">
                <label for="tamanho" class="block text-gray-700 text-sm font-semibold mb-2">Tamanho</label>
                <select id="tamanho" name="tamanho" class="border-gray-300 rounded-lg py-2 px-4 w-40 text-sm focus:ring focus:border-blue-300">
                    @foreach ($produto->variacoes as $variacao)
                        <option value="{{ $variacao->tamanho }}">{{ strtoupper($variacao->tamanho) }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Quantidade -->
            <label for="quantidade" class="block text-gray-700 text-sm font-semibold mb-2">Quantidade</label>
            <div class="flex items-center border rounded-lg overflow-hidden mb-3">
                <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200" onclick="changeQuantity(-1)">−</button>
                <input type="number" name="quantidade" value="1" min="1" class="w-12 text-center border-0 focus:ring-0 text-gray-800">
                <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200" onclick="changeQuantity(1)">+</button>
            </div>


            <!-- Formulário de compra -->
            <form action="{{ route('carrinho.add') }}" method="POST" class="flex items-center gap-4">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="nome" value="{{ $produto->nome }}">
                <input type="hidden" name="preco" value="{{ $produto->preco }}">
                <input type="hidden" name="url" value="{{ $produto->url }}">

                <!-- Botão Comprar -->
                <button type="submit" class="bg-red-500 hover:bg-red-600 transition-colors text-white text-sm font-bold py-3 px-8 rounded-md shadow-lg">
                    ADICIONAR AO CARRINHO
                </button>
            </form>
        </div>
    </div>

    <!-- Produtos Relacionados -->
    @if ($relacionados->count() > 0)
    <div class="mt-16">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Produtos Relacionados</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach ($relacionados as $item)
                <div class="border rounded-xl overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="relative">
                        <a href="{{ route('produtos.show', $item->id) }}">
                            @if ($item->imagens->isNotEmpty())
                                <img src="{{ asset('storage/' . $item->imagens->first()->url) }}" alt="Imagem do produto" class="w-full object-cover aspect-square">
                            @else
                                <img src="{{ asset('storage/produtos/sem-imagem.png') }}" alt="Imagem do produto" class="w-full object-cover aspect-square">
                            @endif
                        </a>

                        @if ($produto->desconto > 0)
                            @php
                                $porcentagem = round(($produto->desconto / $produto->preco) * 100);
                            @endphp
                            <div class="absolute top-2 left-2 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $porcentagem }}% OFF
                            </div>
                        @endif
                    </div>

                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-800">{{ $item->nome }}</h3>
                        <div class="flex items-center space-x-2 mt-3">
                            @if($item->desconto > 0)
                                <span class="text-gray-400 line-through text-xs">R$ {{ number_format($item->preco_antigo, 2, ',', '.') }}</span>
                            @endif
                            <span class="text-red-500 text-lg font-bold">R$ {{ number_format($item->preco, 2, ',', '.') }}</span>
                        </div>

                        <form action="{{ route('carrinho.add') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="hidden" name="nome" value="{{ $item->nome }}">
                            <input type="hidden" name="preco" value="{{ $item->preco }}">
                            <input type="hidden" name="url" value="{{ $item->url }}">
                            <input type="number" name="quantidade" value="1" min="1" class="hidden">

                            <button type="submit" class="bg-red-500 hover:bg-red-600 transition-colors w-full py-2 rounded-full text-white text-xs font-bold shadow">
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

<!-- Script para mudar quantidade -->
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
