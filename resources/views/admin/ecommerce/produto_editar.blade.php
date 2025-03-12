@extends('admin.app')
@section('titulo', 'Editar Produto')
@section('content')
    <div class="w-full max-w-6xl mx-auto py-4">
        <div class="flex justify-center items-center bg-gray-100 rounded-lg">
            <div class="bg-gray-200 shadow-md rounded-lg p-8 w-full">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Editar Produto</h2>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-2 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 text-red-700 p-2 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Formulário -->
                <form action="{{ route('e-commerce.produto.atualizar', $produto->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nome do Produto -->
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                        <input id="nome" type="text" name="nome" value="{{ $produto->nome }}"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                    </div>

                    <!-- Descrição -->
                    <div class="mb-4">
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea id="descricao" name="descricao"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 h-28">{{ $produto->descricao }}</textarea>
                    </div>

                    <!-- Preço, Marca e Tamanho -->
                    <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
                            <input id="preco" name="preco" type="number" step="0.01" min="0" value="{{ $produto->preco }}"
                                class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                        </div>
                        <div>
                            <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                            <select id="marca" name="marca_id" class="mt-1 w-full px-2 py-2 border rounded-lg">
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}" {{ $produto->marca_id == $marca->id ? 'selected' : '' }}>
                                        {{ $marca->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="tamanho" class="block text-sm font-medium text-gray-700">Tamanho</label>
                            <select id="tamanho" name="tamanho" class="mt-1 w-full px-2 py-2 border rounded-lg">
                                <option value="PP" {{ $produto->tamanho == 'PP' ? 'selected' : '' }}>PP</option>
                                <option value="P" {{ $produto->tamanho == 'P' ? 'selected' : '' }}>P</option>
                                <option value="M" {{ $produto->tamanho == 'M' ? 'selected' : '' }}>M</option>
                                <option value="G" {{ $produto->tamanho == 'G' ? 'selected' : '' }}>G</option>
                                <option value="GG" {{ $produto->tamanho == 'GG' ? 'selected' : '' }}>GG</option>
                                <option value="XG" {{ $produto->tamanho == 'XG' ? 'selected' : '' }}>XG</option>
                            </select>
                        </div>
                    </div>

                    <!-- Quantidade e Categoria -->
                    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade</label>
                            <input id="quantidade" name="quantidade" type="number" value="{{ $produto->quantidade }}"
                                class="mt-1 w-full px-2 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                            <select id="categoria" name="categoria_id" class="mt-1 w-full px-2 py-2 border rounded-lg">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Imagem -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Imagem Atual</label>
                        <img src="{{ $produto->url }}" alt="{{ $produto->nome }}" class="h-24 w-24 object-cover rounded-md mt-2">
                        <input type="file" name="imagem" class="mt-2">
                    </div>

                    <!-- Publicar -->
                    <label for="publicar" class="block text-sm font-medium text-gray-700">Publicar?</label>
                    <select id="publicar" name="status" class="mt-1 w-full px-2 py-2 border rounded-lg">
                        <option value="publicado" {{ $produto->status == 'publicado' ? 'selected' : '' }}>Publicar</option>
                        <option value="inativo" {{ $produto->status == 'inativo' ? 'selected' : '' }}>Não Publicar</option>
                    </select>

                    <!-- Botão de Salvar -->
                    <button type="submit"
                        class="w-full mt-3 bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                        Atualizar Produto
                    </button>
                </form>
                <!-- Fim do Formulário -->
            </div>
        </div>
    </div>
@endsection
