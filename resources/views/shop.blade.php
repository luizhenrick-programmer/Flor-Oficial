@extends('layouts.app')

{{-- Importando Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
        <div class="flex flex-col flex-grow items-center justify-around px-3 py-3">
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
                        <img src="https://picsum.photos/1200/400" alt="Banner" class="rounded-lg shadow-lg">
                    </div>
                    <h5 class="text-xl font-semibold mb-4">Compre Agora</h5>

                    <div class="flex items-center w-full mb-6">
                        <div class="flex border border-gray-300 rounded-lg overflow-hidden shadow-sm">
                            <input type="text" placeholder="Buscar produtos..."
                                class="w-full px-4 py-2 outline-none text-gray-700">
                            <button class="px-4 bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M10 2a8 8 0 1 1-5.293 14.293l-4.22 4.22a1 1 0 0 1-1.415-1.414l4.22-4.22A8 8 0 0 1 10 2zm0 2a6 6 0 1 0 4.243 10.243A6 6 0 0 0 10 4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>


                    @if (!$produtos->count())
                        <div class="flex flex-col justify-center bg-yellow-100 px-2 text-yellow-800 rounded-lg shadow-lg w-96 mb-6">
                            <div class="flex flex-row pt-2 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                                    <path fill-rule="evenodd" d="M12 2a1 1 0 0 1 .866.5l10 17A1 1 0 0 1 22 21H2a1 1 0 0 1-.866-1.5l10-17A1 1 0 0 1 12 2zm0 4a1 1 0 0 0-.993.883L11 7v6a1 1 0 0 0 1.993.117L13 13V7a1 1 0 0 0-1-1zm0 10a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                                </svg>
                                <h3 class="text-lg font-bold">Atenção</h3>
                            </div>
                            <p class="text-sm font-semibold">Não há produtos cadastrados no momento!</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($produtos as $produto)
                            <div class="relative flex flex-col items-center justify-center bg-white p-4 rounded-lg shadow-lg">
                                <div class="relative w-full">
                                    <img src="{{ asset($produto->url) }}" alt="{{ $produto->nome }}"
                                        class="rounded-lg shadow-lg w-full object-cover aspect-[4/3]">

                                    <a href="{{ route('cliente.pagamento') }}"
                                        class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                        Vamos às compras
                                    </a>
                                </div>
                                <p class="mt-2 w-full text-center font-semibold text-gray-800">
                                    {{ $produto->nome }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
