@extends('layouts.app')

@section('titulo', 'Sobre')

@section('content')
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <h1>Pagamento Pix</h1>
    <p>Use o QR Code abaixo para realizar o pagamento:</p>
    <img src="data:image/png;base64, {{ $imagem_pix }}" alt="QR Code Pix" width="200px">
    <p>Ou copie e cole o código abaixo:</p>
    <textarea readonly>{{ $copia_cola }}</textarea>
