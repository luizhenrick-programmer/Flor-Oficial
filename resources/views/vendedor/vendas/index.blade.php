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

@extends('vendedor.app')

@section('titulo', 'Painel de Vendas')

@section('content')
<div class="container-xl flex flex-col py-5">
<x-text color='gray-200' size='xs' bold='true'>VENDAS TOTAIS</x-text>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
        <!-- Pedidos -->
        <div class="bg-gray-700 shadow-md rounded-lg p-4">
            <h5 class="text-lg font-bold mb-3 text-white">Vendas Concluidas</h5>
            <h1 class="text-4xl font-bold mt-2">0</h1>
        </div>
    </div>
</div>
@endsection