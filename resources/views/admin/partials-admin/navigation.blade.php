<nav class="hidden flex-col w-full lg:flex">
    <ul class="w-full h-full list-none mx-0 px-0">
        <!-- Dashboard -->
        <x-text color='gray-200' size='xs' bold='true' class="px-3 py-4">FERRAMENTAS DE INBOX</x-text>
        <li class="mt-3">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-between w-full px-3 py-2 transition no-underline" type="button"
            {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 text-white' : '' }}>
                <div class="flex items-center">
                    <i class="fa-solid fa-house tw-bg-tertiary text-lg text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 font-bold
                        {{ request()->routeIs('admin.dashboard') ? 'tw-text-accent-1' : 'text-gray-300' }}">
                        Dashboard
                    </span>
                </div>
                <i class="{{ request()->routeIs('admin.dashboard') ? 'fa-solid fa-chevron-right tw-text-accent-1' : ''}}"></i>
            </a>
        </li>


        <!-- E-commerce -->
        <li>
            <a class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition  no-underline "
                    type="button" data-bs-toggle="collapse" data-bs-target="#ecommerceMenu" aria-expanded="false" aria-controls="ecommerceMenu">
                <div class="flex items-center">
                    <i class="fa-brands fa-shopify tw-bg-tertiary text-2xl text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 font-bold
                        {{ request()->routeIs('e-commerce.*') ? 'tw-text-accent-1' : 'text-gray-300' }}">
                        E-commerce
                    </span>
                </div>
                <i class="{{ request()->routeIs('e-commerce.*') ? 'fa-solid fa-chevron-right tw-text-accent-1' : ''}}"></i>
            </a>
            <div id="ecommerceMenu" class="collapse">
                <ul class="w-full list-none mx-0 px-0">

                    <!-- Relatório de Vendas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-chart-pie text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Relatório de Vendas">Relatório de Vendas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Pedidos Confirmados -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-shopping-bag text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Pedidos Confirmados">Pedidos Confirmados</span>
                            </div>
                        </a>
                    </li>

                    <!-- Pedidos Pendentes -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-hourglass-half text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Pedidos Pendentes">Pedidos Pendentes</span>
                            </div>
                        </a>
                    </li>

                    <!-- Pedidos Cancelados -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-ban text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Pedidos Cancelados">Pedidos Cancelados</span>
                            </div>
                        </a>
                    </li>

                    <!-- Produtos -->
                    <li>
                        <a href="{{ route('produtos.index') }}" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-brands fa-product-hunt text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Produtos">Produtos</span>
                            </div>
                        </a>
                    </li>

                    <!-- Remessas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-truck-fast text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Remessas">Remessas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Faturas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-file-invoice-dollar text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Faturas">Faturas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Devoluções -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Devoluções">Devoluções</span>
                            </div>
                        </a>
                    </li>

                    <!-- Inventário de Vendas -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-house-medical text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Inventário de Vendas">Inventário de Vendas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Categorias de Produtos -->
                    <li>
                        <a href="{{ route('e-commerce.categorias') }}" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-tags text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Categorias de Produtos">Categorias de Produtos</span>
                            </div>
                        </a>
                    </li>

                    <!-- Marcas -->
                    <li>
                        <a href="{{ route('e-commerce.marcas') }}" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-registered text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Marcas">Marcas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Avaliações -->
                    <li>
                        <a href="#" class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-star text-lg"></i>
                                <span class="text-sm font-bold truncate" title="Avaliações">Avaliações</span>
                            </div>
                        </a>
                    </li>

                    <!-- Clientes -->
                    <li>
                        <a href='{{ route('e-commerce.clientes') }}' class="flex items-center justify-between w-full text-gray-300 px-12 py-2 transition no-underline truncate hover:bg-gray-700">
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
            <a href="{{ route('colaboradores.index') }}" class="flex items-center justify-between w-full text-gray-300 px-3 py-2 text-gray-300 transition no-underline"
                    type="button">
                <div class="flex items-center">
                    <i class="fa-solid fa-box tw-bg-tertiary text-lg text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 font-bold
                        {{ request()->routeIs('colaboradores.*') ? 'tw-text-accent-1' : 'text-gray-300' }}">
                        Colaboradores
                    </span>
                </div>
                <i class="{{ request()->routeIs('colaboradores.*') ? 'fa-solid fa-chevron-right tw-text-accent-1' : ''}}"></i>
            </a>
        </li>

        <!-- Financeiro -->
        <li class="mb-4">
            <a href="{{ route('financeiro') }}" class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline"
                    type="button">
                <div class="flex items-center">
                    <i class="fa-solid fa-sack-dollar tw-bg-tertiary text-lg text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 font-bold
                        {{ request()->routeIs('financeiro') ? 'tw-text-accent-1' : 'text-gray-300' }}">
                        Financeiro
                    </span>
                </div>
                <i class="{{ request()->routeIs('financeiro') ? 'fa-solid fa-chevron-right tw-text-accent-1' : ''}}"></i>
            </a>
        </li>

        <x-text color='gray-200' size='xs' bold='true' class="px-3 py-4">FERRAMENTAS ADICIONAIS</x-text>
        <li class="mt-3">
            <a href="https://www.instagram.com/flordi.oficial" target=_blank class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline" type="button">
                <div class="flex items-center">
                    <i class="bi bi-instagram tw-bg-tertiary text-2xl text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 text-gray-300 font-bold">
                        Instagram
                    </span>
                </div>
            </a>
        </li>
    </ul>
</nav>
