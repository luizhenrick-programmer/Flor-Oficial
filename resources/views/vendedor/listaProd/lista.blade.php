@extends('vendedor.app')

@section('titulo', 'Painel Produtos')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center text-pink-600">Lista de Produtos</h2>

        <!-- Formulário de Pesquisa -->
        <form method="GET" action="{{ route('vendedor.listaProd') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar produto..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>


        <table class="table table-dark">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->quantidade }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
