<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-md bg-gray-800 text-white">
    <div class="container-fluid">
        <div class="flex px-5">
            <div class="d-flex align-items-center">
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <img src="{{ asset('assets/images/logoSite.png') }}" alt="Logo Flor Oficial" width="80"
                        height="80">
                </a>
                <div>
                    <span class="d-block" style="font-family: 'Roboto', sans-serif; font-weight: bold;">FLOR
                        OFICIAL</span>
                    <span class="d-block" style="font-family: 'Roboto', sans-serif;">BY Thays Conrado</span>
                </div>
            </div>
        </div>

        <div class="navbar-nav order-md-last">
            <div class="d-flex align-items-center me-3">
                <div class="input-group input-group-flat">
                    <label class="form-label sr-only" for="global-search-input"> Search </label>
                    <input class="form-control" type="text" name="keyword" id="global-search-input"
                        placeholder="Search" tabindex="0" data-bb-toggle="gs-navbar-input" autocomplete="off">
                </div>
            </div>
            <div class="d-flex align-items-center border rounded me-3">
                <a class="btn flex items-center text-white hover:text-green-500" type="button" href="{{ route('dashboard') }}" target="_blank">
                    <i class="bi bi-globe me-2"></i><span>Website</span>
                </a>
            </div>
            <div class="d-none d-md-flex items-center me-2">
                <div class="nav-item d-none d-md-flex me-2">
                    <a class="btn text-white" type="button" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-moon-fill"></i>
                    </a>
                </div>
                <div class="nav-item d-none d-md-flex me-2">
                    <a class="btn text-white" type="button" href="{{ route('admin.dashboard') }}">
                        <div class="position-relative d-inline-block">
                            <i class="bi bi-bell-fill"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill rounded-circle bg-danger">
                                0
                                <span class="visually-hidden">unread notifications</span>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item d-none d-md-flex me-2">
                    <a class="btn text-white" type="button" href="{{ route('admin.dashboard') }}">
                        <div class="position-relative d-inline-block">
                            <i class="bi bi-cart-fill"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill rounded-circle bg-danger">
                                0
                                <span class="visually-hidden">unread notifications</span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="bg-transparent d-flex align-items-center ms-auto mx-3">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border-0 text-sm leading-4 font-medium rounded-md text-black transition ease-in-out duration-150">
                            @if (Auth::check())
                                <img src="{{ asset('assets/images/avatar.png') }}" alt=""
                                    style="width: 40px; height: 40px;">
                            @endif
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        @auth
                            <x-dropdown-link class="" :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @endauth
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
