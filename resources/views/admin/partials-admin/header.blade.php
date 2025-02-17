<header class="flex items-center justify-between shadow-md bg-gray-800 p-2">
    <div class="flex items-center justify-center hover:bg-violet-500 focus:hover:bg-violet-500 rounded lg:hidden ">
        <button class="btn border-0 text-white font-bold hover:text-violet-500 focus:text-violet-500" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#menu-princial" aria-controls="menu-princial">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="menu-princial" aria-labelledby="menu-principal-app">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white font-bold mx-auto" id="offcanvasExampleLabel">Menu Principal</h5>
                <button type="button" class="btn bg-transparent border font-bold text-white rounded-md mx-0"
                    data-bs-dismiss="offcanvas" aria-label="Close">X</button>
            </div>
            <div class="offcanvas-body">

            </div>
        </div>
    </div>
    <div class="flex flex-row items-center justify-center">
        <img class="rounded-full w-16 h-16 mx-2" src="{{ asset('assets/images/logoSite.png')}}" alt="Logo">
        <div class="flex flex-col align-items">
            <h1 class="text-lg font-bold text-white mb-1">Flor Oficial</h1>
            <p class="text-sm text-nowrap text-gray-400 mb-0">BY Thays Conrado</p>
        </div>
    </div>
    <div class="hidden flex-row items-center justify-center lg:flex">
        <input type="text" placeholder="Faça uma pesquisa..."
            class="border rounded-lg shadow-sm mx-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        <a href="{{route('home')}}">
            <button type="button"
                class="flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <i class="fa-solid fa-globe mr-2"></i>
                Ver Flor Oficial
            </button>
        </a>
    </div>

    <div class="flex items-center justify-between gap-6 px-6 py-4 text-white">
        <!-- Notificações -->
        <div class="hidden items-center gap-6 lg:flex">
            <button class="relative flex items-center justify-center p-2 rounded-full hover:bg-gray-600">
                <i class="fas fa-bell text-lg"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            </button>
            <button class="relative flex items-center justify-center p-2 rounded-full hover:bg-gray-600">
                <i class="fas fa-shopping-cart text-lg"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            </button>
        </div>

        <!-- Usuário -->
        <div class="flex items-center gap-4">
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="h-12 w-12 overflow-hidden rounded-full border-2 border-gray-700">
                        <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar" class="object-cover">
                    </button>
                </x-slot>
                <x-slot name="content">
                    @auth
                        <x-dropdown-link class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                            :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <x-dropdown-link class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @endauth
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</header>
