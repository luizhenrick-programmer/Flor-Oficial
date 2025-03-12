@extends('admin.app')

@section('titulo', 'Usuários - Flor Oficial')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-xl font-bold text-gray-200 mb-4">USUÁRIOS (Gerente e Vendedor)</h1>

        <div class="flex flex-col md:flex-row justify-between bg-gray-800 p-4 rounded-lg shadow-md">
            <div class="flex items-center gap-2">
                <input type="text" placeholder="Pesquisar..."
                    class="px-3 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring focus:border-violet-500">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-600">Filtros</button>
            </div>
            <div class="flex items-center gap-2 mt-3 md:mt-0">
                <a class="bg-gray-700 text-white px-4 py-2 rounded-md no-underline hover:bg-gray-600 flex items-center gap-1">
                    <i class="fa-solid fa-rotate"></i> Atualizar
                </a>
            </div>
        </div>

        @if ($colaboradores->count())
            <div class="overflow-x-auto mt-6">
                <table class="w-full border-collapse bg-gray-700 rounded-lg text-white text-center">
                    <thead>
                        <tr class="bg-gray-800 text-gray-300">
                            <th class="p-3">ID</th>
                            <th class="p-3">Nome</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Telefone</th>
                            <th class="p-3">Cargo</th>
                            <th class="p-3">Criado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colaboradores as $colaborador)
                            <tr class="border-t border-gray-600 hover:bg-gray-800 transition">
                                <td class="p-3">{{ $colaborador->id }}</td>
                                <td class="p-3">{{ $colaborador->name }}</td>
                                <td class="p-3">{{ $colaborador->email }}</td>
                                <td class="p-3">{{ $colaborador->telefone }}</td>
                                <td class="p-3">{{ ucfirst($colaborador->role) }}</td>
                                <td class="p-3">
                                    {{ $colaborador->created_at ? $colaborador->created_at->format('d/m/Y') : 'Data não disponível' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mt-4 text-yellow-400">Nenhum usuário cadastrado</p>
        @endif

        <div class="mt-6 flex justify-center">
            {{ $colaboradores->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
