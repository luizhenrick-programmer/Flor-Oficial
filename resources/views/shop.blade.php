@extends('layouts.app')

@section('titulo', 'Compra de Vestuário')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger text-center bg-red-100 text-red-700 p-4 rounded-lg">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <main>
        <div class="flex flex-col flex-grow items-center justify-around px-3 py-3">
            <section class="flex flex-col md:flex-row gap-6 mt-5">
                <div class="hidden md:flex flex-col w-full md:w-1/4 p-6 rounded-lg">
                    <div class="mb-6">
                        <h2 class="font-bold text-xl mb-4">Categorias</h2>
                        <ul class="space-y-2 px-3">
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Vestidos</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Shorts</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Moletons</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Trajes de Banho</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Jaquetas</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Camisas e Tops</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Jeans</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Calças</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Homens</a></li>
                            <li><a href="#" class="text-md text-dark font-semibold no-underline mx-0 hover:text-pink-500 hover:underline hover:decoration-pink-500 hover:decoration-wavy transition">Mulheres</a></li>
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
                        <div class="flex flex-wrap gap-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span class="px-4 py-2 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">PP</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span class="px-4 py-2 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">P</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="size" class="hidden">
                                <span class="px-4 py-2 border rounded focus:bg-pink-500 focus:text-white active:bg-pink-500 active:text-white">M</span>
                            </label>
                            <!-- Adicione mais tamanhos -->
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
                        <div class="relative group flex flex-col items-center justify-center">
                            <img src="https://via.placeholder.com/300x400" alt="Produto 1" class="rounded-lg shadow-lg">
                            <p class="mt-2 font-semibold">Produto 1</p>
                            <a href="{{ route('cliente.pagamento') }}"
                               class="flex w-2/3 mt-2 bg-blue-500 items-center justify-center text-white no-underline text-center py-2 rounded hover:bg-blue-600 hover:underline transition">
                               COMPRAR O ITEM
                            </a>
                        </div>
                        <div class="relative group flex flex-col items-center justify-center">
                            <img src="https://via.placeholder.com/300x400" alt="Produto 1" class="rounded-lg shadow-lg">
                            <p class="mt-2 font-semibold">Produto 2</p>
                            <a href="{{ route('cliente.pagamento') }}"
                               class="flex w-2/3 mt-2 bg-blue-500 items-center justify-center text-white no-underline text-center py-2 rounded hover:bg-blue-600 hover:underline transition">
                               COMPRAR O ITEM
                            </a>
                        </div>
                        <div class="relative group flex flex-col items-center justify-center">
                            <img src="https://via.placeholder.com/300x400" alt="Produto 1" class="rounded-lg shadow-lg">
                            <p class="mt-2 font-semibold">Produto 3</p>
                            <a href="{{ route('cliente.pagamento') }}"
                               class="flex w-2/3 mt-2 bg-blue-500 items-center justify-center text-white no-underline text-center py-2 rounded hover:bg-blue-600 hover:underline transition">
                               COMPRAR O ITEM
                            </a>
                        </div>
                        <div class="relative group flex flex-col items-center justify-center">
                            <img src="https://via.placeholder.com/300x400" alt="Produto 1" class="rounded-lg shadow-lg">
                            <p class="mt-2 font-semibold">Produto 4</p>
                            <a href="{{ route('cliente.pagamento') }}"
                               class="flex w-2/3 mt-2 bg-blue-500 items-center justify-center text-white no-underline text-center py-2 rounded hover:bg-blue-600 hover:underline transition">
                               COMPRAR O ITEM
                            </a>
                        </div>
                        <div class="relative group flex flex-col items-center justify-center">
                            <img src="https://via.placeholder.com/300x400" alt="Produto 1" class="rounded-lg shadow-lg">
                            <p class="mt-2 font-semibold">Produto 5</p>
                            <a href="{{ route('cliente.pagamento') }}"
                               class="flex w-2/3 mt-2 bg-blue-500 items-center justify-center text-white no-underline text-center py-2 rounded hover:bg-blue-600 hover:underline transition">
                               COMPRAR O ITEM
                            </a>
                        </div>
                        <div class="relative group flex flex-col items-center justify-center">
                            <img src="https://via.placeholder.com/300x400" alt="Produto 1" class="rounded-lg shadow-lg">
                            <p class="mt-2 font-semibold">Produto 6</p>
                            <a href="{{ route('cliente.pagamento') }}"
                               class="flex w-2/3 mt-2 bg-blue-500 items-center justify-center text-white no-underline text-center py-2 rounded hover:bg-blue-600 hover:underline transition">
                               COMPRAR O ITEM
                            </a>
                        </div>
                        <div class="relative group flex flex-col items-center justify-center">
                            <img src="https://via.placeholder.com/300x400" alt="Produto 1" class="rounded-lg shadow-lg">
                            <p class="mt-2 font-semibold">Produto 7</p>
                            <a href="{{ route('cliente.pagamento') }}"
                               class="flex w-2/3 mt-2 bg-blue-500 items-center justify-center text-white no-underline text-center py-2 rounded hover:bg-blue-600 hover:underline transition">
                               COMPRAR O ITEM
                            </a>
                        </div>
                        <div class="relative group flex flex-col items-center justify-center">
                            <img src="https://via.placeholder.com/300x400" alt="Produto 1" class="rounded-lg shadow-lg">
                            <p class="mt-2 font-semibold">Produto 8</p>
                            <a href="{{ route('cliente.pagamento') }}"
                               class="flex w-2/3 mt-2 bg-blue-500 items-center justify-center text-white no-underline text-center py-2 rounded hover:bg-blue-600 hover:underline transition">
                               COMPRAR O ITEM
                            </a>
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
