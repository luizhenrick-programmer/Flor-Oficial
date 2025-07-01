@extends('layouts.app')

@section('titulo', 'Compra de Vestuário')

@section('content')
    {{-- Exibição de mensagens de erro --}}
    @if (session('error'))
        <div class="relative flex w-full items-center justify-center py-3">
            <div id="error-toast" class="bg-red-400 text-white text-sm font-bold px-3 py-2 rounded-lg shadow-md">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="flex flex-col flex-grow items-center justify-around px-3 py-2 bg-gray-100">
        <section class="flex flex-col md:flex-row gap-6 mt-5 w-full">

            {{-- Sidebar - Filtros --}}
            <div class="hidden md:flex flex-col md:w-1/4 p-6">
                {{-- Categorias --}}
                <div class="mb-6">
                    <h2 class="font-bold text-xl mb-4">Categorias</h2>
                    <ul class="space-y-2 px-3">
                        @foreach ($categorias as $categoria)
                            <li>
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="categoria" value="{{ $categoria->id }}"
                                        class="filter-checkbox hidden">
                                    <span
                                        class="text-md text-dark font-semibold no-underline hover:text-pink-500 hover:underline transition">
                                        {{ $categoria->nome }}
                                    </span>
                                </label>
                            </li>
                        @endforeach
                    </ul>

                </div>

                {{-- Cores --}}
                <div class="mb-6">
                    <h2 class="font-bold text-xl mb-4">Cores</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['#f39c12', '#e91e63', '#4a148c', '#3498db', '#2ecc71', '#e74c3c'] as $cor)
                            <label class="cursor-pointer">
                                <input type="checkbox" name="cor" value="{{ $cor }}" class="filter-checkbox hidden">
                                <span class="w-6 h-6 rounded-full block border" style="background-color: {{ $cor }};"></span>
                            </label>
                        @endforeach

                    </div>
                </div>

                {{-- Tamanho --}}
                <div class="mb-6">
                    <h2 class="font-bold text-xl mb-4">Tamanho</h2>
                    <div class="grid grid-cols-3 gap-2 w-2/3">
                        @foreach (['PP', 'P', 'M', 'G', 'GG', 'XGG'] as $tamanho)
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span
                                    class="flex items-center justify-center px-1 py-1 w-12 border rounded hover:bg-orange-300 hover:text-white transition">
                                    {{ $tamanho }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                @if (Count($marcas) > 0)
                    {{-- Marcas --}}
                    <div>
                        <h2 class="font-bold text-xl mb-4">Marcas</h2>
                        <ul class="space-y-2 px-2">
                            @foreach ($marcas as $marca)
                                <li>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" name="marcas" value="{{ $marca->id }}">
                                        <span class="mx-2">{{ $marca->nome }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="flex flex-col w-full md:w-3/4">
                <div class="w-full mb-6">
                    <img src="{{ asset('assets/images/banner1200x400.png') }}" alt="Banner" class="rounded-lg shadow-lg">
                </div>
                <h5 class="text-xl font-semibold mb-4">Compre Agora</h5>
                @if (!$produtos->count())
                    <div
                        class="flex flex-col justify-center bg-yellow-100 px-2 text-yellow-800 rounded-lg shadow-lg w-full mb-6">
                        <div class="flex flex-row pt-2 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24"
                                height="24">
                                <path fill-rule="evenodd"
                                    d="M12 2a1 1 0 0 1 .866.5l10 17A1 1 0 0 1 22 21H2a1 1 0 0 1-.866-1.5l10-17A1 1 0 0 1 12 2zm0 4a1 1 0 0 0-.993.883L11 7v6a1 1 0 0 0 1.993.117L13 13V7a1 1 0 0 0-1-1zm0 10a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                            </svg>
                            <h3 class="text-lg font-bold">Atenção</h3>
                        </div>
                        <p class="text-sm font-semibold">Não há produtos cadastrados no momento!</p>
                    </div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check-circle"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 place-items-center">
                    @foreach ($produtos as $produto)
                        <div class="relative flex flex-col justify-center bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition w-full max-w-xs">
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

                                <form action="{{ route('carrinho.add') }}" method="POST" class="absolute bottom-0 left-0 right-0">
                                    @csrf
                                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                    <input type="hidden" name="preco_unitario" value="{{ $produto->preco }}">
                                    <input type="number" name="quantidade" value="1" min="1" class="hidden">

                                    <button type="submit" class="w-full bg-purple-800 text-white text-xs font-bold py-2 hover:bg-purple-900 transition">
                                        ADICIONAR AO CARRINHO
                                    </button>
                                </form>
                            </div>

                            <div class="p-3 flex flex-col gap-2">
                                <div class="text-xs text-gray-500">{{ $produto->categoria->nome ?? '' }}</div>

                                <!-- Avaliação -->
                                <div class="flex items-center gap-1 text-yellow-400 text-xs">
                                    <span>★★★★★</span>
                                    <span class="text-gray-400">(0 Avaliações)</span>
                                </div>

                                <!-- Nome do Produto -->
                                <a href="{{ route('produtos.show', $produto->id) }}" class="text-md font-medium no-underline text-gray-800">
                                    {{ $produto->nome }}
                                </a>


                                <!-- Preço -->
                                <div class="flex items-center gap-2">
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    {{-- Importando Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/12004a6e82.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
