<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@extends('admin.app')

@section('titulo', 'Cadastrar Produto')

@section('content')
    <div class="w-full max-w-6xl mx-auto py-4">
        <div class="flex justify-center items-center bg-gray-100 rounded-lg">
            <div class="bg-white shadow-md rounded-lg p-8 w-full">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Cadastrar Produto</h2>

                <!-- Nome do Produto -->
                <div class="mb-4">
                    <label for="nome-produto" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                    <input id="nome-produto" type="text" placeholder="Digite o nome"
                        class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                </div>

                <!-- Descrição -->
                <div class="mb-4">
                    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <textarea id="descricao" placeholder="Digite a descrição"
                        class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 h-28"></textarea>
                </div>

                <!-- Preço, Marca e Tamanho -->
                <div class="mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Preço -->
                        <div>
                            <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
                            <input id="preco" type="number" placeholder="Digite o preço"
                                class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                        </div>
                        <!-- Marca -->
                        <div>
                            <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                            <select id="marca"
                                class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                <option value="">Selecione a marca</option>
                                <option value="marca1">Marca 1</option>
                                <option value="marca2">Marca 2</option>
                            </select>
                        </div>
                        <!-- Tamanho -->
                        <div>
                            <label for="tamanho" class="block text-sm font-medium text-gray-700">Tamanho</label>
                            <select id="tamanho"
                                class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                <option value="">Selecione o tamanho</option>
                                <option value="pequeno">Pequeno</option>
                                <option value="medio">Médio</option>
                                <option value="grande">Grande</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Quantidade, Categoria e Cor -->
                <div class="mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Quantidade -->
                        <div>
                            <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade</label>
                            <input id="quantidade" type="number" placeholder="Digite a quantidade"
                                class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                        </div>
                        <!-- Categoria -->
                        <div>
                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                            <select id="categoria"
                                class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                <option value="">Selecione uma categoria</option>
                                <option value="eletronicos">Eletrônicos</option>
                                <option value="livros">Livros</option>
                                <option value="roupas">Roupas</option>
                            </select>
                        </div>
                        <!-- Cor -->
                        <div>
                            <label for="cor" class="block text-sm font-medium text-gray-700">Cor</label>
                            <div class="flex items-center space-x-4">
                                <div class="flex-1">
                                    <select id="cor"
                                        class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                        <option value="">Selecione uma cor</option>
                                        <option value="vermelho">Vermelho</option>
                                        <option value="azul">Azul</option>
                                        <option value="verde">Verde</option>
                                    </select>
                                </div>
                                <button type="button"
                                    class="px-2 py-2 bg-gray-400 border rounded-full focus:ring-indigo-500 hover:bg-blue-300 focus:border-white text-gray-700">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Cores selecionadas</label>

                </div>

                <!-- Imagem -->
                <div class="mb-4 flex flex-col bg-gray-100">
                    <div class="w-full w-md-lg bg-white p-6 rounded-lg shadow-lg">
                        <label for="file-upload" class="block text-sm font-medium text-gray-700 mb-2">Upload de
                            Imagem</label>

                        <div class="flex items-center justify-center w-full">
                            <label for="file-upload"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500 mb-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-sm text-gray-500">Clique para selecionar um arquivo</span>
                                <input id="file-upload" type="file" class="hidden">
                            </label>
                        </div>
                    </div>
                </div>


                <!-- Publicar -->
                <div class="form-check form-switch form-check-reverse">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckReverse">
                    <label class="form-check-label" for="flexSwitchCheckReverse">Publicar</label>
                </div>

                <!-- Botão de Enviar -->
                <button
                    class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none">
                    Salvar Produto
                </button>
            </div>
        </div>

        <style>
            .toggle-checkbox:checked+.toggle-label {
                background-color: #4f46e5;
            }

            .toggle-checkbox:checked+.toggle-label .toggle-circle {
                transform: translateX(1.5rem);
            }
        </style>

    </div>
@endsection
