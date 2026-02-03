@extends('layouts.app')

@section('titulo', $produto->nome)

@section('content')
<div class="bg-gray-50 min-h-screen pb-20">
    
    {{-- Breadcrumbs (Navegação) --}}
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex text-sm text-gray-500">
                <a href="{{ route('loja.index') }}" class="hover:text-purple-600">Loja</a>
                <span class="mx-2">/</span>
                <span class="hover:text-purple-600">{{ $produto->categoria->nome }}</span>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">{{ $produto->nome }}</span>
            </nav>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        
        {{-- Alertas --}}
        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-8">
                
                {{-- 1. Galeria de Imagens --}}
                <div class="p-6 lg:p-8 bg-white">
                    {{-- Imagem Principal --}}
                    <div class="relative aspect-square bg-gray-100 rounded-lg overflow-hidden mb-4 border border-gray-200 group">
                        <img id="mainImage" 
                             src="{{ $produto->imagemPrincipal->url_completa ?? asset('img/placeholder.png') }}" 
                             alt="{{ $produto->nome }}" 
                             class="w-full h-full object-cover object-center">
                        
                        @if($produto->desconto > 0)
                            <div class="absolute top-4 left-4 bg-red-600 text-white text-sm font-bold px-3 py-1 rounded shadow">
                                -{{ round(($produto->desconto / $produto->preco) * 100) }}% OFF
                            </div>
                        @endif
                    </div>

                    {{-- Miniaturas --}}
                    @if($produto->imagens->count() > 1)
                        <div class="flex gap-2 overflow-x-auto pb-2 custom-scrollbar">
                            @foreach($produto->imagens as $img)
                                <button onclick="changeImage('{{ $img->url_completa }}')" 
                                        class="flex-shrink-0 w-20 h-20 border-2 border-transparent hover:border-purple-600 rounded-md overflow-hidden transition focus:outline-none focus:border-purple-600">
                                    <img src="{{ $img->url_completa }}" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- 2. Informações e Compra --}}
                <div class="p-6 lg:p-8 bg-gray-50 lg:border-l border-gray-100 flex flex-col">
                    
                    <span class="text-sm text-purple-600 font-bold uppercase tracking-wider mb-1">
                        {{ $produto->categoria->nome }}
                    </span>
                    
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-2 leading-tight">
                        {{ $produto->nome }}
                    </h1>

                    {{-- Avaliação Fake para dar moral --}}
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400 text-sm">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <span class="text-xs text-gray-500 ml-2">(4.8 de 5 baseada em vendas)</span>
                    </div>

                    {{-- Preço --}}
                    <div class="mb-6 bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        @if ($produto->desconto > 0)
                            <p class="text-gray-400 line-through text-sm">De R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                            <div class="flex items-end gap-2">
                                <span class="text-4xl font-extrabold text-gray-900">
                                    R$ {{ number_format($produto->preco - $produto->desconto, 2, ',', '.') }}
                                </span>
                                <span class="text-green-600 font-bold mb-1 text-sm">à vista</span>
                            </div>
                            <p class="text-purple-700 text-sm font-semibold mt-1">
                                <i class="fa-regular fa-credit-card"></i> em até 12x no cartão
                            </p>
                        @else
                            <div class="flex items-end gap-2">
                                <span class="text-4xl font-extrabold text-gray-900">
                                    R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                </span>
                            </div>
                            <p class="text-purple-700 text-sm font-semibold mt-1">
                                <i class="fa-regular fa-credit-card"></i> em até 3x sem juros
                            </p>
                        @endif
                    </div>

                    {{-- Formulário de Adição ao Carrinho --}}
                    <form action="{{ route('carrinho.add') }}" method="POST" id="addToCartForm">
                        @csrf
                        <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                        {{-- O JS vai preencher esse campo com o ID da variação escolhida --}}
                        <input type="hidden" name="variacao_id" id="variacao_id_input" required>

                        {{-- Seletores de Variação --}}
                        <div class="mb-6 space-y-4">
                            
                            {{-- Tamanhos --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tamanho:</label>
                                <div class="flex flex-wrap gap-2" id="tamanho-container">
                                    @php
                                        // Filtra tamanhos únicos para mostrar os botões
                                        $tamanhosUnicos = $produto->variacoes->pluck('tamanho')->unique();
                                    @endphp
                                    @foreach($tamanhosUnicos as $tamanho)
                                        <button type="button" 
                                                class="option-btn size-btn w-12 h-12 flex items-center justify-center border-2 border-gray-200 rounded-lg font-bold text-gray-600 hover:border-purple-500 hover:text-purple-600 transition"
                                                data-type="tamanho" 
                                                data-value="{{ $tamanho }}">
                                            {{ $tamanho }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Cores --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Cor:</label>
                                <div class="flex flex-wrap gap-3" id="cor-container">
                                    @php
                                        $coresUnicas = $produto->variacoes->pluck('cor')->unique();
                                    @endphp
                                    @foreach($coresUnicas as $cor)
                                        <button type="button" 
                                                class="option-btn color-btn relative w-10 h-10 rounded-full border-2 border-gray-200 shadow-sm hover:scale-110 transition"
                                                style="background-color: {{ $cor }}"
                                                data-type="cor" 
                                                data-value="{{ $cor }}"
                                                title="{{ $cor }}">
                                                {{-- Checkmark via CSS --}}
                                        </button>
                                    @endforeach
                                </div>
                                <p id="stock-display" class="text-sm text-gray-500 mt-2 h-5"></p>
                            </div>

                            {{-- Quantidade --}}
                            <div class="flex items-center gap-3">
                                <label class="text-sm font-bold text-gray-700">Quantidade:</label>
                                <div class="flex items-center border border-gray-300 rounded-lg bg-white">
                                    <button type="button" onclick="updateQty(-1)" class="px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-l-lg">-</button>
                                    <input type="number" name="quantidade" id="qty" value="1" min="1" class="w-12 text-center border-none focus:ring-0 p-0 text-gray-900 font-bold">
                                    <button type="button" onclick="updateQty(1)" class="px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-r-lg">+</button>
                                </div>
                            </div>
                        </div>

                        {{-- Botões de Ação --}}
                        <div class="flex flex-col gap-3 mt-auto">
                            <button type="submit" 
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-extrabold text-lg py-4 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                <i class="fa-solid fa-bag-shopping"></i> COMPRAR AGORA
                            </button>
                            
                            <button type="button" onclick="submitCart()"
                                    class="w-full bg-purple-100 hover:bg-purple-200 text-purple-700 font-bold text-lg py-3 rounded-xl transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-cart-plus"></i> Adicionar ao Carrinho
                            </button>
                        </div>
                    </form>

                    {{-- Garantias --}}
                    <div class="mt-8 grid grid-cols-2 gap-4 text-xs text-gray-500 border-t border-gray-200 pt-6">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-truck-fast text-xl text-purple-600"></i>
                            <span>Entrega rápida para todo Brasil</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-xl text-green-600"></i>
                            <span>Compra 100% Segura e Garantida</span>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Descrição do Produto --}}
            <div class="p-6 lg:p-10 border-t border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Descrição do Produto</h2>
                <div class="prose max-w-none text-gray-600 leading-relaxed">
                    {!! nl2br(e($produto->descricao)) !!}
                </div>
            </div>
        </div>

        {{-- Produtos Relacionados --}}
        @if($relacionados->isNotEmpty())
            <div class="mt-16 mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <span class="bg-purple-600 w-2 h-8 rounded-full"></span>
                    Quem viu, também gostou
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relacionados as $relacionado)
                        <x-card-produto :produto="$relacionado" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

