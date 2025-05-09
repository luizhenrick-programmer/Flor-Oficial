@extends('admin.app')

@section('content')
<div class="container-xl">
    <x-text color='gray-200' size='sm' bold='true'>REMESSAS</x-text>

    <div class="w-full flex justify-center items-center py-4">
        <div class="w-full md:w-3/4 lg:w-2/3 flex gap-2 relative">
            <div class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1111.19 3.26l4.42 4.42a1 1 0 01-1.42 1.42l-4.42-4.42A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
            <input type="text" placeholder="Pesquisar..." class="w-full pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <a href="#" class="bg-green-600 text-white px-4 rounded-lg no-underline flex items-center gap-2 hover:bg-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="font-semibold text-md tracking-wide">Nova Remessa</span>
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-gray-700 rounded-lg text-white text-center text-xs md:text-sm">
            <thead>
                <tr class="bg-gray-800 text-gray-300">
                    <th class="p-3">ID</th>
                    <th class="p-3">Cliente</th>
                    <th class="p-3">Produto</th>
                    <th class="p-3">Data de Envio</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr class="border-b border-gray-600">
                        <td class="p-3"></td>
                        <td class="p-3"></td>
                        <td class="p-3"></td>
                        <td class="p-3"></td>
                        <td class="p-3">
                            <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Remessa</span>
                        </td>
                    </tr>
                
            </tbody>
        </table>
    </div>
</div>
@endsection
