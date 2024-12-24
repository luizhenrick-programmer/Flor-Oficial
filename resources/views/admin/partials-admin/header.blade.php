<header class="bg-gray-800 p-4 shadow-md flex justify-between items-center">
    <div class="flex items-center space-x-4">
        <input type="text" placeholder="Pesquisar..." class="px-3 py-2 rounded-md bg-gray-700 text-white">
        <a href="{{ route('dashboard') }}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
            <i class="fas fa-globe mr-2"></i> Website
        </a>
    </div>

    <div class="flex items-center space-x-4">
        <button class="relative">
            <i class="fas fa-bell"></i>
            <span class="absolute top-0 right-0 bg-red-500 text-xs rounded-full w-4 h-4 flex items-center justify-center">0</span>
        </button>
        <button class="relative">
            <i class="fas fa-shopping-cart"></i>
            <span class="absolute top-0 right-0 bg-red-500 text-xs rounded-full w-4 h-4 flex items-center justify-center">0</span>
        </button>

        <div class="flex items-center space-x-2">
            <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center text-white">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <p class="font-bold">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</header>
