<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<header class="w-full color-fundo shadow-sm">
    <div class="flex items-center justify-between w-full px-4">
        <div class="flex items-center justify-center hover:bg-gray-300 focus:hover:bg-violet-500 lg:hidden ">
            <button class="btn border-0 text-dark font-bold hover:text-violet-500 focus:text-violet-500" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#menu-princial" aria-controls="menu-princial">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="menu-princial"
                aria-labelledby="menu-principal-app">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-white font-bold mx-auto" id="offcanvasExampleLabel">Menu Principal
                    </h5>
                    <button type="button" class="btn bg-transparent border font-bold text-white rounded-md mx-0"
                        data-bs-dismiss="offcanvas" aria-label="Close">X</button>
                </div>
                <div class="offcanvas-body">

                </div>
            </div>
        </div>
        <div class="flex flex-row items-center ">
            <img class="rounded-full w-16 h-16 mx-2" src="{{ ('assets\images\Flor Oficial.png') }}" alt="Logo">
            <h1 class="text-lg font-bold text-orange-100 montserrat">Flor Oficial</h1>
        </div>

        <div class="flex flex-grow items-center mx-4">
            <form action="{{ route('search') }}" method="GET" class="w-full">
                <input type="text" name="query"
                    class="w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-pink-500 focus:outline-none"
                    placeholder="Busque aqui o que deseja...">
            </form>
        </div>

        <div class="flex items-center justify-center gap-8 py-4">
            <!-- Atendimento -->
            <a href="https://api.whatsapp.com/send?phone=5561981011498&text=" target="_blank"
                class="flex flex-col items-center text-orange-100 no-underline">
                <i class="fa-solid fa-comments text-2xl mb-1"></i>
                <span class="text-sm">Atendimento</span>
            </a>

            @auth
                <x-dropdown align="center" width="46">
                    <x-slot name="trigger">
                        <button class="flex flex-col items-center text-orange-100 no-underline focus:outline-none">
                            <i class="fa-regular fa-user text-2xl mb-1"></i>
                            <span class="text-sm">Minha conta</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fa-solid fa-user-pen"></i>
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        @if (Auth::user()->role === 'admin')
                            <x-dropdown-link href="{{ route('admin.dashboard') }}" target="_blank">
                                <i class="fa-solid fa-briefcase"></i>
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                        @endif


                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <a href="{{ route('login') }}" class="flex flex-col items-center text-orange-100 no-underline">
                    <i class="fa-regular fa-user text-2xl mb-1"></i>
                    <span class="text-sm">Minha conta</span>
                </a>
            @endauth

            <!-- Meu carrinho -->
            <a href="{{ route('carrinho.index') }}"
                class="flex flex-col items-center text-orange-100 no-underline relative">
                <i class="fa-solid fa-cart-shopping text-2xl mb-1"></i>

                @if ($carrinho && $carrinho->itens->count() > 0)
                    <span id="cart-count"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-orange-100 text-dark">
                        {{ $carrinho->itens->sum('quantidade') }}
                    </span>
                @endif

                <span class="text-sm">Carrinho</span>
            </a>



        </div>
    </div>
    <div class="flex items-center justify-center w-full pb-4">
        <nav class="hidden items-center justify-center lg:flex">
            <ul class="flex items-center justify-center mb-0 gap-8">
                <!-- Item Início -->
                <li class="group relative">
                    <a href="{{ route('home') }}"
                        class="text-md font-semibold text-orange-100 transition no-underline hover:text-orange-300">
                        INÍCIO
                    </a>
                    <span
                        class="absolute left-0 right-0 h-0.5 text-orange-300 scale-x-0 transition-transform ease-in duration-300 group-hover:scale-x-100"></span>
                </li>
                <!-- Item Comprar -->
                <li class="group relative dropdown">
                    <a href="{{ route('shopping') }}"
                        class="text-md font-semibold text-orange-100 transition no-underline hover:text-orange-300">
                        LOJA
                    </a>
                    <span
                        class="absolute left-0 right-0 h-0.5 text-orange-300 scale-x-0 transition-transform ease-in duration-300 group-hover:scale-x-100"></span>
                </li>
                <!-- Item Sobre -->
                <li class="group relative">
                    <a href="{{ route('about') }}"
                        class="text-md font-semibold text-orange-100 transition no-underline hover:text-orange-300">
                        SOBRE
                    </a>
                    <span
                        class="absolute left-0 right-0 h-0.5 text-orange-300 scale-x-0 transition-transform ease-in duration-300 group-hover:scale-x-100"></span>
                </li>
                <!-- Item Contato -->
                <li class="group relative">
                    <a href="{{ route('contact') }}"
                        class="text-md font-semibold text-orange-100 transition no-underline hover:text-orange-300">
                        CONTATO
                    </a>
                    <span
                        class="absolute left-0 right-0 h-0.5 text-orange-300 scale-x-0 transition-transform ease-in duration-300 group-hover:scale-x-100"></span>
                </li>
            </ul>
        </nav>
    </div>
    <script src="https://kit.fontawesome.com/12004a6e82.js" crossorigin="anonymous"></script>
</header>
