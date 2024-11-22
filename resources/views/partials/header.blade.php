<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<header class="header d-flex justify-content-around align-items-center bg-white border-bottom shadow-sm py-3 px-4">
    <div class="d-flex align-items-center">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('assets/images/logoSite.png') }}" alt="Logo Flor Oficial" width="80" height="80">
        </a>
        <div>
            <span class="d-block" style="font-family: 'Roboto', sans-serif; font-weight: bold;">FLOR OFICIAL</span>
            <span class="d-block" style="font-family: 'Roboto', sans-serif;">BY Thays Conrado</span>
        </div>
    </div>

    <nav class="navbar">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('dashboard') }}">Início</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('shopping') }}">Comprar</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('about') }}">Sobre</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('contact') }}">Contato</a></li>
        </ul>
    </nav>

    <div class="d-flex align-items-center">
        <button id="toggleSearch" class="btn">
            <i class="bi bi-search fs-5"></i>
        </button>
        <a class="btn" href="{{ route('login') }}"><i class="bi bi-person fs-5"></i></a>
        <a class="btn" href="{{ route('dashboard') }}"><i class="bi bi-heart fs-5"></i></a>
        <a class="btn" href="{{ route('dashboard') }}"><i class="bi bi-cart fs-5"></i></a>
    </div>
</header>

<!-- Offcanvas Search -->
<div class="offcanvas offcanvas-top py-5 px-4 h-50" data-bs-scroll="false" data-bs-backdrop="false" tabindex="-1" id="offcanvasWithSearch" aria-labelledby="offcanvasWithSearch" style="top:110px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithSearchLabel">Encontre o que você precisa, de forma rápida e precisa!</h5>
    </div>
    <div class="offcanvas-body">
        <form class="d-flex mb-4">
            <input class="form-control me-2" type="search" placeholder="Digite sua busca..." aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
        <div>
            <h6 class="mb-3">ENCONTRE COM FACILIDADE</h6>
            <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-dark">Novidades</a></li>
                <li><a href="#" class="text-decoration-none text-dark">Vestidos</a></li>
                <li><a href="#" class="text-decoration-none text-dark">Acessórios</a></li>
                <li><a href="#" class="text-decoration-none text-dark">Calçados</a></li>
                <li><a href="#" class="text-decoration-none text-dark">Moletom</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
    const toggleSearch = document.getElementById('toggleSearch');
    const offcanvasSearch = document.getElementById('offcanvasWithSearch');
    const toggleIcon = toggleSearch.querySelector('i');

    // Adiciona evento ao botão para abrir/fechar
    toggleSearch.addEventListener('click', () => {
        if (offcanvasSearch.classList.contains('show')) {
            // Fecha o offcanvas
            const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasSearch);
            offcanvasInstance.hide();
        } else {
            // Abre o offcanvas
            const offcanvasInstance = new bootstrap.Offcanvas(offcanvasSearch);
            offcanvasInstance.show();
        }
    });

    // Escuta os eventos do offcanvas para alternar o ícone
    offcanvasSearch.addEventListener('shown.bs.offcanvas', () => {
        toggleIcon.classList.replace('bi-search', 'bi-x');
    });

    offcanvasSearch.addEventListener('hidden.bs.offcanvas', () => {
        toggleIcon.classList.replace('bi-x', 'bi-search');
    });
</script>
