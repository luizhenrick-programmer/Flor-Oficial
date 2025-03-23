@extends('admin.app')
@section('titulo', 'Editar Produto')
@section('content')

    <div class="flex flex-col flex-grow justify-center">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Editar Produto</h2>

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
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nome do Produto -->
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                <input id="nome" type="text" name="nome" value="{{ old('nome', $produto->nome) }}"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
            </div>

            <!-- Descrição -->
            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea id="descricao" name="descricao"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 h-28">{{ old('descricao', $produto->descricao) }}</textarea>
            </div>

            <!-- Preço, Desconto, Marca e Categoria -->
            <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
                    <input id="preco" name="preco" type="number" step="0.01" min="0" value="{{ old('preco', $produto->preco) }}"
                        class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                </div>
                <div>
                    <label for="desconto" class="block text-sm font-medium text-gray-700">Desconto</label>
                    <input id="desconto" name="desconto" type="number" step="0.01" min="0" value="{{ old('desconto', $produto->desconto) }}"
                        class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                </div>
                <div>
                    <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                    <select id="marca" name="marca_id" class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                        <option value="">Selecione a marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ $produto->marca_id == $marca->id ? 'selected' : '' }}>{{ $marca->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select id="categoria" name="categoria_id" class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Variações de Produto -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Variações</label>
                <div id="variacoes-container">
                    @foreach ($produto->variacoes as $index => $variacao)
                        <div class="variacao-item grid grid-cols-4 gap-3 border rounded p-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tamanho</label>
                                <input type="text" name="variacoes[{{ $index }}][tamanho]" value="{{ $variacao->tamanho }}"
                                    class="px-2 py-2 border rounded-lg text-gray-700 w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Estoque</label>
                                <input type="number" name="variacoes[{{ $index }}][estoque]" value="{{ $variacao->estoque }}"
                                    class="px-2 py-2 border rounded-lg text-gray-700 w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Cores</label>
                                <input type="text" name="variacoes[{{ $index }}][cores]" value="{{ implode(',', (array) $variacao->cores) }}"
                                    class="px-2 py-2 border rounded-lg text-gray-700 w-full">
                            </div>
                            <div class="flex justify-end">
                                <button type="button" class="remove-variacao bg-red-500 text-white px-3 py-2 rounded">Remover</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="add-variacao" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Adicionar Variação</button>
            </div>

            <!-- Botão de salvar -->
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Salvar Alterações</button>
            </div>
        </form>
    </div>
@endsection
