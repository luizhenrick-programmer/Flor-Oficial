<nav class="hidden flex-col w-full lg:flex">
    <ul class="w-full h-full list-none mx-0 px-0">
        <!-- Dashboard -->
        <x-text color='gray-200' size='xs' bold='true' class="px-3 py-4">FERRAMENTAS DE INBOX</x-text>
        <li class="mt-3">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-between w-full px-3 py-2 transition no-underline" type="button"
            {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 text-white' : '' }}>
                <div class="flex items-center">
                    <i class="fa-solid fa-house tw-bg-tertiary text-lg text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 font-bold
                        {{ request()->routeIs('admin.dashboard') ? 'text-orange-100' : 'text-gray-300' }}">
                        Dashboard
                    </span>
                </div>
                <i class="{{ request()->routeIs('admin.dashboard') ? 'fa-solid fa-chevron-right text-orange-100' : ''}}"></i>
            </a>
        </li>


        <!-- E-commerce -->
        <li>
            <a href="{{ route('e-commerce.index') }}" class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition  no-underline "
                    type="button">
                <div class="flex items-center">
                    <i class="fa-brands fa-shopify tw-bg-tertiary text-2xl text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 font-bold
                        {{ request()->routeIs('e-commerce.*') ? 'text-orange-100' : 'text-gray-300' }}">
                        E-commerce
                    </span>
                </div>
                <i class="{{ request()->routeIs('e-commerce.*') ? 'fa-solid fa-chevron-right text-orange-100' : ''}}"></i>
            </a>
        </li>

        <!-- Colaboradores -->
        <li>
            <a href="{{ route('colaboradores.index') }}" class="flex items-center justify-between w-full text-gray-300 px-3 py-2 text-gray-300 transition no-underline"
                    type="button">
                <div class="flex items-center">
                    <i class="fa-solid fa-box tw-bg-tertiary text-lg text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 font-bold
                        {{ request()->routeIs('colaboradores.*') ? 'text-orange-100' : 'text-gray-300' }}">
                        Colaboradores
                    </span>
                </div>
                <i class="{{ request()->routeIs('colaboradores.*') ? 'fa-solid fa-chevron-right text-orange-100' : ''}}"></i>
            </a>
        </li>

        <!-- Financeiro -->
        <li class="mb-4">
            <a href="{{ route('financeiro') }}" class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline"
                    type="button">
                <div class="flex items-center">
                    <i class="fa-solid fa-sack-dollar tw-bg-tertiary text-lg text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 font-bold
                        {{ request()->routeIs('financeiro') ? 'text-orange-100' : 'text-gray-300' }}">
                        Financeiro
                    </span>
                </div>
                <i class="{{ request()->routeIs('financeiro') ? 'fa-solid fa-chevron-right text-orange-100' : ''}}"></i>
            </a>
        </li>

        <x-text color='gray-200' size='xs' bold='true' class="px-3 py-4">FERRAMENTAS ADICIONAIS</x-text>
        <li class="mt-3">
            <a href="{{ route('home') }}" target=_blank class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline" type="button">
                <div class="flex items-center">
                    <i class="fa-solid fa-store tw-bg-tertiary text-2xl text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 text-gray-300 font-bold">
                        Flor Oficial
                    </span>
                </div>
            </a>
        </li>
        <li>
            <a href="https://www.instagram.com/flordi.oficial" target=_blank class="flex items-center justify-between w-full text-gray-300 px-3 py-2 transition no-underline" type="button">
                <div class="flex items-center">
                    <i class="bi bi-instagram tw-bg-tertiary text-2xl text-gray-300 p-3 rounded-lg"></i>
                    <span class="text-md mx-3 text-gray-300 font-bold">
                        Instagram
                    </span>
                </div>
            </a>
        </li>
    </ul>
</nav>
