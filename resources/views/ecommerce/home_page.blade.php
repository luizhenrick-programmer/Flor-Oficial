@extends('admin.app')
@section('titulo', 'Editar Home')
@section('content')

    <div class="flex flex-col flex-grow justify-center">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Editar Conteúdo da Home</h2>

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
        <form action="{{ route('home.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            {{-- Título --}}
            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input id="titulo" type="text" name="titulo"
                    value="{{ old('titulo', $content->titulo ?? '') }}"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                @error('titulo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Subtítulo --}}
            <div class="mb-4">
                <label for="subtitulo" class="block text-sm font-medium text-gray-700">Subtítulo</label>
                <input id="titulo" type="text" name="subtitulo"
                    value="{{ old('subtitulo', $content->subtitulo ?? '') }}"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                @error('subtitulo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Descrição --}}
            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea id="descricao" name="descricao"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 h-28">{{ old('descricao', $content->descricao ?? '') }}</textarea>
                @error('descricao')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Imagem --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Imagem</label>
                @if(!empty($content->imagem))
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$content->imagem) }}" class="rounded border w-48">
                    </div>
                @endif
                <input type="file" name="imagem"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                @error('imagem')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botão de salvar --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
@endsection
