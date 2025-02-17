<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

<header class="flex items-center justify-stretch md:justify-around bg-white border-bottom shadow-sm px-3 py-3">
    <div class="flex items-center justify-center hover:bg-gray-300 focus:hover:bg-violet-500 rounded lg:hidden ">
        <button class="btn border-0 text-dark font-bold hover:text-violet-500 focus:text-violet-500" type="button"
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
        <img class="rounded-full w-16 h-16 mx-2" src="{{ ('assets/images/logoSite.png') }}" alt="Logo">
        <div class="flex flex-col align-items">
            <h1 class="text-lg font-bold text-dark mb-1">Flor Oficial</h1>
            <p class="text-sm text-nowrap text-gray-400 mb-0">BY Thays Conrado</p>
        </div>
    </div>

    <nav class="hidden items-center justify-center lg:flex">
        <ul class="flex items-center justify-center mb-0 gap-8">
            <!-- Item Início -->
            <li class="group relative">
                <a href="{{ route('home') }}"
                    class="text-md font-semibold text-gray-700 transition no-underline hover:text-pink-500">
                    INÍCIO
                </a>
                <span
                    class="absolute left-0 right-0 h-0.5 bg-pink-500 scale-x-0 transition-transform ease-in duration-300 group-hover:scale-x-100"></span>
            </li>
            <!-- Item Comprar -->
            <li class="group relative dropdown">
                <a href="{{ route('shopping') }}"
                    class="text-md font-semibold text-gray-700 transition no-underline hover:text-pink-700">
                    LOJA
                </a>
                <span
                    class="absolute left-0 right-0 h-0.5 bg-pink-700 scale-x-0 transition-transform ease-in duration-300 group-hover:scale-x-100"></span>
            </li>
            <!-- Item Sobre -->
            <li class="group relative">
                <a href="{{ route('about') }}"
                    class="text-md font-semibold text-gray-700 transition no-underline hover:text-pink-800">
                    SOBRE
                </a>
                <span
                    class="absolute left-0 right-0 h-0.5 bg-pink-500 scale-x-0 transition-transform ease-in duration-300 group-hover:scale-x-100"></span>
            </li>
            <!-- Item Contato -->
            <li class="group relative">
                <a href="{{ route('contact') }}"
                    class="text-md font-semibold text-gray-700 transition no-underline hover:text-pink-500">
                    CONTATO
                </a>
                <span
                    class="absolute left-0 right-0 h-0.5 bg-pink-500 scale-x-0 transition-transform ease-in duration-300 group-hover:scale-x-100"></span>
            </li>
        </ul>
    </nav>

    <div class="hidden md:flex items-center gap-6 px-6 py-4">
        @if (Auth::check())
            <!-- Ícone de perfil -->
            <a class="flex items-center justify-center text-dark no-underline text-2xl h-full" href="{{ route('profile.edit') }}">
                <i class="fa-solid fa-user"></i>
            </a>

            <!-- Formulário de logout corrigido -->
            <form method="POST" action="{{ route('logout') }}" class="inline-flex items-center justify-center h-full">
                @csrf
                <button type="submit" class="flex items-center justify-center text-dark no-underline text-2xl h-full">
                    <i class="fa-solid fa-sign-out-alt"></i>
                </button>
            </form>
        @else
            <!-- Ícone de login -->
            <a class="flex items-center justify-center text-dark no-underline text-2xl h-full" href="{{ route('login') }}">
                <i class="fa-solid fa-user" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Entrar"></i>
            </a>
        @endif

        <!-- Ícone de coração -->
        <a class="flex items-center justify-center text-dark no-underline text-2xl h-full" href="{{ route('home') }}">
            <i class="fa-regular fa-heart"></i>
        </a>

        <!-- Ícone de carrinho -->
        <a class="flex items-center justify-center text-dark no-underline text-2xl h-full" href="{{ route('cart') }}">
            <i class="fa-solid fa-cart-plus"></i>
        </a>
    </div>



    <script src="https://kit.fontawesome.com/12004a6e82.js" crossorigin="anonymous"></script>
</header>
