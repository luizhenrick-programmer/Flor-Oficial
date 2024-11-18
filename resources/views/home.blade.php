<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sofia&display=swap" rel="stylesheet">

<style>
    .image-container img {
        transition: transform 0.3s ease; /* Suaviza o efeito de zoom */
        transform: none; /* Tamanho normal */
        
    }
    .image-container img:hover {
        transform: scale(1.2); /* Aplica o zoom ao passar o mouse */
    }

    .imagem-relative {
        display: block;
        position: relative;
        background-image: url(../);
        background-repeat: no-repeat;
        background-size: cover;
    }

    .circulo-absolute {
        position: absolute;
        top: 20;
        right: 20;
    }

</style>

<x-app-layout>
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
            <div class="container-fluid">
                <ul class="nav nav-underline">
                    <li class="nav-item">
                      <a class="nav-link text-dark" href="{{ route('dashboard') }}">Início</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark" href="{{ route('shopping') }}">Comprar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark" href="{{ route('about') }}">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('contact') }}">Contato</a>
                    </li>
                  </ul>
            </div>
        </nav>

        <div class="d-flex align-items-center">
            <a href="#" class="me-3">
                <img src="{{ asset('assets/images/imagesIcons/search_glass.svg') }}" alt="Buscar" width="21" height="24"></a>
            <a href="{{ route('profile.edit') }}" class="me-3">
                <img src="{{ asset('assets/images/imagesIcons/user_solid.svg') }}" alt="Perfil do Usuário" width="20" height="24">
            </a>
            <a href="#" class="me-3">
                <img src="{{ asset('assets/images/imagesIcons/heart_solid.svg') }}" alt="Favoritos" width="23" height="24">
            </a>
            <a href="#">
                <img src="{{ asset('assets/images/imagesIcons/cart_shop.svg') }}" alt="Carrinho de Compras" width="22" height="24">
            </a>
        </div>
    </header>

    <main>
        <div class="container">
            <section id="destaque" class="row w-100 d-flex align-items-center min-vh-100">
              <!-- Text Section -->
              <div class="col-md-6 d-flex flex-column justify-content-center">
                    <p class="text-pink-500 fw-bold fs-2 mb-0">- Novidades</p>
                    <h1 class="fw-bold text-black text-3xl md:text-4xl">Vestidos Noturnos<br>
                        <span class="text-pink-500">de Primavera</span>
                    </h1>
                    <a href="#" class="btn btn-link flex align-self-start text-decoration-none mt-3 text-dark fw-bold p-0">COMPRE AGORA</a>
                
                    <!-- Pagination -->
                    <div class="d-flex align-items-center mt-4">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">01 -</button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">02 -</button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">03</button>
                        </div>
                    </div>
              </div>

              <!-- Image Section / images Carousel --> 
              <div class="col-md-6 d-flex justify-content-center image-container">
                <div id="carouselExampleIndicators" class="carousel slide">
                  <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images/imageOne.png') }}" alt="Vestido Primavera 1" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/imageTwo.png') }}" alt="Vestido Primavera 2" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/imageTree.png') }}" alt="Vestido Primavera 3" class="img-fluid">
                        </div>
                  </div>
                </div>
              </div>
            </section>
            <section id="carrosel-categoria" class="mt-4">
                <h2 class="d-flex align-items-center justify-content-center">Estilos feitos para você</h2>
                <div id="categorias" class="d-flex align-items-center justify-content-center">
                    <div class="d-block mt-5 mx-4">
                        <img src="{{asset('assets/images/imagesCate/categoriaOne.png') }}" class="rounded-circle" alt="Categoria 1">
                        <p class="category-title mt-3">Categoria 1</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{asset('assets/images/imagesCate/categoriaTwo.png') }}" class="rounded-circle" alt="Categoria 2">
                        <p class="category-title mt-3">Categoria 2</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{asset('assets/images/imagesCate/categoriaTree.png') }}" class="rounded-circle" alt="Categoria 3">
                        <p class="category-title mt-3">Categoria 3</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{asset('assets/images/imagesCate/categoriaFour.png') }}" class="rounded-circle" alt="Categoria 4">
                        <p class="category-title mt-3">Categoria 4</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{asset('assets/images/imagesCate/categoriaFive.png') }}" class="rounded-circle" alt="Categoria 5">
                        <p class="category-title mt-3">Categoria 5</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{asset('assets/images/imagesCate/categoriaSix.png') }}" class="rounded-circle" alt="Categoria 6">
                        <p class="category-title mt-3">Categoria 6</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{asset('assets/images/imagesCate/categoriaSeven.png') }}" class="rounded-circle" alt="Categoria 7">
                        <p class="category-title mt-3">Categoria 7</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{asset('assets/images/imagesCate/categoriaEight.png') }}" class="rounded-circle" alt="Categoria 8">
                        <p class="category-title mt-3">Categoria 8</p>
                    </div>
                </div>
            </section>
            <section id="ofertas" class="mt-5 row w-100 d-flex d-flex align-items-center justify-content-center">
                <h2 class="d-flex align-items-center justify-content-center">Para encher seu carrinho</h2>
                <div class="mt-4 d-block w-25">
                    <h3 class="text-pink-500">Ofertas Primavera<br>
                        <span class="fw-bold fs-4">até 60% de desconto</span>
                    </h3>
                    <a href="#" class="mt-5 fw-bold fs-5 text-dark text-center">Ver tudo</a>
                </div>
                <div class="mt-4 d-flex w-75">
                    <div class="d-block me-2">
                        <img src="https://via.placeholder.com/300x400" alt="Categoria 1">
                        <p class="category-title mt-3">Produto 1</p>
                    </div>
                    <div class="d-block me-2">
                        <img src="https://via.placeholder.com/300x400" alt="Categoria 2">
                        <p class="category-title mt-3">Produto 2</p>
                    </div>
                    <div class="d-block me-2">
                        <img src="https://via.placeholder.com/300x400" alt="Categoria 3">
                        <p class="category-title mt-3">Produto 3</p>
                    </div>
                    <div class="d-block me-2">
                        <img src="https://via.placeholder.com/300x400" alt="Categoria 4">
                        <p class="category-title mt-3">Produto 4</p>
                    </div>
                </div>
            </section>
            <section>
                <div id="destaque-promocao" class="bg-body-tertiary rounded w-50 imagem-relative" style="width: 100px; height: 600px;">
                    <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center p-3 circulo-absolute">
                    <p class="text-white ">A partir<br>
                        <span>de R$ 20</span>
                    </p>
                    </div>

                    <img src="{{ asset('assets/images/categoriaFOREY.png') }}">

                    <div>
                        <h3 class="text-black">Promoção</h3>
                        <a href="#">Compre Agora</a>
                    </div>
                </div>
            </section>
            <section class="mt-5">
                <h2 class="d-flex align-items-center justify-content-center">Os queridinhos do momento</h2>
                <div class="d-block mt-4">
                    <div class="d-flex">
                        <div class="d-block me-2">
                            <img src="https://via.placeholder.com/300x400" alt="Categoria 1">
                            <p class="category-title mt-3">Produto 1</p>
                        </div>
                        <div class="d-block me-2">
                            <img src="https://via.placeholder.com/300x400" alt="Categoria 2">
                            <p class="category-title mt-3">Produto 2</p>
                        </div>
                        <div class="d-block me-2">
                            <img src="https://via.placeholder.com/300x400" alt="Categoria 3">
                            <p class="category-title mt-3">Produto 3</p>
                        </div>
                        <div class="d-block me-2">
                            <img src="https://via.placeholder.com/300x400" alt="Categoria 4">
                            <p class="category-title mt-3">Produto 4</p>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="d-block me-2">
                            <img src="https://via.placeholder.com/300x400" alt="Categoria 1">
                            <p class="category-title mt-3">Produto 5</p>
                        </div>
                        <div class="d-block me-2">
                            <img src="https://via.placeholder.com/300x400" alt="Categoria 2">
                            <p class="category-title mt-3">Produto 6</p>
                        </div>
                        <div class="d-block me-2">
                            <img src="https://via.placeholder.com/300x400" alt="Categoria 3">
                            <p class="category-title mt-3">Produto 7</p>
                        </div>
                        <div class="d-block me-2">
                            <img src="https://via.placeholder.com/300x400" alt="Categoria 4">
                            <p class="category-title mt-3">Produto 8</p>
                        </div>
                    </div>
                    <a href="{{ route('shopping') }}" class="d-flex align-items-center justify-content-center">Ver tudo</a>
                </div>
            </section>
        </div>
    </main>
    <footer class="bg-body-tertiary text-black py-3 mt-3 mt-lg-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <img src="{{asset('assets/images/logoSite.png') }}" alt="Logo da Flor de Pitanga" class="mb-3" style="width: 150px; height: 150px;">
              <p>R. Visc. de Porto Seguro, 339 - Centro, Formosa-GO, 73801-010</p>
              <p>flordipintanga@gmail.com</p>
              <p>+55 61 99999-9999</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-envelope"></i></a></li>
              </ul>
            </div>
            <div class="col-md-2">
              <h5>Compras</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
              </ul>
            </div>
            <div class="col-md-2">
              <h5>Categorias</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
              </ul>
            </div>
            <div class="col-md-2">
              <h5>Help</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
                <li><a href="#" class="">Exemplo</a></li>
              </ul>
            </div>
          </div>
          <hr>
          <p class="text-center">&copy; 2024 Flor de Pitanga</p>
        </div>
      </footer>
</x-app-layout>
