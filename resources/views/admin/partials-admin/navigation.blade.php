<nav class="hidden flex-col bg-gray-800 w-full lg:flex">
    <ul class="w-full h-full list-none mx-0 px-0">
        <!-- Dashboard -->
        <li>
            <button class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline
                    {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 text-white' : '' }}" type="button">
                    <div class="flex items-center">
                        <i class="fa-solid fa-house text-lg"></i>
                        <span class="text-sm mx-3 font-bold">Dashboard</span>
                    </div>
            </a>
        </li>

        <!-- E-commerce -->
        <li>
            <button class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline"
                    type="button" data-bs-toggle="collapse" data-bs-target="#ecommerceMenu" aria-expanded="false" aria-controls="ecommerceMenu">
                <div class="flex items-center">
                    <i class="fa-brands fa-shopify text-lg"></i>
                    <span class="text-sm mx-3 font-bold">E-commerce</span>
                </div>
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div id="ecommerceMenu" class="collapse">
                <ul class="w-full list-none mx-0 px-0">

                    <!-- Relatório de Vendas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-chart-pie text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Relatório de Vendas">Relatório de Vendas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Pedidos Confirmados -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-shopping-bag text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Pedidos Confirmados">Pedidos Confirmados</span>
                            </div>
                        </a>
                    </li>

                    <!-- Pedidos Pendentes -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-hourglass-half text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Pedidos Pendentes">Pedidos Pendentes</span>
                            </div>
                        </a>
                    </li>

                    <!-- Pedidos Cancelados -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-ban text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Pedidos Cancelados">Pedidos Cancelados</span>
                            </div>
                        </a>
                    </li>

                    <!-- Produtos -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-brands fa-product-hunt text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Produtos">Produtos</span>
                            </div>
                        </a>
                    </li>

                    <!-- Remessas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-truck-fast text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Remessas">Remessas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Faturas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-file-invoice-dollar text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Faturas">Faturas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Devoluções -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Devoluções">Devoluções</span>
                            </div>
                        </a>
                    </li>

                    <!-- Inventário de Vendas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-house-medical text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Inventário de Vendas">Inventário de Vendas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Categorias de Produtos -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-tags text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Categorias de Produtos">Categorias de Produtos</span>
                            </div>
                        </a>
                    </li>

                    <!-- Marcas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-registered text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Marcas">Marcas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Avaliações -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-star text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Avaliações">Avaliações</span>
                            </div>
                        </a>
                    </li>

                    <!-- Clientes -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-users text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Clientes">Clientes</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Colaboradores -->
        <li>
            <button class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline"
                    type="button" data-bs-toggle="collapse" data-bs-target="#colaboradoresMenu" aria-expanded="false" aria-controls="colaboradoresMenu">
                <div class="flex items-center">
                    <i class="fa-solid fa-box text-lg"></i>
                    <span class="text-sm mx-3 font-bold">Colaboradores</span>
                </div>
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div id="colaboradoresMenu" class="collapse">
                <ul class="w-full list-none mx-0 px-0">

                    <!-- Relatório de Funcionário -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-users text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Relatório de Funcionário">Relatório de Funcionário</span>
                            </div>
                        </a>
                    </li>

                    <!-- Cadastro de Colaborador -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-users text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Cadastro de Colaborador">Cadastro de Colaborador</span>
                            </div>
                        </a>
                    </li>

                    <!-- Todos os Funcionários -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-users text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Todos os Funcionários">Todos os Funcionários</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Financeiro -->
        <li>
            <button class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline"
                    type="button" data-bs-toggle="collapse" data-bs-target="#financeiroMenu" aria-expanded="false" aria-controls="financeiroMenu">
                <div class="flex items-center">
                    <i class="fa-solid fa-sack-dollar text-lg"></i>
                    <span class="text-sm mx-3 font-bold">Financeiro</span>
                </div>
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div id="financeiroMenu" class="collapse">
                <ul class="pl-8">
                    <li><a href="#" class="text-gray-300 hover:text-white">Relatórios</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Pagamentos</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
