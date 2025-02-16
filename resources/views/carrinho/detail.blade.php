@extends('layouts.app')

@section('titulo', 'detalhes')

@section('content')
    <div class="row conteiner">
        <img src="{{ asset($produto->url) }}" alt="responsive-img">
    </div>
    <div>
        <h4> {{$produto->nome}} </h4>
        <h4> R$ {{ number_format($preco->preco, 2, ',', '.') }} </h4>
        <p>{{$produto->descricao}}</p>
        <p> Postado por:{{$produto->user->firstname}}
            Categoria: {{$produto->categoria->nome}}
        <p/>
    </div>

    <form action="{{ route('addCart') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$produto->id}}">
        <input type="hidden" name="nome" value="{{$produto->nome}}">
        <input type="hidden" name="preco" value="{{$produto->preco}}">
        <input type="number" name="quantidade" value="1">
        <input type="hidden" name="url" value="{{$produto->url}}">
        <button class="btn orange">Adicionar ao Carrinho </button>
    </form>

@endsection
