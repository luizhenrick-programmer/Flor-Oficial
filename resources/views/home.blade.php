@extends('layouts.app')

@section('titulo', 'Flor Oficial')

@section('content')
    <div class="flex flex-col flex-grow items-center justify-around px-3 py-3">
        <section id="destaque" class="mt-8 grid grid-cols-1 md:grid-cols-2 w-full items-center justify-center">
            <div class="flex flex-col justify-center items-start px-6 md:px-12">
                <h1 class="text-3xl md:text-4xl font-bold mb-4 color-tercery">Descubra a Elegância da Primavera!</h1>
                <p class="text-justify font-semibold text-gray-700 mb-6">
                    Vestidos noturnos criados para quem deseja unir sofisticação e leveza. Nossa nova coleção de
                    primavera traz designs exclusivos que realçam sua beleza, com cortes elegantes, tecidos delicados e
                    cores inspiradas nas nuances da estação. Perfeitos para jantares, eventos formais ou celebrações
                    especiais, esses vestidos foram pensados para quem valoriza conforto e estilo em qualquer ocasião.
                    Explore agora e encontre a peça ideal para brilhar nas noites desta temporada.
                </p>
                <a href="{{ route('shopping') }}"
    class="flex items-center justify-center px-6 py-3 color-fundo color-secundary font-bold rounded-lg w-64 no-underline hover:bg-gray-800 transition">
    COMPRE AGORA
