@extends('admin.app')
@section('titulo', 'Cadastrar Produto')
@section('content')
    <div class="w-full max-w-6xl mx-auto py-4">
        <div class="flex justify-center items-center bg-gray-100 rounded-lg">
            <div class="bg-gray-200 shadow-md rounded-lg p-8 w-full">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Cadastrar Produto</h2>

                @if (session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif

                <!-- Formulário -->
                <form action="{{ route('e-commerce.produto.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nome do Produto -->
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite o nome"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                    </div>

                    <!-- Descrição -->
                    <div class="mb-4">
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea id="descricao" name="descricao" placeholder="Digite a descrição"
                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 h-28"></textarea>
                    </div>

                    <!-- Preço, Marca e Tamanho -->
                    <div class="mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Preço -->
                            <div>
                                <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
                                <input id="preco" name="preco" type="number" placeholder="Digite o preço"
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
                            <!-- Tamanho -->
                            <div>
                                <label for="tamanho" class="block text-sm font-medium text-gray-700">Tamanho</label>
                                <select id="tamanho" name="tamanho"
                                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                    <option value="">Selecione o tamanho</option>
                                    <option value="PP">PP</option>
                                    <option value="P">P</option>
                                    <option value="M">M</option>
                                    <option value="G">G</option>
                                    <option value="GG">GG</option>
                                    <option value="XG">XG</option>
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
                                <input id="quantidade" name="quantidade" type="number" placeholder="Digite a quantidade"
                                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                            </div>
                            <!-- Categoria -->
                            <div>
                                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                                <select id="categoria" name="categoria_id"
                                    class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                    <option value="">Selecione uma categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Cor -->
                            <div>
                                <label for="cor" class="block text-sm font-medium text-gray-700">Cor</label>
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1">
                                        <select id="cor" name="cor[]"
                                            class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                            <option value="">Selecione uma cor</option>
                                            <option value="red">Vermelho</option>
                                            <option value="blue">Azul</option>
                                            <option value="green">Verde</option>
                                            <option value="orange">Laranja</option>
                                            <option value="yellow">Amarelo</option>
                                            <option value="violet">Roxo</option>
                                            <option value="pink">Rosa</option>
                                            <option value="brown">Marrom</option>
                                            <option value="white">Branco</option>
                                            <option value="black">Preto</option>
                                            <option value="gray">Cinza</option>
                                        </select>
                                    </div>
                                    <button type="button" onclick="adicionarCor()"
                                        class="px-2 py-2 bg-gray-400 border rounded-full focus:ring-indigo-500 hover:bg-blue-300 focus:border-white text-gray-700">
                                        <i class="fa-solid fa-circle-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Cores selecionadas</label>
                        <div id="coresSelecionadas" class="mt-2 flex flex-wrap gap-2"></div>
                    </div>

                    <script>
                        let coresSelecionadas = [];

                        function adicionarCor() {
                            let corSelecionada = document.getElementById('cor').value;
                            if (corSelecionada && !coresSelecionadas.includes(corSelecionada)) {
                                coresSelecionadas.push(corSelecionada);
                                exibirCoresSelecionadas();
                            }
                        }

                        function exibirCoresSelecionadas() {
                            const divCores = document.getElementById('coresSelecionadas');
                            divCores.innerHTML = '';
                            coresSelecionadas.forEach(cor => {
                                const corDiv = document.createElement('div');
                                if (cor == 'brown') {
                                    corDiv.classList.add('bg-yellow-900', 'p-3', 'rounded-full');
                                    divCores.appendChild(corDiv);
                                } else {
                                    corDiv.classList.add((cor !== 'white' && cor !== 'black') ? 'bg-' + cor + '-500' : 'bg-' + cor,
                                        'p-3', 'rounded-full');
                                    divCores.appendChild(corDiv);
                                }
                            });
                        }
                    </script>


                    <!-- Imagem
                        <div class="mb-4 flex flex-col bg-gray-100">
                            <div class="w-full w-md-lg bg-white p-6 rounded-lg shadow-lg">
                                <label for="file-upload" class="block text-sm font-medium text-gray-700 mb-2">Upload de
                                    Imagem</label>

                                <div class="flex items-center justify-center w-full">
                                    <label for="file-upload"
                                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500 mb-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span class="text-sm text-gray-500">Clique para selecionar um arquivo</span>
                                        <input id="file-upload" name="imagem" type="file" class="hidden">
                                    </label>
                                </div>
                            </div>
                        </div> -->

                    <div class="form-group">
                        <label for="url">Arquivo</label>
                        <input type="file" class="form-control" name="arquivo" id="arquivo">
                    </div>

                    <!-- Publicar -->
                    <label for="publicar" class="block text-sm font-medium text-gray-700">Publicar?</label>
                    <select id="publicar" name="status"
                        class="mt-1 w-full px-2 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                        <option value="">Selecione uma opção</option>
                        <option value="publicado">Publicar</option>
                        <option value="inativo">Não Publicar</option>
                    </select>

                    <!-- Botão de Enviar -->
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none">
                        Salvar Produto
                    </button>
                </form>
                <!-- Fim do Formulário -->

            </div>
        </div>
    </div>

@endsection
