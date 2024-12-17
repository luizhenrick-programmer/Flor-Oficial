<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-geo@3.8.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.2/topojson.min.js"></script>

@extends('admin.app')

@section('titulo', 'Painel de Controle')

@section('content')
    <div class="container-xl flex flex-col">
        <h1 class="text-center mb-4">Painel de Controle</h1>
        <!-- Dashboard Cards -->
        <div class="row mb-4">
            <!-- Cards mantidos sem alterações -->
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-gray-200 text-dark">
                <h4 class="mb-0 fw-normal fs-5">Análise do site</h4>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-7">
                        <canvas id="user-numbers"></canvas>
                    </div>
                    <div class="col-lg-5">
                        <canvas id="users-map"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Gráfico de Usuários por Mês
        const userNumbersCtx = document.getElementById('user-numbers').getContext('2d');

        const userData = {
            labels: ["2024-12-02", "2024-12-03", "2024-12-04", "2024-12-05", "2024-12-06", "2024-12-07"],
            datasets: [
                {
                    label: "Visualizações de Página",
                    data: [4750, 5200, 4759, 6000, 5500, 7000],
                    borderColor: "rgba(54, 162, 235, 1)",
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    fill: true,
                    tension: 0.4
                },
                {
                    label: "Visitantes",
                    data: [1000, 1200, 1000, 1500, 1400, 1700],
                    borderColor: "rgba(255, 99, 132, 1)",
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    fill: true,
                    tension: 0.4
                }
            ]
        };

        new Chart(userNumbersCtx, {
            type: "line",
            data: userData,
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        mode: "index",
                        intersect: false
                    },
                    legend: {
                        display: true,
                        position: "top"
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: "Dias"
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: "Valores"
                        },
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Mapa de Acessos
        const usersMapCtx = document.getElementById('users-map').getContext('2d');

        fetch('https://unpkg.com/world-atlas/countries-110m.json')
            .then(response => response.json())
            .then(worldData => {
                const countries = ChartGeo.topojson.feature(worldData, worldData.objects.countries).features;

                new Chart(usersMapCtx, {
                    type: 'choropleth',
                    data: {
                        labels: countries.map(country => country.properties.name),
                        datasets: [{
                            label: 'Acessos por País',
                            data: countries.map(country => ({
                                feature: country,
                                value: Math.floor(Math.random() * 1000) // Exemplo: Dados aleatórios
                            }))
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: true
                            }
                        },
                        scales: {
                            xy: {
                                projection: 'equalEarth'
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error("Erro ao carregar os dados do mapa:", error);
            });
    </script>
@endsection
