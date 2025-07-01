<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<header class="w-full color-fundo shadow-sm px-5">
    <div class="flex flex-wrap lg:flex-nowrap items-center md:justify-between w-full gap-3">

        <!-- Botão do menu (visível apenas no mobile) -->
        <div class="lg:hidden">
            <button type="button" class="text-white text-2xl" data-bs-toggle="offcanvas" data-bs-target="#menu-princial"
                aria-controls="menu-princial">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Mobile Offcanvas Menu -->
            <div class="offcanvas offcanvas-start bg-light shadow" tabindex="-1" id="menu-princial"
                aria-labelledby="menu-principal-app">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title text-dark fw-bold" id="menu-principal-app">Menu Principal</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Fechar"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column gap-3 px-3">

                    <a href="{{ route('home') }}"
                        class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                        <i class="fa-solid fa-house"></i>
                        <span>Início</span>
                    </a>

                    <a href="{{ route('shopping') }}"
                        class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                        <i class="fa-solid fa-store"></i>
                        <span>Loja</span>
                    </a>

                    <a href="{{ route('about') }}"
                        class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>Sobre</span>
                    </a>

                    <a href="{{ route('contact') }}"
                        class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                        <i class="fa-solid fa-envelope"></i>
                        <span>Contato</span>
                    </a>

                    <hr class="my-2">

                    <a href="https://api.whatsapp.com/send?phone=5561981011498&text=" target="_blank"
                        class="d-flex align-items-center gap-2 text-decoration-none text-success">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>Atendimento</span>
                    </a>

                    @auth
                        <a href="{{ route('profile.edit') }}"
                            class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                            <i class="fa-solid fa-user-pen"></i>
                            <span>Meus Dados</span>
                        </a>

                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" target="_blank"
                                class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                                <i class="fa-solid fa-briefcase"></i>
                                <span>Painel Admin</span>
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link d-flex align-items-center gap-2 text-decoration-none text-danger p-0">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Sair</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                            <i class="fa-regular fa-user"></i>
                            <span>Entrar</span>
                        </a>
                    @endauth

                    <a href="{{ route('carrinho.index') }}"
                        class="flex items-center gap-2 no-underline text-dark">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Carrinho</span>
                        @if ($carrinho && $carrinho->itens->count() > 0)
                            <span
                                class="badge rounded-pill bg-danger">
                                {{ $carrinho->itens->sum('quantidade') }}
                            </span>
                        @endif
                    </a>

                </div>
            </div>

        </div>

        <!-- Logo e Título -->
        <div class="flex items-center gap-2 mx-auto">
            <img src="{{ asset('assets/images/Flor Oficial.png') }}" alt="Logo"
                class="w-14 h-14 rounded-full object-cover shadow" />
            <h1 class="text-lg font-extrabold text-orange-100 font-montserratb mb-0">Flor Oficial</h1>
        </div>

        <!-- Barra de pesquisa (visível apenas em telas médias ou maiores) -->
        <div class="hidden md:flex flex-1 justify-center">
            <div class="relative w-full max-w-xl">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1111.19 3.26l4.42 4.42a1 1 0 01-1.42 1.42l-4.42-4.42A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" placeholder="Pesquisar..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div>
        </div>

        <div class="hidden lg:flex items-center justify-center gap-8 py-4">
            <!-- Atendimento -->
            <a href="https://api.whatsapp.com/send?phone=5561981011498&text=" target="_blank"
                class="flex flex-col items-center text-orange-100 no-underline">
                <i class="fa-solid fa-comments text-2xl mb-1"></i>
                <span class="text-sm">Atendimento</span>
            </a>

            @auth
                <x-dropdown align="center" width="48">
                    <x-slot name="trigger">
                        <button class="flex flex-col items-center text-orange-100 no-underline focus:outline-none">
                            <i class="fa-regular fa-user text-2xl mb-1"></i>
                            <span class="text-sm">Minha conta</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link class="no-underline" :href="route('profile.edit')">
                            <i class="fa-solid fa-user-pen"></i>
                            {{ __('Meus Dados') }}
                        </x-dropdown-link>

                        @if (Auth::user()->role === 'admin')
                            <x-dropdown-link class="no-underline" href="{{ route('admin.dashboard') }}" target="_blank">
                                <i class="fa-solid fa-briefcase"></i>
                                {{ __('Painel de Controle') }}
                            </x-dropdown-link>
                        @endif


                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link class="no-underline" :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                {{ __('Realizar Logout') }}
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
