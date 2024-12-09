<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
        <a class="btn border-0" role="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse">
            <i class="bi bi-search fs-5"></i>
        </a>
        <a class="btn border-0" href="{{ route('login') }}">
            <i class="bi bi-person fs-5"></i>
        </a>
        <a class="btn border-0" href="{{ route('dashboard') }}">
            <i class="bi bi-heart fs-5"></i>
        </a>
        <a class="btn border-0" href="{{ route('dashboard') }}">
            <i class="bi bi-cart fs-5"></i>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</header>

<div class="collapse" id="searchCollapse">
    <div class="container">
        <div class="card card-body border-0">
            <form action="" method="GET">
                <h3 class="fw-bold fs-5">Encontre o que você precisa, de forma rápida e precisa!</h3>
                <div class="flex mt-3">
                    <input type="text" name="q" class="form-control" placeholder="Procurar Produtos">
                    <button class="btn btn-primary mx-3" type="submit"><i class="bi bi-search fs-5"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