</a>

                <div class="flex items-center mt-8 space-x-4">
                    <button type="button" class="font-bold text-lg hover:color-secundary" onclick="changeSlide(0)">01</button>
                    <span class="text-gray-600 text-2xl">—</span>
                    <button type="button" class="font-bold text-lg hover:color-secundary" onclick="changeSlide(1)">02</button>
                    <span class="text-gray-600 text-2xl">—</span>
                    <button type="button" class="font-bold text-lg hover:color-secundary" onclick="changeSlide(2)">03</button>
                </div>
            </div>

            <div class="flex justify-center">
                <div id="carouselExampleIndicators" class="relative w-4/5 mt-3">
                    <div class="carousel-inner space-y-6">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images/fotoInicio.png') }}" alt="Vestido Primavera 1" class="w-full rounded-lg">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/agoraVai.png') }}" alt="Vestido Primavera 2" class="w-full rounded-lg">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/free3.png') }}" alt="Vestido Primavera 3" class="w-full rounded-lg">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="ofertas" class="mt-32 flex flex-col items-center w-full">
            <h2 class="text-2xl font-bold text-center ">Para encher seu carrinho</h2>

            <!-- Grid Principal -->
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-4 gap-6 w-full px-4">
                <!-- Ofertas Primavera -->
                <div class="lg:col-span-1 flex flex-col items-center justify-center">
                    <h3 class="text-xl text-stone-400 text-center">
                        Ofertas Primavera<br>
                        <span class="font-bold text-dark text-2xl">até 60% de desconto</span>
                    </h3>
                    <a href="{{ route('shopping') }}"
                        class="mt-6 px-4 py-2 bg-stone-400 text-neutral-100 font-bold rounded-lg no-underline w-32 text-center hover:bg-stone-600 transition">
                        VER TUDO
                    </a>
                </div>

                <!-- Produtos -->
                <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-1.png') }}" alt="Categoria 1"
                            class="w-full rounded-lg shadow-md">
                        <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 1</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-2.png') }}" alt="Categoria 2"
                            class="w-full rounded-lg shadow-md">
                        <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 2</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-3.png') }}" alt="Categoria 3"
                            class="w-full rounded-lg shadow-md">
                        <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 3</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-4.png') }}" alt="Categoria 4"
                            class="w-full rounded-lg shadow-md">
                        <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 4</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-10 flex flex-col md:flex-row gap-4 items-center justify-center w-full">
            <!-- Card 1 -->
            <div class="relative bg-gray-100 rounded-lg overflow-hidden">
                <!-- Texto no canto superior direito -->
                <div
                    class="absolute top-4 right-4 bg-red-500 text-white rounded-full py-4 px-2 flex flex-col items-center justify-center">
                    <p class="text-sm text-center leading-tight mb-0">
                        A partir<br>
                        <span class="text-lg font-bold">de R$ 20</span>
                    </p>
                </div>

                <!-- Imagem -->
                <img src="{{ asset('assets/images/homem.jpg') }}" alt="Promoção Homem" class="w-full h-full object-cover">

                <!-- Texto Promocional -->
                <div
                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-4 lg:translate-y-1 bg-white rounded-lg shadow-lg py-2 px-3 w-3/4 text-center">
                    <h3 class="text-black text-lg font-bold mb-0">Promoção</h3>
                    <a href="#"
                        class="mt-3 inline-block bg-pink-500 text-white font-semibold px-4 py-2 mb-4 rounded-lg no-underline hover:bg-pink-600 transition">
                        Compre Agora
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="relative bg-gray-100 rounded-lg overflow-hidden">
                <!-- Texto no canto superior direito -->
                <div
                    class="absolute top-4 right-4 bg-red-500 text-white rounded-full py-4 px-2 flex flex-col items-center justify-center">
                    <p class="text-sm text-center leading-tight mb-0">
                        A partir<br>
                        <span class="text-lg font-bold">de R$ 20</span>
                    </p>
                </div>

                <!-- Imagem -->
                <img src="{{ asset('assets/images/mulher.jpg') }}" alt="Promoção Mulher" class="w-full h-full object-cover">

                <!-- Texto Promocional -->
                <div
                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-4 lg:translate-y-1 bg-white rounded-lg shadow-lg py-2 px-3 w-3/4 text-center">
                    <h3 class="text-black text-lg font-bold mb-0">Promoção</h3>
                    <a href="#"
                        class="mt-3 inline-block bg-pink-500 text-white font-semibold px-4 py-2 mb-4 rounded-lg no-underline hover:bg-pink-600 transition">
                        Compre Agora
                    </a>
                </div>
            </div>

            <!-- Adicione mais cards aqui, se necessário -->
        </section>
        <section class="mt-32 flex flex-col items-center w-full">
            <h2 class="text-2xl md:text-3xl font-bold text-center">
                Os queridinhos do momento
            </h2>

            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Produto 1 -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets\images\fashion.jpg') }}" alt="Categoria 1" class="w-full rounded-lg shadow-md">
                    <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 1</p>
                </div>

                <!-- Produto 2 -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets\images\fashion.jpg') }}" alt="Categoria 2" class="w-full rounded-lg shadow-md">
                    <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 2</p>
                </div>

                <!-- Produto 3 -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets\images\fashion.jpg') }}" alt="Categoria 3" class="w-full rounded-lg shadow-md">
                    <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 3</p>
                </div>

                <!-- Produto 4 -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets\images\fashion.jpg') }}" alt="Categoria 4" class="w-full rounded-lg shadow-md">
                    <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 4</p>
                </div>

                <!-- Produto 5 -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets\images\fashion.jpg') }}" alt="Categoria 5" class="w-full rounded-lg shadow-md">
                    <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 5</p>
                </div>

                <!-- Produto 6 -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets\images\fashion.jpg') }}" alt="Categoria 6" class="w-full rounded-lg shadow-md">
                    <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 6</p>
                </div>

                <!-- Produto 7 -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets\images\fashion.jpg') }}" alt="Categoria 7" class="w-full rounded-lg shadow-md">
                    <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 7</p>
                </div>

                <!-- Produto 8 -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets\images\fashion.jpg') }}" alt="Categoria 8" class="w-full rounded-lg shadow-md">
                    <p class="w-full mt-2 text-gray-700 font-semibold text-start">Produto 8</p>
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                <a href="{{ route('shopping') }}"
                    class="text-white bg-pink-500 px-6 py-3 rounded-lg shadow-lg font-semibold no-underline hover:bg-pink-600 transition">
                    Ver tudo
                </a>
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

    <script>
        function changeSlide(slideIndex) {
            const items = document.querySelectorAll('.carousel-item');
            items.forEach(item => item.classList.remove('active'));

            items[slideIndex].classList.add('active');
        }
    </script>
@endsection
