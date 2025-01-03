<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Título Padrão')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sofia&display=swap" rel="stylesheet">
</head>

<body>
    @include('gerente.partials-gerente.header')

    <main class="flex">
            <nav class="navbar navbar-vertical min-vh-100 bg-gray-800 navbar-expand-lg d-flex align-items-start px-4 py-3" style="width: 250px">
                <ul class="navbar-nav flex-column w-100">
                    <!-- Item simples sem seta -->
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex align-items-center" href="#">
                            <i class="bi bi-house-door me-3"></i>
                            Dashboard
                        </a>
                    </li>

                    <!-- Item com seta (collapse) -->
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex justify-content-between align-items-center w-100" data-bs-toggle="collapse" href="#collapseProdutos" role="button" aria-expanded="false" aria-controls="collapseProdutos">
                            <span class="d-flex align-items-center">
                                <i class="bi bi-handbag me-3"></i>
                                Produtos
                            </span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <div class="collapse" id="collapseProdutos">
                            <ul class="list-unstyled ps-4">
                                <li><a class="nav-link text-light" href="#">Adicionar Produto</a></li>
                                <li><a class="nav-link text-light" href="#">Listar Produtos</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Outro item com seta -->
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex justify-content-between align-items-center w-100" data-bs-toggle="collapse" href="#collapseFuncionarios" role="button" aria-expanded="false" aria-controls="collapseFuncionarios">
                            <span class="d-flex align-items-center">
                                <i class="bi bi-people me-3"></i>
                                Funcionários
                            </span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <div class="collapse" id="collapseFuncionarios">
                            <ul class="list-unstyled ps-4">
                                <li><a class="nav-link text-light" href="#">Adicionar Funcionário</a></li>
                                <li><a class="nav-link text-light" href="#">Listar Funcionários</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Mais um item com seta -->
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex justify-content-between align-items-center w-100" data-bs-toggle="collapse" href="#collapsePagamento" role="button" aria-expanded="false" aria-controls="collapsePagamento">
                            <span class="d-flex align-items-center">
                                <i class="bi bi-credit-card me-3"></i>
                                Pagamentos
                            </span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <div class="collapse" id="collapsePagamento">
                            <ul class="list-unstyled ps-4">
                                <li><a class="nav-link text-light" href="#">Gerenciar Pagamentos</a></li>
                                <li><a class="nav-link text-light" href="#">Relatórios</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        @yield('content')
    </main>

    @include('gerente.partials-gerente.footer')
</body>
</html>
