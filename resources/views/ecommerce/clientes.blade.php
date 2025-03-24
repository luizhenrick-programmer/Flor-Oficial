@extends('admin.app')

@section('titulo', 'Clientes - Flor Oficial')

@section('content')
    <div class="container mx-auto p-6">

        <x-text color='gray-200' size='sm' bold='true'>CLIENTES</x-text>
        <div class="tw-bg-secondary rounded-lg border-l-4 border-violet-500 text-gray-200 my-4 p-3" role="alert">
            <div class="flex items-center">
                <div class="mr-3">
                    <svg class="icon alert-icon svg-icon-ti-ti-alert-circle" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                        <path d="M12 8v4"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                </div>
                <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao Controle de clientes!</x-text>
            </div>
        </div>

        <div class="w-full flex justify-center items-center py-4">
            <div class="w-4/5 md:w-3/4 lg:w-2/3 flex gap-2 relative">
                <div class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1111.19 3.26l4.42 4.42a1 1 0 01-1.42 1.42l-4.42-4.42A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" placeholder="Pesquisar..."
                    class="w-full pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        @if ($clientes->count())
            <div class="overflow-x-auto mt-6">
                <table class="w-full border-collapse bg-gray-700 rounded-lg text-white text-center">
                    <thead>
                        <tr class="bg-gray-800 text-gray-300">
                            <th class="p-3">ID</th>
                            <th class="p-3">Nome</th>
                            <th class="p-3">CPF</th>
                            <th class="p-3">Telefone</th>
                            <th class="p-3">Username</th>
                            <th class="p-3">Endereço</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Criado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr class="border-t border-gray-600 hover:bg-gray-800 transition">
                                <td class="p-3">{{ $cliente->id }}</td>
                                <td class="p-3">{{ $cliente->name }}</td>
                                <td class="p-3">{{ $cliente->cpf }}</td>
                                <td class="p-3">{{ $cliente->telefone }}</td>
                                <td class="p-3">{{ $cliente->username }}</td>
                                <td class="p-3">{{ $cliente->endereco }}</td>
                                <td class="p-3">{{ $cliente->email }}</td>
                                <td class="p-3">{{ ucfirst($cliente->status) }}</td>
                                <td class="p-3">
                                    {{ $cliente->created_at ? $cliente->created_at->format('d/m/Y') : 'Data não disponível' }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mt-4 text-yellow-400">Nenhum cliente cadastrado</p>
        @endif

        <div class="mt-6 flex justify-center">
            {{ $clientes->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
