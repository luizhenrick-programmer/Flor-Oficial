@extends('admin.app')
@section('titulo', 'Cadastrar Produto')
@section('content')

    <div class="container-xl">

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
        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nome do Produto -->
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-white">Nome do Produto</label>
                <input id="nome" type="text" name="nome" placeholder="Digite o nome" value="{{ old('nome') }}"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
            </div>

            <!-- Descrição -->
            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea id="descricao" name="descricao" placeholder="Digite a descrição"
                    value="{{ old('descricao') }}"
                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 h-28"></textarea>
            </div>

            <!-- Preço, Desconto, Marca e Tamanho -->
            <div class="mb-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Preço -->
                    <div>
                        <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
                        <input id="preco" name="preco" type="number" step="0.01" min="0" value="{{ old('preco') }}"
                            placeholder="Digite o preço"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                    </div>
                    <!-- Desconto -->
                    <div>
                        <label for="preco" class="block text-sm font-medium text-gray-700">Desconto</label>
                        <input id="desconto" name="desconto" type="number" step="0.01" min="0"
                            value="{{ old('desconto') }}" placeholder="Digite o preço"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                    </div>
                    <!-- Marca -->
                    <div>
                        <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                        <select id="marca" name="marca_id"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                            <option value="">Selecione a marca</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Categoria -->
                    <div>
                        <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                        <select id="categoria" name="categoria_id" value="{{ old('categoria') }}"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                            <option value="">Selecione uma categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Variações de Produto -->
            <div class="mb-4">
                <div id="variacoes-container">
                    <div class="variacao-item grid grid-cols-1 md:grid-cols-4 gap-3 items-center rounded">
                        <!-- Tamanho -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tamanho</label>
                            <select name="variacoes[0][tamanho]"
                                class="tamanho px-2 py-2 border rounded-lg text-gray-700 w-full">
                                <option value="">Selecione</option>
                                <option value="PP">PP</option>
                                <option value="P">P</option>
                                <option value="M">M</option>
                                <option value="G">G</option>
                                <option value="GG">GG</option>
                                <option value="XG">XG</option>
                            </select>
                        </div>

                        <!-- Estoque -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Estoque</label>
                            <input type="number" name="variacoes[0][estoque]" placeholder="Estoque" min="0"
                                class="estoque px-2 py-2 border rounded-lg text-gray-700 w-full" />
                        </div>

                        <!-- Cores -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Cores</label>
                            <div class="flex gap-2">
                                @foreach (['blue', 'pink', 'purple', 'yellow', 'green', 'red', 'orange', 'cyan', 'gray', 'teal'] as $cores)
                                    <label class="cursor-pointer">
                                        <input type="checkbox" name="variacoes[0][cores][]" value="{{ $cores }}"
                                            class="peer hidden">
                                        <span
                                            class="w-5 h-5 rounded-full block transition-all
                                                    peer-checked:ring-2 peer-checked:ring-indigo-500 peer-checked:ring-offset-1"
                                            style="background-color: {{ $cores }}">
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>


                        <!-- Remover -->
                        <div>
                            <button type="button" class="remove-variacao bg-red-500 text-white px-3 py-2 rounded">Remover</button>
                        </div>
                    </div>
                </div>

                <button type="button" id="add-variacao"
                    class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Adicionar Variação</button>
            </div>


            <!-- Script para adicionar/remover variações -->
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    let index = 1;

                    document.getElementById("add-variacao").addEventListener("click", function () {
                        let container = document.getElementById("variacoes-container");
                        let newVariacao = document.createElement("div");
                        newVariacao.classList.add("variacao-item", "grid", "grid-cols-4", "gap-4", "items-center", "py-3","rounded");

                        newVariacao.innerHTML = `
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tamanho</label>
                        <select name="variacoes[${index}][tamanho]" class="tamanho px-2 py-2 rounded-lg text-gray-700 w-full">
                            <option value="">Selecione</option>
                            <option value="PP">PP</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="GG">GG</option>
                            <option value="XG">XG</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Estoque</label>
                        <input type="number" name="variacoes[${index}][estoque]" placeholder="Estoque" min="0"
                            class="estoque px-2 py-2 border rounded-lg text-gray-700 w-full" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cores</label>
                        <div class="flex flex-wrap gap-2">
                            ${['blue', 'pink', 'purple', 'yellow', 'green', 'red', 'orange', 'cyan', 'gray', 'teal'].map(cores => `
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="variacoes[${index}][cores][]" value="${cores}" class="peer hidden">
                                    <span class="w-5 h-5 rounded-full block transition-all
                                        peer-checked:ring-2 peer-checked:ring-indigo-500 peer-checked:ring-offset-1"
                                        style="background-color: ${cores}">
                                    </span>

                                </label>
                            `).join('')}
                        </div>
                    </div>

                    <div>
                        <button type="button" class="remove-variacao bg-red-500 text-white px-3 py-2 rounded">Remover</button>
                    </div>
                `;

                        container.appendChild(newVariacao);

                        newVariacao.querySelector(".remove-variacao").addEventListener("click", function () {
                            container.removeChild(newVariacao);
                        });

                        index++;
                    });

                    document.querySelectorAll(".remove-variacao").forEach(button => {
                        button.addEventListener("click", function () {
                            this.parentElement.parentElement.remove();
                        });
                    });
                });
            </script>


            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="arquivos">Arquivos</label>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                    <!-- Imagem 1 -->
                    <div class="mt-3">
                        <input type="file" class="hidden" id="arquivos" name="arquivos[]">
                        <div class="flex items-center justify-center w-64 h-64 border-2 border-dashed border-gray-300 cursor-pointer rounded-lg hover:bg-gray-100 transition"
                            onclick="document.getElementById('arquivos').click()">
                            <p class="text-gray-500">Clique ou arraste as imagens aqui</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publicar -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Publicar?</label>
                <div class="flex gap-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="status" value="publicado" class="peer hidden">
                        <span
                            class="w-5 h-5 border-2 border-gray-400 rounded-full flex items-center justify-center peer-checked:border-indigo-500 peer-checked:bg-indigo-500 transition-all">
                            <span
                                class="w-2.5 h-2.5 bg-white rounded-full opacity-0 peer-checked:opacity-100 transition-all"></span>
                        </span>
                        <span class="ml-2 text-gray-700 peer-checked:text-indigo-600 font-medium">Publicar</span>
                    </label>

                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="status" value="inativo" class="peer hidden">
                        <span
                            class="w-5 h-5 border-2 border-gray-400 rounded-full flex items-center justify-center peer-checked:border-red-500 peer-checked:bg-red-500 transition-all">
                            <span
                                class="w-2.5 h-2.5 bg-white rounded-full opacity-0 peer-checked:opacity-100 transition-all"></span>
                        </span>
                        <span class="ml-2 text-gray-700 peer-checked:text-red-600 font-medium">Não Publicar</span>
                    </label>
                </div>
            </div>


            <!-- Botão de Enviar -->
            <button type="submit"
                class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none">
                Criar Produto
            </button>
        </form>
        <!-- Fim do Formulário -->

    </div>

@endsection
