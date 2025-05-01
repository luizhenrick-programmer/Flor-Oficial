@extends('admin.app')

@section('titulo', 'Painel de Controle')

@section('content')
<div class="container-xl flex flex-col">
    <x-text color='gray-200' size='sm' bold='true'>PAINEL DE CONTROLE</x-text>
    <div class="tw-bg-secondary rounded-lg border-l-4 border-violet-500 text-gray-200 mt-4 p-3" role="alert">
        <div class="flex items-center">
            <div class="mr-3">
                <svg class="icon alert-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                    <path d="M12 8v4"></path>
                    <path d="M12 16h.01"></path>
                </svg>
            </div>
            <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao Painel de Controle!</x-text>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
        <div class="tw-bg-secondary shadow-md rounded-lg p-4">
            <h5 class="text-lg font-bold mb-3 text-gray-200">Pedidos</h5>
            <h1 class="text-4xl text-gray-200 font-bold mt-2">0</h1>
        </div>
        <div class="tw-bg-secondary shadow-md rounded-lg p-4">
            <h5 class="text-lg font-bold mb-2 text-gray-200">Produtos</h5>
            <h1 class="text-4xl text-gray-200 font-bold mt-2">
                {{ $produtos->count() ?? 0 }}
            </h1>
        </div>

        <div class="tw-bg-secondary shadow-md rounded-lg p-4">
            <h5 class="text-lg font-bold mb-2 text-gray-200">Clientes</h5>
            <h1 class="text-4xl text-gray-200 font-bold mt-2">
                {{ $usuarios->count() ?? 0 }}
            </h1>
        </div>
        <div class="tw-bg-secondary shadow-md rounded-lg p-4">
            <h5 class="text-lg font-bold mb-2 text-gray-200">Avaliações</h5>
            <h1 class="text-4xl text-gray-200 font-bold mt-2">0</h1>
        </div>
    </div>

    <div class="tw-bg-secondary text-gray-200 mt-4 p-5 rounded-lg">
        <x-text color='purple-300' size="lg">Análise do site</x-text>

        <div class="flex justify-between mt-4 relative gap-4">
            <select id="filter" class="p-2 bg-gray-800 text-white rounded appearance-none pr-8">
                <option value="7">Últimos 7 dias  </option>
                <option value="15">Últimos 15 dias  </option>
                <option value="30">Últimos 30 dias  </option>
                <option value="90">Últimos 3 meses  </option>
                <option value="180">Últimos 6 meses  </option>
                <option value="270">Últimos 9 meses  </option>
                <option value="365">Último 1 ano  </option>
            </select>
        </div>


        <div class="mt-5">
            <canvas id="line-chart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById("line-chart").getContext("2d");
        let chart;

        function generateRandomData(days) {
            let labels = [];
            let data = [];
            let today = new Date();
            for (let i = days - 1; i >= 0; i--) {
                let date = new Date();
                date.setDate(today.getDate() - i);
                labels.push(date.toLocaleDateString("pt-BR"));
                data.push(Math.floor(Math.random() * 100));
            }
            return { labels, data };
        }

        function updateChart(days) {
            let dataset = generateRandomData(days);
            if (chart) chart.destroy();
            chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: dataset.labels,
                    datasets: [{
                        label: "Visitas ao site",
                        data: dataset.data,
                        borderColor: "#8b5cf6",
                        backgroundColor: "rgba(139, 92, 246, 0.2)",
                        borderWidth: 2,
                        fill: true,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        }

        document.getElementById("filter").addEventListener("change", function() {
            updateChart(parseInt(this.value));
        });

        updateChart(7); // Carregar gráfico inicial com 7 dias
    });
</script>
@endsection
