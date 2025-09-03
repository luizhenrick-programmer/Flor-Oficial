@extends('layouts.app')

@section('titulo', 'Flor Oficial')

@section('content')
    <div class="flex flex-col flex-grow items-center justify-around px-3 py-3">
        <section id="destaque" class="mt-8 grid grid-cols-1 md:grid-cols-2 w-full items-center justify-center">
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $content->imagem) }}" alt="Vestido Primavera 2"
                    class="md:w-3xl rounded-lg">
            </div>
            <div class="flex flex-col justify-center items-start px-6 md:px-12 py-12 bg-white">

                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight text-gray-900 mb-6">
                    {{ $content->titulo }} <br/>
                    <span class="text-orange-300 indent-6">{{ $content->subtitulo }}</span>
                </h1>

                <div class="space-y-5 text-gray-700 text-base md:text-lg font-medium leading-relaxed">
                    <p class="text-justify indent-6 whitespace-pre-line">
                        {{$content->descricao}}
                    </p>
                </div>

                <a href="{{ route('shopping') }}"
                    class="mt-8 inline-flex items-center justify-center px-8 py-3 text-base md:text-lg font-bold tracking-wide rounded-lg bg-gray-800  text-orange-300 shadow-lg no-underline hover:text-orange-400 transition duration-300 ease-in-out">
                    COMPRE AGORA
                </a>
            </div>
        </section>
        <hr class="md:hidden">
        <section id="ofertas" class="mt-10 flex flex-col items-center w-full">
            <h2 class="text-2xl font-bold text-center ">Para encher seu carrinho</h2>

            <!-- Grid Principal -->
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-4 gap-6 w-full px-4">
                <!-- Ofertas Primavera -->
                <div class="lg:col-span-1 flex flex-col items-center justify-center">
                    <h3 class="text-xl text-dark text-center">
                        Confira as melhores ofertas de outono
                        <span class="font-bold text-amber-800 text-lg">até 60% de desconto</span>
                    </h3>
                </div>

                <!-- Produtos -->
                <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-1.png') }}" alt="Categoria 1"
                            class="max-w-xs md:w-full rounded-lg shadow-md">
                        <p class="w-3x1 mt-2 text-gray-700 font-semibold text-start">Produto 1</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-2.png') }}" alt="Categoria 2"
                            class="max-w-xs md:w-full rounded-lg shadow-md">
                        <p class="w-3x1 mt-2 text-gray-700 font-semibold text-start">Produto 2</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-3.png') }}" alt="Categoria 3"
                            class="max-w-xs md:w-full rounded-lg shadow-md">
                        <p class="w-3x1 mt-2 text-gray-700 font-semibold text-start">Produto 3</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/imagesOferta/oferta-4.png') }}" alt="Categoria 4"
                            class="max-w-xs md:w-full rounded-lg shadow-md">
                        <p class="w-3x1 mt-2 text-gray-700 font-semibold text-start">Produto 4</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-10 flex flex-col md:flex-row gap-4 items-center justify-center w-full">

            <h2 class="md:hidden flex text-2xl font-bold text-center">Mega Promoção Flor Oficial</h2>

            <!-- Card 1 -->
            <div class="max-w-xs md:max-w-md relative bg-gray-100 rounded-lg overflow-hidden">
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
                        class="mt-3 inline-block bg-stone-400 text-white font-semibold px-4 py-2 mb-4 rounded-lg no-underline bg-stone-800 text-orange-900 transition">
                        Compre Agora
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="max-w-xs md:max-w-md relative bg-gray-100 rounded-lg overflow-hidden">
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
                        class="mt-3 inline-block bg-stone-400 text-white font-semibold px-4 py-2 mb-4 rounded-lg no-underline bg-stone-800 text-orange-900 transition">
                        Compre Agora
                    </a>
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
@endsection
