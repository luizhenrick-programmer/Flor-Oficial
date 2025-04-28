@extends('admin.app')
@section('titulo', 'E-commerce')

@section('content')
<div class="container-xl flex flex-col py-5">

    <x-text color='gray-200' size='sm' bold='true'>E-COMMERCE</x-text>
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
            <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao Painel de Vendas!</x-text>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Botões de acesso -->
        <a href="#" class="flex flex-col gap-2 items-center px-3 py-5 bg-gray-800 text-white rounded-lg no-underline hover:bg-indigo-600 transition shadow-lg">
            <i class="fa-solid fa-chart-pie text-2xl "></i>
            <span class="text-lg font-semibold">Relatório de Vendas</span>
        </a>

        <a href="#" class="flex flex-col gap-2 items-center px-3 py-5 bg-gray-800 text-white rounded-lg no-underline hover:bg-indigo-600 transition shadow-lg">
            <i class="fa-solid fa-shopping-bag text-2xl "></i>
            <span class="text-lg font-semibold">Pedidos Confirmados</span>
        </a>

        <a href="#" class="flex flex-col gap-2 items-center px-3 py-5 bg-gray-800 text-white rounded-lg no-underline hover:bg-indigo-600 transition shadow-lg">
            <i class="fa-regular fa-hourglass-half text-2xl "></i>
            <span class="text-lg font-semibold">Pedidos Pendentes</span>
        </a>

        <a href="#" class="flex flex-col gap-2 items-center px-3 py-5 bg-gray-800 text-white rounded-lg no-underline hover:bg-indigo-600 transition shadow-lg">
            <i class="fa-solid fa-ban text-2xl "></i>
            <span class="text-lg font-semibold">Pedidos Cancelados</span>
        </a>

        <a href="{{ route('produtos.index') }}" class="flex flex-col gap-2 items-center px-3 py-5 bg-gray-800 text-white rounded-lg no-underline hover:bg-indigo-600 transition shadow-lg">
            <i class="fa-brands fa-product-hunt text-2xl "></i>
            <span class="text-lg font-semibold">Produtos</span>
        </a>

        <a href="#" class="flex flex-col gap-2 items-center px-3 py-5 bg-gray-800 text-white rounded-lg no-underline hover:bg-indigo-600 transition shadow-lg">
            <i class="fa-solid fa-truck-fast text-2xl "></i>
            <span class="text-lg font-semibold">Remessas</span>
        </a>

        <a href="#" class="flex flex-col gap-2 items-center px-3 py-5 bg-gray-800 text-white rounded-lg no-underline hover:bg-indigo-600 transition shadow-lg">
            <i class="fa-solid fa-star text-2xl "></i>
            <span class="text-lg font-semibold">Avaliações</span>
        </a>

        <a href="{{ route('e-commerce.clientes') }}" class="flex flex-col gap-2 items-center px-3 py-5 bg-gray-800 text-white rounded-lg no-underline hover:bg-indigo-600 transition shadow-lg">
            <i class="fa-solid fa-users text-2xl "></i>
            <span class="text-lg font-semibold">Clientes</span>
        </a>
    </div>

</div>
@endsection
