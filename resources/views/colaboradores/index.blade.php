@extends('admin.app')

@section('content')
        @if (session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif

        <div class="container-xl">
            <x-text color='gray-200' size='sm' bold='true'>COLABORADORES</x-text>
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
                    <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao Controle de Funcionários!</x-text>
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
                    <a href="{{ route('colaboradores.create') }}" class="bg-blue-600 text-white px-4 rounded-lg no-underline flex items-center gap-2 hover:bg-blue-700" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v6h6a1 1 0 110 2h-6v6a1 1 0 11-2 0v-6H3a1 1 0 110-2h6V3a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold text-md tracking-wide">Cadastrar</span>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full bg-white border-0 rounded-lg text-white text-center">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center">Nome</th>
                            <th class="py-3 px-6 text-center">CPF</th>
                            <th class="py-3 px-6 text-center">Telefone</th>
                            <th class="py-3 px-6 text-center">Usuário</th>
                            <th class="py-3 px-6 text-center">Função</th>
                            <th class="py-3 px-6 text-center">E-mail</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        @foreach ($colaboradores as $colaborador)
                            <tr class="border-t border-gray-200 hover:bg-gray-200 transition">
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
@endsection
