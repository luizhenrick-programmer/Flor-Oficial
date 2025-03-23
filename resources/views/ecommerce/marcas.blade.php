<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

@extends('admin.app')

@section('titulo', 'Categorias Flor Oficial')

@section('content')
    <div class="container-xl flex flex-col py-5">
        <x-text color='gray-200' size='xs' bold='true'>PRODUTOS</x-text>
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
        <div class="flex flex-col bg-gray-800 shadow-md rounded-lg p-2">
            <div class="w-full flex items-center justify-between flex-wrap gap-1">
                <div class="flex flex-wrap flex-nowrap tems-center gap-1">
                    <input type="text" placeholder="Pesquisar..." class="px-3 py-2 rounded-md bg-gray-700 text-white">
                    <button
                        class="btn bg-gray-800 text-white text-center shadow-md rounded-md border border-gray-600 py-2 px-4">
                        <span>Filtros</span>
                    </button>
                </div>
                <div class="flex items-center gap-1">
                    <a class="btn bg-gray-800 text-white shadow-md rounded-md border border-gray-600 py-2 px-4 hover:bg-gray-400 hover:text-black">
                        <i class="fa-solid fa-file-export"></i>
                        <span class="ms-2">Exportar</span>
                    </a>
                    <a href="{{ route('e-commerce.criar_marcas') }}" class="btn bg-violet-600 text-white shadow-md rounded-md border border-gray-600 py-2 px-4 hover:bg-violet-800 hover:text-black">
                        <i class="fa-solid fa-plus"></i>
                        <span class="ms-2">Criar Categoria</span>
                    </a>
                    <a class="btn bg-gray-800 text-white shadow-md rounded-md border border-gray-600 py-2 px-4 hover:bg-gray-400 hover:text-black">
                        <i class="fa-solid fa-rotate"></i>
                        <span class="ms-2">Atualizar</span>
                    </a>
                </div>
            </div>
            @if ($marcas->count())
                <table
                    class="bg-gray-600 rounded table table-hover table-striped table-bordered text-center align-middle mt-4">
                    <thead class="thead-dark">
                        <tr class="bg-dark text-white">
                            <th>ID</th>
                            <th>Imagem</th>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Em estoque?</th>
                            <th>Quantidade</th>
                            <th>Cod. Categoria</th>
                            <th>Criado em</th>
                            <th>Criado por</th>
                            <th>Status</th>
                            <th>Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marcas as $marca)
                            <tr>
                                <td>{{ $marca->id }}</td>
                                <td>{{ $marca->nome }}</td>
                                <td>{{ $marca->criado_por }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="mt-4 alert alert-warning">Nenhuma marca cadastrada</p>
            @endif

            <nav>
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
@endsection
