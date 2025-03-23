@extends('admin.app')
@section('titulo', 'Cadastrar Produto')
@section('content')
    <div class="w-full max-w-6xl mx-auto py-4">
        <div class="flex justify-center items-center bg-gray-100 rounded-lg">
            <div class="bg-gray-200 shadow-md rounded-lg p-8 w-full">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Cadastrar Categoria</h2>

                @if (session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif

                <!-- Formulário -->
                <form action="{{ route('e-commerce.categoria.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nome do Produto -->
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Categoria</label>
                        <input id="nome" type="text" name="nome"
                        placeholder="Digite o nome"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                    </div>

                    <!-- Descrição -->
                    <div class="mb-4">
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea id="descricao" name="descricao" placeholder="Digite a descrição"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 h-28"></textarea>
                    </div>

                    <!-- Botão de Enviar -->
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none">
                        Salvar Categoria
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
