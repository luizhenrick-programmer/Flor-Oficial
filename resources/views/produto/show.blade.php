@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-2xl font-bold mb-4 text-center">{{ $produto->nome }}</h1>

        <div class="flex flex-col items-center">
            <img src="{{ asset($produto->url) }}" alt="{{ $produto->nome }}" class="w-64 rounded-lg shadow-lg mb-4">
            <p class="text-lg text-gray-600">{{ $produto->descricao }}</p>

            <div class="mt-3">
                @if($produto->desconto > 0)
                    <span class="text-gray-400 line-through">R$ {{ number_format($produto->preco_antigo, 2, ',', '.') }}</span>
                @endif
                <span class="text-pink-500 text-2xl font-bold ml-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
            </div>

            <form action="{{ route('addCart') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="nome" value="{{ $produto->nome }}">
                <input type="hidden" name="preco" value="{{ $produto->preco }}">
                <input type="hidden" name="url" value="{{ $produto->url }}">
                <input type="number" name="quantidade" value="1" min="1" class="hidden">

                <button type="submit"
                    class="bg-pink-400 text-white py-2 px-4 rounded-full hover:bg-pink-600 transition">
                    COMPRAR
                </button>
            </form>
        </div>
    </div>
@endsection
