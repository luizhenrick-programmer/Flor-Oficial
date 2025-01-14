@extends('layouts.app') {{-- herança --}}

@section('titulo', 'Sobre')

@section('content')
    <style>
        .about-header {
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .about-section img {
            max-height: 300px;
            object-fit: cover;
            width: 100%;
        }
        .about-text {
            margin-top: 1rem;
        }
    </style>
    <div class="container my-5">
        <div class="about-header text-center">
            <h2>SOBRE NÓS</h2>
        </div>

        <!-- Imagem principal -->
        <div class="row mb-4">
            <div class="col-12">
                <img src="https://via.placeholder.com/1200x400" alt="Imagem Sobre" class="img-fluid">
            </div>
        </div>

        <!-- Seção de Texto e Imagens -->
        <div class="row">
            <div class="col-md-8">
                <h3>Nossa História</h3>
                <p>A Flor de Pitanga nasceu de um desejo de criar algo que fosse além da moda. Queríamos trazer a frescura, a singularidade e a elegância que a natureza oferece. Cada peça é uma celebração da beleza natural, inspirada nas plantas – uma linha viva, vibrante e resiliente.</p>
            </div>
            <div class="col-md-4">
                <img src="https://via.placeholder.com/400x300" alt="Imagem História" class="img-fluid rounded">
            </div>
        </div>

        <div class="row my-4">
            <div class="col-md-4">
                <h3>Nossa Missão</h3>
                <p>Oferecer roupas de qualidade, que sejam modernas e acessíveis, sem nunca comprometer o conforto e o estilo. Queremos que cada peça reflita a individualidade de quem a veste e se conecte com a natureza.</p>
                <img src="https://via.placeholder.com/400x300" alt="Imagem Missão" class="img-fluid rounded about-text">
            </div>
            <div class="col-md-4">
                <h3>Nossa Visão</h3>
                <p>Ser referência no mercado da moda sustentável, criando produtos que inspirem uma conexão mais profunda com a natureza e promovam um estilo de vida mais consciente.</p>
                <img src="https://via.placeholder.com/400x300" alt="Imagem Visão" class="img-fluid rounded about-text">
            </div>
            <div class="col-md-4">
                <h3>A Empresa</h3>
                <p>A Flor de Pitanga é mais do que uma marca – é um estilo de vida que preza pela elegância natural. Nossa dedicação à moda sustentável é a nossa forma de honrar a terra, trazendo a beleza das plantas para o dia a dia.</p>
                <img src="https://via.placeholder.com/400x300" alt="Imagem Empresa" class="img-fluid rounded about-text">
            </div>
        </div>
    </div>


@endsection

