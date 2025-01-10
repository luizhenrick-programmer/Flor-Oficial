<style>
    a{
        text-decoration: none;
        color: blue;
    }
</style>
<!-- Navegação lateral -->
<nav class="hidden flex-col bg-gray-800 w-full lg:flex">
    <ul class="w-full h-full list-none mx-2 px-3">
        <!-- Dashboard -->
        <li>
            <a href="{{ route('vendedor.dashboard') }}" class="block rounded-lg p-1 text-indigo-700 hover:text-white transition">
                    <div class="flex items-center">
                        <i class="fa-solid fa-house me-1"></i>
                        <span class="text-sm mx-3 font-bold">Dashboard</span>
                    </div>
            </a>
        </li>
        <!-- painel vendas -->
        <li>
        <a href="{{ route('vendedor.vendas') }}" class="block rounded-lg p-1 text-indigo-700 hover:text-white transition">
               <div class="flex items-center"> 
                    <i class="fa-brands fa-shopify me-2"></i>
                    <span class="text-sm mx-3 font-bold">Vendas</span>
                </div>
            </a>
        </li>
        <!-- lista de Produtos -->
        <li>
        <a href="{{ route('vendedor.listaProd') }}" class="block rounded-lg p-1 text-indigo-700 hover:text-white transition">
               <div class="flex items-center"> 
                    <i class="bi bi-cart-fill me-2"></i>
                    <span class="text-sm mx-3 font-bold">Lista Produtos</span>
                </div>
            </a>
        </li>
        <!-- logout -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    type="submit" 
                    class="block rounded-lg p-1 text-indigo-700 hover:text-white transition">
                        <div class="flex items-center">   
                            <i class="bi bi-door-closed-fill me-2"></i>
                            <span class="text-sm mx-3 font-bold">Deslogar</span>
                        </div>
                </button>
            </form>
        </li>

    </ul>











































    <!-- <ul class="mt-6 space-y-3">
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
         Outros itens
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
    </ul> -->
</nav>
