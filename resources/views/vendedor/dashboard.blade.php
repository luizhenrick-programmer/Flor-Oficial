<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@extends('admin.app')

@section('titulo', 'Dashboard Vendedor')

@section('content')
    <div class="container-xl flex flex-col">
        <h1 class="text-center mb-4">Painel de Controle</h1>
        <!-- Dashboard Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total de Usuários</h5>
                        <p class="card-text display-6">1,234</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Eventos Criados</h5>
                        <p class="card-text display-6">567</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Inscrições Pendentes</h5>
                        <p class="card-text display-6">89</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Erro no Sistema</h5>
                        <p class="card-text display-6">3</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Usuários por Mês</div>
                    <div class="card-body">
                        <canvas id="userChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Eventos por Categoria</div>
                    <div class="card-body">
                        <canvas id="eventChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de Conteúdos -->
        <div class="mt-4">
            <h3>Últimos Eventos</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Evento de Tecnologia</td>
                        <td>Tecnologia</td>
                        <td>07/12/2024</td>
                        <td><button class="btn btn-primary btn-sm">Detalhes</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Feira de Negócios</td>
                        <td>Negócios</td>
                        <td>08/12/2024</td>
                        <td><button class="btn btn-primary btn-sm">Detalhes</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Workshop de Design</td>
                        <td>Design</td>
                        <td>09/12/2024</td>
                        <td><button class="btn btn-primary btn-sm">Detalhes</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script>
        // Gráfico de Usuários por Mês
        const userCtx = document.getElementById('userChart').getContext('2d');
        new Chart(userCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Usuários',
                    data: [50, 100, 150, 200, 250, 300, 350],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true
                }]
            }
        });

        // Gráfico de Eventos por Categoria
        const eventCtx = document.getElementById('eventChart').getContext('2d');
        new Chart(eventCtx, {
            type: 'doughnut',
            data: {
                labels: ['Tecnologia', 'Negócios', 'Design', 'Saúde', 'Outros'],
                datasets: [{
                    label: 'Eventos',
                    data: [30, 20, 15, 10, 25],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ]
                }]
            }
        });
    </script>
    </div>
@endsection

