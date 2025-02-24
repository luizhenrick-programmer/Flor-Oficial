<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<header class="w-full bg-pink-200 shadow-sm">
    <div class="flex items-center justify-between w-full px-4">
        <div class="flex items-center justify-center hover:bg-gray-300 focus:hover:bg-violet-500 lg:hidden ">
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
        <div class="flex flex-row items-center">
            <img class="rounded-full w-16 h-16 mx-2" src="{{ ('assets\images\Logotipo Flor Oficial.png') }}" alt="Logo">
            <div class="flex flex-col align-items">
                <h1 class="text-lg font-bold text-dark montserrat mb-0">Flor Oficial</h1>
                <p class="text-sm text-nowrap text-dark mb-0">BY Thays Conrado</p>
            </div>
        </div>

        <div class="flex flex-grow items-center mx-4">
            <form action="{{ route('search') }}" method="GET" class="w-full">
                <input type="text" name="query" class="w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-pink-500 focus:outline-none" placeholder="Busque aqui o que deseja...">
            </form>
        </div>

        <div class="flex items-center justify-center gap-8 bg-pink-200 py-4">
            <!-- Atendimento -->
            <a href="https://api.whatsapp.com/send?phone=5561981011498&text=" target="_blank" class="flex flex-col items-center text-dark no-underline">
                <i class="fa-solid fa-comments text-3xl mb-1"></i>
                <span class="text-sm">Atendimento</span>
            </a>

            <!-- Minha conta -->
            <a href="{{ Auth::check() ? route('profile.edit') : route('login') }}" class="flex flex-col items-center text-dark no-underline">
                <i class="fa-regular fa-user text-3xl mb-1"></i>
                <span class="text-sm">Minha conta</span>
            </a>

            <!-- Meu carrinho -->
            <a href="{{ route('home') }}" class="flex flex-col items-center text-dark no-underline relative">
                <i class="fa-solid fa-cart-shopping text-3xl mb-1"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
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
    </div>
    <script src="https://kit.fontawesome.com/12004a6e82.js" crossorigin="anonymous"></script>
</header>
