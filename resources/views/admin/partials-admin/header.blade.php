<header class="flex items-center justify-between p-2">
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
    <div class="flex flex-row items-center ">
        <img class="rounded-full w-16 h-16 mx-2" src="{{ asset('assets\images\Flor Oficial.png') }}" alt="Logo">
        <h1 class="text-lg font-bold text-orange-100 montserrat mb-0">Flor Oficial</h1>
    </div>

    <div class="flex items-center justify-between gap-6 px-6 py-4 text-white">
        <!-- Notificações -->
        <div class="hidden items-center gap-6 lg:flex">
            <button class="relative flex items-center justify-center p-2 rounded-full hover:bg-gray-600">
                <i class="fas fa-bell text-2xl"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            </button>
            @if($carrinhosAtivos)
                <div class="dropdown-menu">
                    @foreach($carrinhosAtivos as $carrinho)
                        <div class="p-2 border-b">
                            <strong>{{ $carrinho->user->name ?? 'Visitante' }}</strong><br>
                            @foreach($carrinho->itens as $item)
                                <span>{{ $item->produto->nome }} ({{ $item->quantidade }})</span><br>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endif

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
                            <x-dropdown-link class="block px-4 py-2 text-gray-700 hover:bg-gray-100" :href="route('logout')"
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
