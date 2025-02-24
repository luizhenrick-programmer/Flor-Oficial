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

    <main>
        <div class="flex flex-col flex-grow items-center justify-around px-3 py-2">
            <section class="flex flex-col md:flex-row gap-6 mt-5 w-full">

                {{-- Sidebar - Filtros --}}
                <div class="hidden md:flex flex-col md:w-1/4 p-6">
                    {{-- Categorias --}}
                    <div class="mb-6">
                        <h2 class="font-bold text-xl mb-4">Categorias</h2>
                        <ul class="space-y-2 px-3">
                            @foreach (['Vestidos', 'Shorts', 'Moletons', 'Trajes de Banho', 'Jaquetas', 'Camisas e Tops', 'Jeans', 'Calças', 'Homens', 'Mulheres'] as $categoria)
                                <li>
                                    <a href="#" class="text-md text-dark font-semibold no-underline hover:text-pink-500 hover:underline transition">
                                        {{ $categoria }}
                                    </a>
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
                                    <input type="checkbox" name="color" class="hidden">
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
                                    <span class="flex items-center justify-center px-2 py-2 w-12 border rounded hover:bg-pink-500 hover:text-white transition">
                                        {{ $tamanho }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Marcas --}}
                    <div>
                        <h2 class="font-bold text-xl mb-4">Marcas</h2>
                        <ul class="space-y-2 px-2">
                            @foreach (['Louis Vuitton', 'Adidas', 'Nike', 'Gucci', 'Prada'] as $marca)
                                <li>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" name="brand">
                                        <span class="mx-2">{{ $marca }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col w-full md:w-3/4">
                    <div class="w-full mb-6">
                        <img src="{{ asset('assets/images/banner1200x400.png') }}" alt="Banner" class="rounded-lg shadow-lg">
                    </div>
                    <h5 class="text-xl font-semibold mb-4">Compre Agora</h5>
                    @if (!$produtos->count())
                        <div class="flex flex-col justify-center bg-yellow-100 px-2 text-yellow-800 rounded-lg shadow-lg w-full mb-6">
                            <div class="flex flex-row pt-2 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                                    <path fill-rule="evenodd" d="M12 2a1 1 0 0 1 .866.5l10 17A1 1 0 0 1 22 21H2a1 1 0 0 1-.866-1.5l10-17A1 1 0 0 1 12 2zm0 4a1 1 0 0 0-.993.883L11 7v6a1 1 0 0 0 1.993.117L13 13V7a1 1 0 0 0-1-1zm0 10a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
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

                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($produtos as $produto)
                            <div class="relative flex flex-col items-center text-dark overflow-hidden w-full max-w-xs">
                                <div class="relative w-full">
                                    <img src="{{ asset($produto->url) }}" alt="{{ $produto->nome }}" class="w-full object-cover aspect-square border rounded-lg">

                                    @if($produto->desconto > 0)
                                        <div class="absolute top-2 left-2 bg-pink-400 text-white text-xs font-bold px-3 py-1 rounded-full">
                                            {{ $produto->desconto }}% OFF
                                        </div>
                                    @endif
                                </div>

                                <div class="w-full py-2">
                                    <p class="text-base font-medium">{{ $produto->nome }}</p>

                                    <div class="flex items-center gap-2 mt-1">
                                        @if($produto->desconto > 0)
                                            <span class="text-gray-400 text-sm line-through">R$ {{ number_format($produto->preco_antigo, 2, ',', '.') }}</span>
                                        @endif
                                        <span class="text-pink-400 text-lg font-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                                    </div>

                                    <div class="flex justify-center gap-3 mt-4 w-full">
                                        <form action="{{ route('addCart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $produto->id }}">
                                            <input type="hidden" name="nome" value="{{ $produto->nome }}">
                                            <input type="hidden" name="preco" value="{{ $produto->preco }}">
                                            <input type="hidden" name="url" value="{{ $produto->url }}">
                                            <input type="number" name="quantidade" value="1" min="1" class="hidden">

                                            <button type="submit" class="bg-pink-400 text-white text-lg font-bold py-2 px-4 rounded-full hover:bg-pink-600 transition w-full">
                                                COMPRAR
                                            </button>
                                        </form>

                                        <a href="{{ route('produto.show', $produto->id) }}" class="border text-dark text-lg font-bold py-2 px-4 rounded-full hover:bg-gray-200 transition w-full text-center">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>

    {{-- Importando Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/12004a6e82.js" crossorigin="anonymous"></script>
@endsection
