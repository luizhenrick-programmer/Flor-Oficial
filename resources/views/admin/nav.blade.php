<nav class="flex flex-col w-25 h-100 bg-gray-900 py-2">
    <div class="flex items-center justify-center">
        <x-app-logo></x-app-logo>
    </div>
    <ul class="space-y-2 px-2 w-full">
        <!-- Item simples sem seta -->
        <li>
            <a class="flex items-center text-gray-300 no-underline hover:text-white hover:underline font-light"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-house-door mr-3"></i>
                <x-text color="text-gray-300" size="md">Dashboard</x-text>
            </a>
        </li>

        <!-- Item com seta (collapse) -->
        <li>
            <a class="flex items-center justify-content-between w-100 text-gray-300 no-underline hover:text-white hover:underline font-light"
                data-bs-toggle="collapse" href="#collapseProdutos" role="button" aria-expanded="false"
                aria-controls="collapseProdutos">
                <span class="flex items-center">
                    <i class="bi bi-shop mr-3"></i>
                    <x-text color="text-gray-300" size="md">E-commerce</x-text>
                </span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse mt-2" id="collapseProdutos">
                <ul class="space-y-2">
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Relatório" href="#">
                            <i class="bi bi-graph-up me-2"></i>
                            <x-text color="text-gray-300" size="md">Relatório</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Pedidos Confirmados" href="#">
                            <i class="bi bi-bag-check me-2"></i>
                            <x-text color="text-gray-300" size="md">Pedidos Confirmados</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Pedidos Pendentes" href="#">
                            <i class="bi bi-clock me-2"></i>
                            <x-text color="text-gray-300" size="md">Pedidos Pendentes</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Pedidos Cancelados" href="#">
                            <i class="bi bi-journal-x me-2"></i>
                            <x-text color="text-gray-300" size="md">Pedidos Cancelados</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Produtos" href="#">
                            <i class="bi bi-box-seam me-2"></i>
                            <x-text color="text-gray-300" size="md">Produtos</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Remessas" href="#">
                            <i class="bi bi-truck me-2"></i>
                            <x-text color="text-gray-300" size="md">Remessas</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Faturas" href="#">
                            <i class="bi bi-file-earmark-text me-2"></i>
                            <x-text color="text-gray-300" size="md">Faturas</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Devoluções" href="#">
                            <i class="bi bi-arrow-repeat me-2"></i>
                            <x-text color="text-gray-300" size="md">Devoluções</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Inventário de Produtos" href="#">
                            <i class="bi bi-house-check me-2"></i>
                            <x-text color="text-gray-300" size="md">Inventário de Produtos</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Categorias de Produtos" href="#">
                            <i class="bi bi-bookmarks me-2"></i>
                            <x-text color="text-gray-300" size="md">Categorias de Produtos</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Coleções de Produtos" href="#">
                            <i class="bi bi-bookmark-star me-2"></i>
                            <x-text color="text-gray-300" size="md">Coleções de Produtos</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Marcas" href="#">
                            <i class="bi bi-r-circle me-2"></i>
                            <x-text color="text-gray-300" size="md">Marcas</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Avaliações" href="#">
                            <i class="bi bi-star me-2"></i>
                            <x-text color="text-gray-300" size="md">Avaliações</x-text>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Clientes" href="#">
                            <i class="bi bi-person-vcard me-2"></i>
                            <x-text color="text-gray-300" size="md">Clientes</x-text>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class=" text-light d-flex justify-content-between align-items-center w-100" data-bs-toggle="collapse"
                href="#collapseFuncionarios" role="button" aria-expanded="false" aria-controls="collapseFuncionarios">
                <span class="d-flex align-items-center">
                    <i class="bi bi-people me-3"></i>
                    Colaboradores
                </span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse" id="collapseFuncionarios">
                <ul class="space-y-2 ps-4">
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Relatórios de Performance" href="#"><i
                                class="bi bi-receipt me-2"></i>Relatórios de Performance</a>
                    </li>
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Cadastrar Colaborador"
                            href="{{ route('admin.cad-funcionario') }}"><i
                                class="bi bi-person-plus-fill me-2"></i>Cadastrar Colaborador</a></li>
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Todos Colaboradores" href="#"><i
                                class="bi bi-person-check-fill me-2"></i>Todos Colaboradores</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Item com seta (collapse) -->
        <li class="nav-item">
            <a class=" text-light d-flex justify-content-between align-items-center w-100" data-bs-toggle="collapse"
                href="#collapsePagamento" role="button" aria-expanded="false" aria-controls="collapsePagamento">
                <span class="d-flex align-items-center">
                    <i class="bi bi-currency-dollar me-3"></i>
                    Financeiro
                </span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse" id="collapsePagamento">
                <ul class="space-y-2 ps-4">
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Relatórios Financeiros" href="#"><i
                                class="bi bi-graph-up me-2"></i>Relatórios Financeiros</a></li>
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Gerenciar Pagamento" href="#"><i
                                class="bi bi-credit-card me-2"></i>Gerenciar Pagamentos</a></li>
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Controle de Receitas e Despesas" href="#"><i
                                class="bi bi-wallet2 me-2"></i>Controle de Receitas e
                            Despesas</a></li>
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Gerenciamento de Faturas" href="#"><i
                                class="bi bi-file-earmark-text me-2"></i>Gerenciamento de
                            Faturas</a></li>
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Processamento de Reembolsos" href="#"><i
                                class="bi bi-arrow-clockwise me-2"></i>Processamento de
                            Reembolsos</a></li>
                    <li><a class=" flex items-center w-100 text-gray-300 no-underline text-truncate hover:text-white hover:underline font-light" title="Controle de Fluxo de Caixa" href="#"><i
                                class="bi bi-cash me-2"></i>Controle de Fluxo de Caixa</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
