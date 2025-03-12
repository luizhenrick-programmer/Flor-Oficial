@extends('admin.app')

@section('titulo', 'Produtos Flor Oficial')

@section('content')
    @if (session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @endif

    <div class="container mx-auto p-6">
        <h1 class="text-xl font-bold text-gray-200 mb-4">PRODUTOS</h1>

        <div class="bg-gray-700 rounded-lg border-l-4 border-violet-500 text-gray-200 my-4 p-3" role="alert">
            <div class="flex items-center">
                <div class="mr-3">
                    <svg class="icon alert-icon svg-icon-ti-ti-alert-circle" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                        <path d="M12 8v4"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                </div>
                <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao painel de controle! Use
                    as ferramentas com responsabilidade e cuidado!</x-text>
            </div>
        </div>

        <!-- Barra de ações -->
        <div class="flex flex-col md:flex-row justify-between bg-gray-800 p-4 rounded-lg shadow-md">
            <div class="flex items-center gap-2">
                <input type="text" placeholder="Pesquisar..."
                    class="px-3 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring focus:border-violet-500">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-600">Filtros</button>
            </div>

            <div class="flex items-center gap-2 mt-3 md:mt-0">
                <a class="bg-gray-700 text-white px-4 py-2 rounded-md no-underline hover:bg-gray-600 flex items-center gap-1">
                    <i class="fa-solid fa-file-export"></i> Exportar
                </a>
                <a href="{{ route('e-commerce.criar_produto') }}"
                    class="bg-violet-600 text-white px-4 py-2 rounded-md no-underline hover:bg-violet-800 flex items-center gap-1">
                    <i class="fa-solid fa-plus"></i> Criar Produto
                </a>
                <a class="bg-gray-700 text-white px-4 py-2 rounded-md no-underline hover:bg-gray-600 flex items-center gap-1">
                    <i class="fa-solid fa-rotate"></i> Atualizar
                </a>
            </div>
        </div>

        <!-- Tabela -->
        @if ($produtos->count())
            <div class="overflow-x-auto mt-6">
                <table class="w-full border-collapse bg-gray-700 rounded-lg text-white text-center">
                    <thead>
                        <tr class="bg-gray-800 text-gray-300">
                            <th class="p-3">ID</th>
                            <th class="p-3">Imagem</th>
                            <th class="p-3">Produto</th>
                            <th class="p-3">Preço</th>
                            <th class="p-3">Em estoque?</th>
                            <th class="p-3">Quantidade</th>
                            <th class="p-3">Categoria</th>
                            <th class="p-3">Criado em</th>
                            <th class="p-3">Criado por</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr class="border-t border-gray-600 hover:bg-gray-800 transition">
                                <td class="p-3">{{ $produto->id }}</td>
                                <td class="p-3">
                                    <img src="{{ $produto->url }}" alt="{{ $produto->nome }}" class="h-12 w-12 object-cover rounded-md mx-auto">
                                </td>
                                <td class="p-3">{{ $produto->nome }}</td>
                                <td class="p-3">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td class="p-3">
                                    @if ($produto->quantidade >= 1)
                                        <span class="bg-green-500 text-white px-3 py-1 rounded">Sim</span>
                                    @else
                                        <span class="bg-red-500 text-white px-3 py-1 rounded">Não</span>
                                    @endif
                                </td>
                                <td class="p-3">{{ $produto->quantidade }}</td>
                                <td class="p-3">{{ $produto->categoria_id }}</td>
                                <td class="p-3">{{ $produto->created_at->format('d/m/Y') }}</td>
                                <td class="p-3">{{ $produto->criado_por }}</td>
                                <td class="p-3">{{ ucfirst($produto->status) }}</td>
                                <td class="p-3 flex justify-center gap-2">
                                    <a href="{{ route('e-commerce.produto.editar', $produto->id) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('e-commerce.produto.deletar', $produto->id) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mt-4 text-yellow-400">Nenhum produto cadastrado</p>
        @endif

        <!-- Paginação -->
        <div class="mt-6 flex justify-center">
            {{ $produtos->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
