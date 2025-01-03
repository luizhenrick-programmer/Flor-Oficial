@extends('admin.app')

@section('titulo', 'E-commerce')

@section('content')
<div class="container-xl flex flex-col py-5">
    <x-text color='gray-200' size='xs' bold='true'>E-COMMERCE</x-text>
    <div class="bg-gray-700 rounded-lg border-l-4 border-violet-500 text-gray-200 my-4 p-3" role="alert">
        <div class="flex items-center">
            <div class="mr-3">
                <svg class="icon alert-icon svg-icon-ti-ti-alert-circle" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                    <path d="M12 8v4"></path>
                    <path d="M12 16h.01"></path>
                </svg>
            </div>
            <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao painel de controle! Use as ferramentas com responsabilidade e cuidado!</x-text>
        </div>
    </div>
    <x-text color='gray-200' size='xs' bold='true' class="mt-8">ACESSO RÁPIDO</x-text>
    <div class="grid gap-4 grid-cols-2 mt-8 md:grid-cols-4 lg:grid-cols-4">
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Relatório de Vendas
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-thumbs-up"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Pedidos Confirmados
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Pedidos Pendentes
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-thumbs-down"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Pedidos Cancelados
                </div>
            </div>
        </a>
        <a href="{{ route('admin.produtos') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Produtos
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Remessas
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Faturas
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-cart-arrow-down"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Devoluções
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-house-medical"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Inventário de Vendas
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-tags"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Categorias de Produtos
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Coleções de Produtos
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-registered"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Marcas
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="text-xs sm:text-sm	text-nowrap">
                    Avaliações
                </div>
            </div>
        </a>
        <a href="{{ route('admin.e-commerce') }}"
            class="block rounded-lg p-2 text-gray-300 hover:text-yellow-500">
            <div class="flex flex-col items-center">
                <div class="bg-violet-500 rounded-lg p-2 mb-2">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="text-xs sm:text-sm	text-xs sm:text-sm	text-nowrap">
                    Clientes
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
