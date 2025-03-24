@extends('admin.app')

@section('titulo', 'Produtos Flor Oficial')

@section('content')
    @if (session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @endif
    <div class="container-xl">

        <x-text color='gray-200' size='sm' bold='true'>PRODUTOS</x-text>
        <div class="w-full flex justify-center items-center py-4">
            <div class="w-full md:w-3/4 lg:w-2/3 flex gap-2 relative">
                <div class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1111.19 3.26l4.42 4.42a1 1 0 01-1.42 1.42l-4.42-4.42A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" placeholder="Pesquisar..."
                    class="w-full pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <a href="{{ route('produtos.create') }}" class="bg-blue-600 text-white px-4 rounded-lg no-underline flex items-center gap-2 hover:bg-blue-700" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v6h6a1 1 0 110 2h-6v6a1 1 0 11-2 0v-6H3a1 1 0 110-2h6V3a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold text-md tracking-wide">Produto</span>
                </a>
            </div>
        </div>

        <!-- Tabela -->
        @if ($produtos->count())
            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-gray-700 rounded-lg text-white text-center text-xs md:text-sm">
                    <thead>
                        <tr class="bg-gray-800 text-gray-300">
                            <th class="p-3">ID</th>
                            <th class="p-3">Imagem</th>
                            <th class="p-3">Produto</th>
                            <th class="p-3">Preço</th>
                            <th class="p-3">Em estoque?</th>
                            <th class="p-3">Quantidade</th>
                            <th class="p-3">Categoria</th>
                            <th class="p-3">Marca</th>
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
                                    @php
                                        $estoqueTotal = $produto->variacoes->sum('estoque');
                                    @endphp
                                    @if ($estoqueTotal > 0)
                                        <span class="bg-green-500 text-white px-3 py-1 rounded">Sim</span>
                                    @else
                                        <span class="bg-red-500 text-white px-3 py-1 rounded">Não</span>
                                    @endif
                                </td>
                                <td class="p-3">{{ $estoqueTotal }}</td>
                                <td class="p-3">{{ $produto->categoria ? $produto->categoria->nome : 'Sem categoria' }}</td>
                                <td class="p-3">{{ $produto->marca ? $produto->marca : 'Sem Marca' }}</td>
                                <td class="p-3">{{ $produto->created_at->format('d/m/Y') }}</td>
                                <td class="p-3">{{ $produto->usuario->name ?? 'Desconhecido' }}</td>
                                <td class="p-3">{{ ucfirst($produto->status) }}</td>
                                <td class="p-3 flex justify-center gap-2">
                                    <a href="{{ route('produtos.edit', $produto->id) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
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
