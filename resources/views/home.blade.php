@extends('layouts.app') {{-- Certifique-se de que o caminho do layout esteja correto --}}

@section('titulo', 'Home') {{-- Define o título da página --}}

@section('content')
    <main>
        <div class="container mt-5">
            <section id="destaque" class="row w-100 d-flex align-items-center min-vh-100">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <p class="text-pink-500 fw-bold fs-2 mb-0">- Novidades</p>
                    <h1 class="fw-bold text-black text-3xl md:text-4xl">Vestidos Noturnos<br>
                        <span class="text-pink-500">de Primavera</span>
                    </h1>
                    <a href="#"
                        class="btn btn-link flex align-self-start text-decoration-none mt-3 text-dark fw-bold p-0">COMPRE AGORA</a>
                    <div class="d-flex align-items-center mt-5">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1">01 -</button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2">02 -</button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3">03</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center image-container">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/images/imageOne.png') }}" alt="Vestido Primavera 1"
                                    class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/imageTwo.png') }}" alt="Vestido Primavera 2"
                                    class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/imageTree.png') }}" alt="Vestido Primavera 3"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="carrosel-categoria" class="mt-4">
                <h2 class="d-flex align-items-center justify-content-center">Estilos feitos para você</h2>
                <div id="categorias" class="d-flex align-items-center justify-content-center">
                    <div class="d-block mt-5 mx-4">
                        <img src="{{ asset('assets/images/imagesCate/categoriaOne.png') }}" class="rounded-circle"
                            alt="Categoria 1">
                        <p class="category-title mt-3">Categoria 1</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{ asset('assets/images/imagesCate/categoriaTwo.png') }}" class="rounded-circle"
                            alt="Categoria 2">
                        <p class="category-title mt-3">Categoria 2</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{ asset('assets/images/imagesCate/categoriaTree.png') }}" class="rounded-circle"
                            alt="Categoria 3">
                        <p class="category-title mt-3">Categoria 3</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{ asset('assets/images/imagesCate/categoriaFour.png') }}" class="rounded-circle"
                            alt="Categoria 4">
                        <p class="category-title mt-3">Categoria 4</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{ asset('assets/images/imagesCate/categoriaFive.png') }}" class="rounded-circle"
                            alt="Categoria 5">
                        <p class="category-title mt-3">Categoria 5</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{ asset('assets/images/imagesCate/categoriaSix.png') }}" class="rounded-circle"
                            alt="Categoria 6">
                        <p class="category-title mt-3">Categoria 6</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{ asset('assets/images/imagesCate/categoriaSeven.png') }}" class="rounded-circle"
                            alt="Categoria 7">
                        <p class="category-title mt-3">Categoria 7</p>
                    </div>
                    <div class="d-block mt-5 mx-4">
                        <img src="{{ asset('assets/images/imagesCate/categoriaEight.png') }}" class="rounded-circle"
                            alt="Categoria 8">
                        <p class="category-title mt-3">Categoria 8</p>
                    </div>
                </div>
            </section>
            <section id="ofertas" class="mt-5 row w-100 d-flex d-flex align-items-center justify-content-center">
                <h2 class="d-flex align-items-center justify-content-center">Para encher seu carrinho</h2>
                <div class="mt-4 d-block w-25">
                    <h3 class="text-pink-500 text-center">Ofertas Primavera<br>
                        <span class="fw-bold fs-4">até 60% de desconto</span>
                    </h3>
                    <div class="mt-3 fw-bold fs-5 text-dark flex align-items-center justify-content-center">
                        <a href="#">Ver tudo</a>
                    </div>
                </div>
                <div class="mt-4 d-flex w-75">
                    <div class="d-block me-2">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-1.png') }}" alt="Categoria 1">
                        <p class="category-title mt-3">Produto 1</p>
                    </div>
                    <div class="d-block me-2">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-2.png') }}" alt="Categoria 2">
                        <p class="category-title mt-3">Produto 2</p>
                    </div>
                    <div class="d-block me-2">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-3.png') }}" alt="Categoria 3">
                        <p class="category-title mt-3">Produto 3</p>
                    </div>
                    <div class="d-block me-2">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-4.png') }}" alt="Categoria 4">
                        <p class="category-title mt-3">Produto 4</p>
                    </div>
                </div>
            </section>
            <section class="mt-5 row w-100 d-flex d-flex align-items-center justify-content-center">
                <div id="destaque-promocao-1" class="bg-body-tertiary rounded imagem-relative"
                    style="width: 400px; height: 500px; position: relative;">
                    <div
                        class="rounded-circle bg-danger d-flex align-items-center justify-content-center p-3 circulo-absolute">
                        <p class="text-white text-center">A partir<br>
                            <span>de R$ 20</span>
                        </p>
                    </div>

                    <img src="{{ asset('assets/images/homem.jpg') }}">

                    <div class="bg-white position-absolute rounded w-60 p-3 d-flex flex-column align-items-center justify-content-center"
                        style="margin-top: -75px; left: 20%;">
                        <div class="d-block">
                            <h3 class="text-black text-center fs-6 fw-bold">Promoção</h3>
                        </div>
                        <div class="d-block mx-auto">
                            <a href="#">Compre Agora</a>
                        </div>
                    </div>
                </div>
                <div id="destaque-promocao-2" class="bg-body-tertiary rounded imagem-relative"
                    style="width: 400px; height: 500px; position: relative;">
                    <div
                        class="rounded-circle bg-danger d-flex align-items-center justify-content-center p-3 circulo-absolute">
                        <p class="text-white text-center">A partir<br>
                            <span>de R$ 20</span>
                        </p>
                    </div>

                    <img src="{{ asset('assets/images/mulher.jpg') }}">

                    <div class="bg-white position-absolute rounded w-60 p-3 d-flex flex-column align-items-center justify-content-center"
                        style="margin-top: -75px; left: 20%;">
                        <div class="d-block">
                            <h3 class="text-black text-center fs-6 fw-bold">Promoção</h3>
                        </div>
                        <div class="d-block mx-auto">
                            <a href="#">Compre Agora</a>
                        </div>
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
                    <div class=" mt-5 d-flex align-items-center justify-content-center">
                        <a href="{{ route('shopping') }}">Ver tudo</a>
                    </div>
                </div>
            </section>

            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasTopLabel">Offcanvas top</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    ...
                </div>
            </div>
        </div>
    </main>
@endsection