{{-- Scripts para Galeria e Variações --}}
<script>
    // 1. Galeria de Imagens
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }

    // 2. Controle de Quantidade
    function updateQty(change) {
        const input = document.getElementById('qty');
        let newVal = parseInt(input.value) + change;
        if (newVal < 1) newVal = 1;
        input.value = newVal;
    }

    // 3. Lógica de Variações (CRUCIAL)
    // Passamos as variações do PHP para o JS
    const variacoes = @json($produto->variacoes);
    
    let selectedSize = null;
    let selectedColor = null;

    // Elementos do DOM
    const sizeBtns = document.querySelectorAll('.size-btn');
    const colorBtns = document.querySelectorAll('.color-btn');
    const hiddenInput = document.getElementById('variacao_id_input');
    const stockDisplay = document.getElementById('stock-display');

    function checkSelection() {
        // Reseta estados
        hiddenInput.value = '';
        stockDisplay.innerText = '';
        stockDisplay.classList.remove('text-red-500', 'text-green-600');

        if (selectedSize && selectedColor) {
            // Tenta encontrar a variação que combine os dois
            const match = variacoes.find(v => v.tamanho === selectedSize && v.cor === selectedColor);

            if (match) {
                if (match.estoque > 0) {
                    hiddenInput.value = match.id;
                    stockDisplay.innerText = `Estoque disponível: ${match.estoque} unidades`;
                    stockDisplay.classList.add('text-green-600');
                } else {
                    stockDisplay.innerText = 'Produto indisponível nesta combinação.';
                    stockDisplay.classList.add('text-red-500');
                }
            } else {
                stockDisplay.innerText = 'Combinação indisponível.';
                stockDisplay.classList.add('text-red-500');
            }
        }
    }

    // Event Listeners para Tamanho
    sizeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove ativo dos outros
            sizeBtns.forEach(b => {
                b.classList.remove('border-purple-600', 'bg-purple-50', 'text-purple-700');
                b.classList.add('border-gray-200', 'text-gray-600');
            });
            // Ativa o atual
            btn.classList.remove('border-gray-200', 'text-gray-600');
            btn.classList.add('border-purple-600', 'bg-purple-50', 'text-purple-700');
            
            selectedSize = btn.dataset.value;
            checkSelection();
        });
    });

    // Event Listeners para Cor
    colorBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove ativo dos outros
            colorBtns.forEach(b => {
                b.classList.remove('ring-2', 'ring-purple-500', 'ring-offset-2');
            });
            // Ativa o atual
            btn.classList.add('ring-2', 'ring-purple-500', 'ring-offset-2');
            
            selectedColor = btn.dataset.value;
            checkSelection();
        });
    });

    // Validação antes de enviar
    document.getElementById('addToCartForm').addEventListener('submit', function(e) {
        if (!hiddenInput.value) {
            e.preventDefault();
            alert('Por favor, selecione um tamanho e uma cor disponíveis!');
        }
    });

    function submitCart() {
        document.getElementById('addToCartForm').submit();
    }
</script>

<style>
    /* Estilização da barra de rolagem da galeria */
    .custom-scrollbar::-webkit-scrollbar {
        height: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #d1d5db; 
        border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #9ca3af; 
    }
</style>
@endsection