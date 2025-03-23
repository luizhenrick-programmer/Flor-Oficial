@extends('admin.app')

@section('titulo', 'Relatório Financeiro')

@section('content')
<div class="container-xl flex flex-col">
    <x-text color='gray-200' size='xs' bold='true'>RELATÓRIO FINANCEIRO</x-text>
    <div class="tw-bg-secondary rounded-lg border-l-4 border-green-500 text-gray-300 mt-4 p-3" role="alert">
        <div class="flex items-center">
            <div class="mr-3">
                <svg class="icon alert-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                    <path d="M12 8v4"></path>
                    <path d="M12 16h.01"></path>
                </svg>
            </div>
            <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo(a) ao Controle Financeiro!</x-text>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        <div class="tw-bg-secondary shadow-md rounded-lg p-4">
            <h5 class="text-lg font-bold mb-3 text-white">Receitas</h5>
            <h1 class="text-4xl font-bold mt-2 text-green-400">R$ 10.000,00</h1>
        </div>
        <div class="tw-bg-secondary shadow-md rounded-lg p-4">
            <h5 class="text-lg font-bold mb-2 text-white">Despesas</h5>
            <h1 class="text-4xl font-bold mt-2 text-red-400">R$ 4.500,00</h1>
        </div>
        <div class="tw-bg-secondary shadow-md rounded-lg p-4">
            <h5 class="text-lg font-bold mb-2 text-white">Saldo</h5>
            <h1 class="text-4xl font-bold mt-2 text-blue-400">R$ 5.500,00</h1>
        </div>
    </div>

    <div class="tw-bg-secondary text-gray-200 mt-4 p-5 rounded-lg">
        <x-text color='purple-300' size="lg">Análise Financeira</x-text>

        <div class="mt-5">
            <canvas id="finance-chart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById("finance-chart").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun"],
                datasets: [
                    {
                        label: "Receitas",
                        data: [8000, 9500, 7000, 10000, 11000, 12000],
                        backgroundColor: "#22c55e",
                    },
                    {
                        label: "Despesas",
                        data: [5000, 4000, 4500, 6000, 5000, 6500],
                        backgroundColor: "#ef4444",
                    }
                ]
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
    });
</script>
@endsection
