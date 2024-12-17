<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Título Padrão')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <style>
        .roboto-thin {
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            font-style: normal;
        }

        .roboto-light {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .roboto-regular {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .roboto-medium {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .roboto-bold {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .roboto-black {
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-style: normal;
        }

        .roboto-thin-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            font-style: italic;
        }

        .roboto-light-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            font-style: italic;
        }

        .roboto-regular-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: italic;
        }

        .roboto-medium-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: italic;
        }

        .roboto-bold-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: italic;
        }

        .roboto-black-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-style: italic;
        }
    </style>


    @include('admin.partials-admin.header')

    <main class="bg-gray-100 flex">
        <nav class="navbar navbar-vertical min-vh-100 bg-dark navbar-expand-lg d-flex align-items-start px-4 py-3"
            style="width: 250px">
            <ul class="navbar-nav flex-column w-100">
                <!-- Item simples sem seta -->
                <li class="nav-item">
                    <a class="nav-link text-light d-flex align-items-center roboto-light"
                        href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-house-door me-3"></i>
                        Dashboard
                    </a>
                </li>

                <!-- Item com seta (collapse) -->
                <li class="nav-item">
                    <a class="nav-link text-light d-flex justify-content-between align-items-center w-100 roboto-light"
                        data-bs-toggle="collapse" href="#collapseProdutos" role="button" aria-expanded="false"
                        aria-controls="collapseProdutos">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-shop me-3"></i>
                            E-commerce
                        </span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <div class="collapse" id="collapseProdutos">
                        <ul class="list-unstyled ps-4">
                            <li><a class="nav-link text-light text-truncate" title="Relatório" href="#"><i
                                        class="bi bi-graph-up me-2"></i>Relatório</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Pedidos Confirmados"
                                    href="#"><i class="bi bi-bag-check me-2"></i>Pedidos Confirmados</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Pedidos Pendentes" href="#"><i
                                        class="bi bi-clock me-2"></i>Pedidos Pendentes</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Pedidos Cancelados"
                                    href="#"><i class="bi bi-journal-x me-2"></i>Pedidos Cancelados</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Produtos" href="#"><i
                                        class="bi bi-box-seam me-2"></i>Produtos</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Remessas" href="#"><i
                                        class="bi bi-truck me-2"></i>Remessas</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Faturas" href="#"><i
                                        class="bi bi-file-earmark-text me-2"></i>Faturas</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Devoluções" href="#"><i
                                        class="bi bi-arrow-repeat me-2"></i>Devoluções</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Inventário de Produtos"
                                    href="#"><i class="bi bi-house-check me-2"></i>Inventário de Produtos</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Categorias de Produtos"
                                    href="#"><i class="bi bi-bookmarks me-2"></i>Categorias de Produtos</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Coleções de Produtos"
                                    href="#"><i class="bi bi-bookmark-star me-2"></i>Coleções de Produtos</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Marcas" href="#"><i
                                        class="bi bi-r-circle me-2"></i>Marcas</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Avaliações" href="#"><i
                                        class="bi bi-star me-2"></i>Avaliações</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Clientes" href="#"><i
                                        class="bi bi-person-vcard me-2"></i>Clientes</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light d-flex justify-content-between align-items-center w-100"
                        data-bs-toggle="collapse" href="#collapseFuncionarios" role="button" aria-expanded="false"
                        aria-controls="collapseFuncionarios">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-people me-3"></i>
                            Colaboradores
                        </span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <div class="collapse" id="collapseFuncionarios">
                        <ul class="list-unstyled ps-4">
                            <li><a class="nav-link text-light text-truncate" title="Relatórios de Performance"
                                    href="#"><i class="bi bi-receipt me-2"></i>Relatórios de Performance</a>
                            </li>
                            <li><a class="nav-link text-light text-truncate" title="Cadastrar Colaborador"
                                    href="{{ route('admin.cad-funcionario') }}"><i
                                        class="bi bi-person-plus-fill me-2"></i>Cadastrar Colaborador</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Todos Colaboradores"
                                    href="#"><i class="bi bi-person-check-fill me-2"></i>Todos Colaboradores</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Item com seta (collapse) -->
                <li class="nav-item">
                    <a class="nav-link text-light d-flex justify-content-between align-items-center w-100"
                        data-bs-toggle="collapse" href="#collapsePagamento" role="button" aria-expanded="false"
                        aria-controls="collapsePagamento">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-currency-dollar me-3"></i>
                            Financeiro
                        </span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <div class="collapse" id="collapsePagamento">
                        <ul class="list-unstyled ps-4">
                            <li><a class="nav-link text-light text-truncate" title="Relatórios Financeiros"
                                    href="#"><i class="bi bi-graph-up me-2"></i>Relatórios Financeiros</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Gerenciar Pagamento"
                                    href="#"><i class="bi bi-credit-card me-2"></i>Gerenciar Pagamentos</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Controle de Receitas e Despesas"
                                    href="#"><i class="bi bi-wallet2 me-2"></i>Controle de Receitas e
                                    Despesas</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Gerenciamento de Faturas"
                                    href="#"><i class="bi bi-file-earmark-text me-2"></i>Gerenciamento de
                                    Faturas</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Processamento de Reembolsos"
                                    href="#"><i class="bi bi-arrow-clockwise me-2"></i>Processamento de
                                    Reembolsos</a></li>
                            <li><a class="nav-link text-light text-truncate" title="Controle de Fluxo de Caixa"
                                    href="#"><i class="bi bi-cash me-2"></i>Controle de Fluxo de Caixa</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

        @yield('content')
    </main>

    @include('admin.partials-admin.footer')
</body>

</html>
