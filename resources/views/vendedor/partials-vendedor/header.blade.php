<header class="bg-gray-800 p-4 shadow-md flex justify-between items-center">
    <div class="flex items-center space-x-4">
        <input type="text" placeholder="Pesquisar..." class="px-3 py-2 rounded-md bg-gray-700 text-white">
        <a href="{{ route('dashboard') }}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
            <i class="fas fa-globe mr-2"></i> Website
        </a>
    </div>

    <div class="flex items-center space-x-4">
    <!-- Ícone do carrinho -->
    <button class="relative flex items-center justify-center">
        <i class="fas fa-shopping-cart"></i>
        <span class="absolute top-0 right-0 bg-red-500 text-xs rounded-full w-4 h-4 flex items-center justify-center">0</span>
    </button>

    <!-- Avatar e informações do usuário -->
    <div class="flex items-center space-x-3">
        <!-- Avatar -->
        <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center text-white">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <!-- Nome e email -->
        <div class="leading-tight">
            <p class="font-bold text-white">{{ Auth::user()->name }}</p>
            <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
        </div>
    </div>
</div>

<!-- 
    <div class="flex items-center space-x-3">
        <button class="relative">
            <i class="fas fa-shopping-cart"></i>
            <span class="absolute top-0 right-0 bg-red-500 text-xs rounded-full w-4 h-4 flex items-center justify-center">0</span>
        </button>

        <div class="flex items-center space-x-4">
            <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center text-white">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="leading-tight">
                <p class="font-bold">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div> -->
</header>
