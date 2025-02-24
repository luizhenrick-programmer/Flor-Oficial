@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-2xl font-bold mb-6 text-center">Resultados da Busca</h1>

        @if($results->isEmpty())
            <p class="text-center text-gray-600">Nenhum resultado encontrado para "{{ $query }}"</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($results as $result)
                    <div class="relative flex flex-col items-center text-dark overflow-hidden w-full max-w-xs">
                        <div class="relative w-full">
                            <img src="{{ asset($result->url) }}" alt="{{ $result->nome }}"
                                class="w-full object-cover aspect-square border rounded-lg">

                            @if($result->desconto > 0)
                                <div class="absolute top-2 left-2 bg-pink-400 text-white text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $result->desconto }}% OFF
                                </div>
                            @endif
                        </div>

                        <div class="w-full py-2">
                            <p class="text-base font-medium">{{ $result->nome }}</p>

                            <div class="flex items-center gap-2 mt-1">
                                @if($result->desconto > 0)
                                    <span class="text-gray-400 text-sm line-through">R$
                                        {{ number_format($result->preco_antigo, 2, ',', '.') }}</span>
                                @endif
                                <span class="text-pink-400 text-lg font-bold">R$
                                    {{ number_format($result->preco, 2, ',', '.') }}</span>
                            </div>

                            <div class="flex justify-center gap-3 mt-4 w-full">
                                <form action="{{ route('addCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $result->id }}">
                                    <input type="hidden" name="nome" value="{{ $result->nome }}">
                                    <input type="hidden" name="preco" value="{{ $result->preco }}">
                                    <input type="hidden" name="url" value="{{ $result->url }}">
                                    <input type="number" name="quantidade" value="1" min="1" class="hidden">

                                    <button type="submit"
                                        class="bg-pink-400 text-white text-lg font-bold py-2 px-4 rounded-full hover:bg-pink-600 transition w-full">
                                        COMPRAR
                                    </button>
                                </form>

                                <a href="{{ route('produto.show', $result->id) }}"
                                    class="border text-dark text-lg font-bold py-2 px-4 rounded-full hover:bg-gray-200 transition w-full text-center">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
