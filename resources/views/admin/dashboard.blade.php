<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/jvectormap@3.0.0/jquery-jvectormap.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jvectormap@3.0.0/jquery-jvectormap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jvectormap@3.0.0/maps/jquery-jvectormap-br-mill.js"></script>

<style>
    #map-container, #chart-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px;
    }
    #brasil-map {
      width: 600px;
      height: 400px;
    }
    #line-chart {
      width: 600px;
      height: 400px;
    }
  </style>

@extends('admin.app')

@section('titulo', 'Painel de Controle')

@section('content')
    <div class="container-xl flex flex-col py-5">
        <x-text color='gray-200' size='xs' bold='true'>PAINEL DE CONTROLE</x-text>
        <div class="bg-gray-700 rounded-lg border-l-4 border-violet-500 text-gray-200 mt-4 p-3" role="alert">
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
                <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao painel de controle! Use
                    as ferramentas com responsabilidade e cuidado!</x-text>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
            <!-- Pedidos -->
            <div class="bg-gray-700 shadow-md rounded-lg p-4">
                <h5 class="text-lg font-bold mb-3 text-white">Pedidos</h5>
                <h1 class="text-4xl font-bold mt-2">0</h1>
            </div>
            <!-- Produtos -->
            <div class="bg-gray-700 shadow-md rounded-lg p-4">
                <h5 class="text-lg font-bold mb-2 text-white">Produtos</h5>
                <h1 class="text-white" style="font-size: 4rem;">0</h1>
            </div>
            <!-- Clientes -->
            <div class="bg-gray-700 shadow-md rounded-lg p-4">
                <h5 class="text-lg font-bold mb-2 text-white">Clientes</h5>
                <h1 class="text-white" style="font-size: 4rem;">0</h1>
            </div>
            <!-- Avaliações -->
            <div class="bg-gray-700 shadow-md rounded-lg p-4">
                <h5 class="text-lg font-bold mb-2 text-white">Avaliações</h5>
                <h1 class="text-white" style="font-size: 4rem;">0</h1>
            </div>
        </div>

        <div class="bg-gray-700 text-gray-200 mt-4">
            <div class="">
                <x-text color='purple-300' size="lg">Análise do site</x-text>
            </div>
            <div class="card-body">
                <canvas></canvas>
            </div>
        </div>
    </div>
@endsection
