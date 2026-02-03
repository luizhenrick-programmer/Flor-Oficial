@extends('layouts.app')

@section('titulo', 'Flor Oficial - Ofertas')

@section('content')
<div class="min-h-screen bg-gray-50 pb-20">
    
    {{-- Banner Promocional --}}
    <div class="w-full bg-gradient-to-r from-purple-800 to-purple-600 shadow-lg">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="text-white">
                <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">Ofertas Especiais</h1>
                <p class="mt-2 text-purple-100 font-medium">Os melhores preços com entrega rápida para todo o Brasil.</p>
            </div>
            {{-- Ícone ou Imagem de destaque --}}
            <div class="hidden md:block text-purple-200 opacity-50">
                <i class="fa-brands fa-pagelines text-6xl"></i>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        
        {{-- Alerta de Sucesso --}}
        @if(session('message'))
            <div class="mb-6 rounded-lg bg-green-100 p-4 text-green-700 border border-green-200 flex items-center shadow-sm">
                <i class="fa-solid fa-circle-check mr-2 text-xl"></i>
                <span class="font-bold">{{ session('message') }}</span>
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-8">
            
            {{-- Sidebar de Filtros (Estilo Card) --}}
            <aside class="w-full lg:w-1/4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-24">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-filter text-purple-600"></i> Filtros
                    </h2>

                    {{-- Categorias --}}
                    <div class="mb-6">
                        <h3 class="text-sm font-bold text-gray-600 uppercase mb-3">Categorias</h3>
                        <ul class="space-y-2">
                            @foreach ($categorias as $categoria)
                                <li>
                                    <label class="flex items-center cursor-pointer hover:bg-gray-50 p-1 rounded">
                                        <input type="checkbox" name="categoria" value="{{ $categoria->id }}" class="rounded text-purple-600 focus:ring-purple-500 border-gray-300">
                                        <span class="ml-2 text-gray-700 font-medium">{{ $categoria->nome }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Cores --}}
                    <div class="mb-6">
                        <h3 class="text-sm font-bold text-gray-600 uppercase mb-3">Cores</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['#f39c12', '#e91e63', '#4a148c', '#3498db', '#2ecc71', '#000000', '#ffffff'] as $cor)
                                <label class="cursor-pointer relative group">
                                    <input type="checkbox" name="cor" value="{{ $cor }}" class="peer hidden">
                                    <span class="block w-8 h-8 rounded-full border-2 border-gray-200 shadow-sm peer-checked:ring-2 peer-checked:ring-purple-500 peer-checked:border-white" style="background-color: {{ $cor }};"></span>
                                    <i class="fa-solid fa-check absolute inset-0 m-auto text-white opacity-0 peer-checked:opacity-100 text-sm drop-shadow-md flex justify-center items-center"></i>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <button class="w-full bg-gray-900 text-white font-bold py-2 rounded-lg hover:bg-gray-800 transition shadow-md">
                        Aplicar Filtros
                    </button>
                </div>
            </aside>

            {{-- Grid de Produtos --}}
            <main class="flex-1">
                
                {{-- Barra de Ordenação --}}
                <div class="flex justify-between items-center mb-6 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <span class="text-sm font-bold text-gray-500">{{ $produtos->count() }} produtos encontrados</span>
                    
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600 hidden sm:block">Ordenar por:</label>
                        <select class="text-sm border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 bg-gray-50 p-2">
                            <option>Mais Relevantes</option>
                            <option>Menor Preço</option>
                            <option>Maior Preço</option>
                        </select>
                    </div>
                </div>

                @if ($produtos->isEmpty())
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                        <div class="inline-block p-4 rounded-full bg-yellow-100 text-yellow-600 mb-4">
                            <i class="fa-solid fa-box-open text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Ops! Nada por aqui.</h3>
                        <p class="text-gray-500 mt-2">Tente mudar os filtros ou busque por outro termo.</p>
                        <a href="{{ route('loja.index') }}" class="inline-block mt-6 text-purple-600 font-bold hover:underline">Limpar busca</a>
                    </div>
                @else
                    {{-- Grid Responsivo --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($produtos as $produto)
                            <x-card-produto :produto="$produto" />
                        @endforeach
                    </div>

                    <div class="mt-12">
                        {{ $produtos->links() }}
                    </div>
                @endif
            </main>
        </div>
    </div>
</div>
@endsection