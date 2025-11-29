@extends('admin.app')
@section('titulo', 'Editar Home')
@section('content')

    <div class="flex flex-col flex-grow justify-center p-2 text-white">
        <x-text color='gray-200' size='md' bold='true'>EDITAR SITE OFICIAL</x-text>

        {{-- Mensagens de feedback --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Formulário --}}
        <form action="{{ route('home.update') }}" method="POST" enctype="multipart/form-data"
            class="py-6 rounded-lg shadow-md">
            @csrf

            <div class="flex flex-grow gap-2">
                <div class="w-1/2 mb-4">
                    <label for="titulo" class="block text-sm font-medium text-white">Título</label>
                    <input id="titulo" type="text" name="titulo" value="{{ old('titulo', $content->titulo ?? '') }}"
                        class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                    @error('titulo')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-1/2 mb-4">
                    <label for="subtitulo" class="block text-sm font-medium text-white">Subtítulo</label>
                    <input id="titulo" type="text" name="subtitulo"
                        value="{{ old('subtitulo', $content->subtitulo ?? '') }}"
                        class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                    @error('subtitulo')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-white">Descrição</label>
                <textarea id="descricao" name="descricao"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 h-60">{{ old('descricao', $content->descricao ?? '') }}</textarea>
                @error('descricao')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Imagem --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-white py-2">IMAGEM PRINCIPAL</label>
                @if(!empty($content->imagem))
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $content->imagem) }}" class="rounded w-48">
                    </div>
                @endif
                <input type="file" name="imagem"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-white">
                @error('imagem')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <h2 class="text-xl font-semibold mb-5">Para encher seu carrinho</h2>
            </div>

            <div class="grid grid-cols-4 gap-4">
                <select class="bg-black text-white rounded-lg" name="desconto1" id="desconto1">
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
                <select class="bg-black text-white rounded-lg" name="desconto2" id="desconto2">
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
                <select class="bg-black text-white rounded-lg" name="desconto3" id="desconto3">
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
                <select class="bg-black text-white rounded-lg" name="desconto4" id="desconto4">
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>


            {{-- Botão de salvar --}}
            <div class="flex justify-end py-5">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
@endsection
