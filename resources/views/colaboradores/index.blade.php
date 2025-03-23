@extends('admin.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Lista de Colaboradores</h2>

        @if (session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif

        <div class="container-xl">
            <x-text color='gray-200' size='sm' bold='true'>PRODUTOS</x-text>
            <div class="tw-bg-secondary rounded-lg border-l-4 border-violet-500 text-gray-200 my-4 p-3" role="alert">
                <div class="flex items-center">
                    <div class="mr-3">
                        <svg class="icon alert-icon svg-icon-ti-ti-alert-circle" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 8v4"></path>
                            <path d="M12 16h.01"></path>
                        </svg>
                    </div>
                    <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao painel de
                        controle!</x-text>
                </div>
            </div>

            <div class="w-full">

            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-white rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nome</th>
                            <th class="py-3 px-6 text-left">CPF</th>
                            <th class="py-3 px-6 text-left">Telefone</th>
                            <th class="py-3 px-6 text-left">Usuário</th>
                            <th class="py-3 px-6 text-left">Função</th>
                            <th class="py-3 px-6 text-left">E-mail</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        @foreach ($colaboradores as $colaborador)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $colaborador->name }}</td>
                                <td class="py-3 px-6">{{ $colaborador->cpf }}</td>
                                <td class="py-3 px-6">{{ $colaborador->telefone }}</td>
                                <td class="py-3 px-6">{{ $colaborador->username }}</td>
                                <td class="py-3 px-6">{{ ucfirst($colaborador->role) }}</td>
                                <td class="py-3 px-6">{{ $colaborador->email }}</td>
                                <td class="py-3 px-6">
                                    <span
                                        class="px-3 py-1 rounded-full text-white text-xs font-semibold {{ $colaborador->status ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ $colaborador->status ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </td>
                                    <td class="p-3 flex justify-center items-center gap-2">
                                        <a href="#"
                                            class="bg-orange-500 text-white px-3 py-2 rounded hover:bg-orange-700 transition">
                                            <i class="fa-solid fa-file-pdf text-lg"></i>
                                        </a>
                                        <a href="{{ route('colaboradores.edit', $colaborador->id) }}"
                                            class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-700 transition">
                                            <i class="fa-solid fa-pen-to-square text-lg"></i>
                                        </a>
                                        <form action="{{ route('colaboradores.destroy', $colaborador->id) }}" method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-700 transition">
                                                <i class="fa-solid fa-trash-can text-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
