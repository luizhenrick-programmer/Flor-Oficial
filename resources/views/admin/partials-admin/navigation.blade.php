<nav class="w-64 bg-gray-800 min-h-screen p-6">
    <div class="flex flex-col items-center">
        <img class="rounded-full w-16 h-16 mb-4" src="https://via.placeholder.com/200x200" alt="Logo">
        <h1 class="text-lg font-bold text-white">Flor Oficial</h1>
        <p class="text-sm text-gray-400">BY Thays Conrado</p>
    </div>

    <ul class="mt-8 space-y-4">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="block rounded-lg p-2 transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 text-white' : 'text-gray-300 hover:bg-gray-400 hover:text-black' }}">
                <i class="fa-solid fa-house me-3"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.e-commerce') }}"
               class="block rounded-lg p-2 transition
               {{ request()->routeIs('admin.e-commerce') ? 'bg-indigo-700 text-white' : 'text-gray-300 hover:bg-gray-400 hover:text-black' }}">
                <i class="fa-brands fa-shopify me-3"></i>
                E-commerce
            </a>
        </li>
        <li>
            <a href="{{ route('admin.colaboradores') }}"
               class="block rounded-lg p-2 transition
               {{ request()->routeIs('admin.colaboradores') ? 'bg-indigo-700 text-white' : 'text-gray-300 hover:bg-gray-400 hover:text-black' }}">
                <i class="fa-solid fa-box me-3"></i>
                Colaboradores
            </a>
        </li>
        <li>
            <a href="{{ route('admin.financeiro') }}"
               class="block rounded-lg p-2 transition
               {{ request()->routeIs('admin.financeiro') ? 'bg-indigo-700 text-white' : 'text-gray-300 hover:bg-gray-400 hover:text-black' }}">
               <i class="fa-solid fa-sack-dollar me-3"></i>
                Financeiro
            </a>
        </li>
        <!-- Outros itens -->
    </ul>
</nav>
