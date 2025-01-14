@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@section('titulo', 'Compra de Vestuário')

@section('content')
    @if (session('error'))
        <div class="relative flex w-full items-center justify-center py-3">
            <div id="error-toast" class="bg-red-400 text-sm text-dark font-bold px-3 py-2 rounded-lg">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <main>
        <div class="flex flex-col flex-grow items-center justify-around px-3 py-3">
            <section class="flex flex-col md:flex-row gap-6 mt-5">
                <div class="hidden md:flex flex-col md:w-1/4 p-6 rounded-lg">
                    <div class="mb-6">
                        <h2 class="font-bold text-xl mb-4">Categorias</h2>
                        <ul class="space-y-2 px-3">
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Vestidos</a>
                            </li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Shorts</a>
                            </li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Moletons</a>
                            </li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Trajes
                                    de Banho</a></li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Jaquetas</a>
                            </li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Camisas
                                    e Tops</a></li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Jeans</a>
                            </li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Calças</a>
                            </li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Homens</a>
                            </li>
                            <li><a href="#"
                                    class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-wavy hover:decoration-pink-500 transition">Mulheres</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-6">
                        <h2 class="font-bold text-xl mb-4">Cores</h2>
                        <div class="flex flex-wrap gap-2">
                            <label class="cursor-pointer">
                                <input type="checkbox" name="color" class="hidden">
                                <span class="w-6 h-6 rounded-full block" style="background-color: #f39c12;"></span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="color" class="hidden">
                                <span class="w-6 h-6 rounded-full block" style="background-color: #e91e63;"></span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="color" class="hidden">
                                <span class="w-6 h-6 rounded-full block" style="background-color: #4a148c;"></span>
                            </label>
                            <!-- Adicione mais cores aqui -->
                        </div>
                    </div>
                    <div class="mb-6">
                        <h2 class="font-bold text-xl mb-4">Tamanho</h2>
                        <div class="grid grid-cols-3 gap-2 w-2/3">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span
                                    class="flex items-center justify-center px-2 py-2 w-12 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">PP</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span
                                    class="flex items-center justify-center px-2 py-2 w-12 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">P</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span
                                    class="flex items-center justify-center px-2 py-2 w-12 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">M</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span
                                    class="flex items-center justify-center px-2 py-2 w-12 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">G</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span
                                    class="flex items-center justify-center px-2 py-2 w-12 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">GG</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span
                                    class="flex items-center justify-center px-2 py-2 w-12 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">XGG</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <h2 class="font-bold text-xl mb-4">Marcas</h2>
                        <ul class="space-y-2 px-2">
                            <li>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="brand">
                                    <span class="mx-2">Louis Vuitton</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="brand">
                                    <span class="mx-2">Adidas</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="flex flex-col w-full md:w-3/4">
                    <div class="w-full mb-6">
                        <img src="https://via.placeholder.com/900x400" alt="Banner" class="rounded-lg shadow-lg">
                    </div>
                    <h5 class="text-xl font-semibold mb-4">Compre Agora</h5>
                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="relative flex flex-col items-center justify-center">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x400" alt="Produto 1"
                                    class="rounded-lg shadow-lg w-full">
                                <a href="{{ route('cliente.pagamento') }}"
                                    class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 no-underline text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                    Vamos as compras
                                </a>
                            </div>
                            <p class="flex items-center justify-start mt-2 w-full font-semibold">Produto 1</p>
                        </div>
                        <div class="relative flex flex-col items-center justify-center">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x400" alt="Produto 1"
                                    class="rounded-lg shadow-lg w-full">
                                <a href="{{ route('cliente.pagamento') }}"
                                    class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 no-underline text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                    Vamos as compras
                                </a>
                            </div>
                            <p class="flex items-center justify-start mt-2 w-full font-semibold">Produto 2</p>
                        </div>
                        <div class="relative flex flex-col items-center justify-center">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x400" alt="Produto 1"
                                    class="rounded-lg shadow-lg w-full">
                                <a href="{{ route('cliente.pagamento') }}"
                                    class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 no-underline text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                    Vamos as compras
                                </a>
                            </div>
                            <p class="flex items-center justify-start mt-2 w-full font-semibold">Produto 3</p>
                        </div>
                        <div class="relative flex flex-col items-center justify-center">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x400" alt="Produto 1"
                                    class="rounded-lg shadow-lg w-full">
                                <a href="{{ route('cliente.pagamento') }}"
                                    class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 no-underline text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                    Vamos as compras
                                </a>
                            </div>
                            <p class="flex items-center justify-start mt-2 w-full font-semibold">Produto 4</p>
                        </div>
                        <div class="relative flex flex-col items-center justify-center">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x400" alt="Produto 1"
                                    class="rounded-lg shadow-lg w-full">
                                <a href="{{ route('cliente.pagamento') }}"
                                    class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 no-underline text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                    Vamos as compras
                                </a>
                            </div>
                            <p class="flex items-center justify-start mt-2 w-full font-semibold">Produto 5</p>
                        </div>
                        <div class="relative flex flex-col items-center justify-center">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x400" alt="Produto 1"
                                    class="rounded-lg shadow-lg w-full">
                                <a href="{{ route('cliente.pagamento') }}"
                                    class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 no-underline text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                    Vamos as compras
                                </a>
                            </div>
                            <p class="flex items-center justify-start mt-2 w-full font-semibold">Produto 6</p>
                        </div>
                        <div class="relative flex flex-col items-center justify-center">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x400" alt="Produto 1"
                                    class="rounded-lg shadow-lg w-full">
                                <a href="{{ route('cliente.pagamento') }}"
                                    class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 no-underline text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                    Vamos as compras
                                </a>
                            </div>
                            <p class="flex items-center justify-start mt-2 w-full font-semibold">Produto 7</p>
                        </div>
                        <div class="relative flex flex-col items-center justify-center">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x400" alt="Produto 1"
                                    class="rounded-lg shadow-lg w-full">
                                <a href="{{ route('cliente.pagamento') }}"
                                    class="absolute bottom-0 left-0 w-full bg-pink-400 text-white text-center py-3 no-underline text-sm font-bold rounded-b-lg hover:bg-pink-600 hover:underline transition">
                                    Vamos as compras
                                </a>
                            </div>
                            <p class="flex items-center justify-start mt-2 w-full font-semibold">Produto 8</p>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center">
                        <a href="{{ route('shopping') }}"
                            class="bg-gray-800 text-white py-2 px-6 rounded-lg hover:bg-gray-700 transition">
                            Ver tudo
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
