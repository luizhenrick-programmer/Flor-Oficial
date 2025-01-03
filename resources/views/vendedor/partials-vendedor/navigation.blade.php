<!-- tira o sublinhado -->
<style>
        a {
            text-decoration: none;
            color: blue;
        }
        
</style>

<!-- Navegação lateral -->
<nav class="w-64 bg-gray-800 min-h-screen p-6">
    <div class="flex flex-col items-center">
        <img class="rounded-full w-20 h-20 mb-1" src="{{ asset('assets/images/logoSite.png') }}" alt="Logo">
        <h1 class="text-lg font-bold text-white">Flor Oficial</h1>
        <p class="text-sm text-gray-400">BY Thays Conrado</p>
    </div>

    <ul class="mt-6 space-y-3">
        <li>
            <a href="{{ route('vendedor.dashboard') }}"
               class="flex items-center justify-start w-full rounded-lg p-2 transition 
               {{ request()->routeIs('vendedor.dashboard') ? 'bg-indigo-700 text-white' : 'text-gray-300 hover:bg-gray-400 hover:text-black' }}">
                <i class="fa-solid fa-house me-3"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('vendedor.vendas') }}"
               class="block rounded-lg p-2 transition
               {{ request()->routeIs('vendedor.dashboard') ? 'bg-indigo-700 text-white' : 'text-gray-300 hover:bg-gray-400 hover:text-black' }}">
                <i class="fa-brands fa-shopify me-3"></i>
                Vendas
            </a>
        </li>
        <!-- Outros itens -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    type="submit" 
                    class="flex items-center justify-start w-full rounded-lg p-2 transition 
                        {{ request()->routeIs('vendedor.dashboard') ? 'bg-indigo-700 text-white' : 'text-gray-300 hover:bg-gray-400 hover:text-black' }}">
                    <i class="bi bi-door-closed-fill me-3"></i>
                    Deslogar
                </button>
            </form>
        </li>
    </ul>
</nav>
