@extends('layouts.app')

@section('titulo', 'Sobre')

@section('content')
    <style>
        .about-header {
            font-weight: bold;
            margin-bottom: 2rem;
            color: #333;
        }
        .about-section img {
            max-height: 300px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.3s ease;
        }
        .about-section img:hover {
            transform: scale(1.05);
        }
        .about-section h3 {
            font-size: 1.5rem;
            color: #555;
            margin-bottom: 1rem;
        }
        .about-text {
            margin-top: 1rem;
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }
        .about-row {
            margin-bottom: 2rem;
        }
        .container {
            padding: 2rem 1rem;
        }
        .about-section img,
        .about-text img {
            height: 300px;
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
        .logo-custom {
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: 0 auto;
        }
    </style>

    <div class="container my-5">
        <div class="about-header text-center">
            <h2 class="display-4">SOBRE NÓS</h2>
        </div>

        <!-- Imagem principal -->
        <div class="row justify-content-center mb-5 text-center">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/logoSite.png') }}" alt="Logo Flor di Pitanga" class="img-fluid logo-custom">
            </div>
        </div>

        <!-- Seção de Texto e Imagens -->
        <div class="row align-items-start my-5">
            <div class="col-md-6">
                <h3 class="text-uppercase mb-4">Nossa História</h3>
                <p class="text-muted">
                    <strong>A história da Flor de Pitanga é marcada pelo desejo de unir moda e natureza de uma forma única e inovadora.</strong>
                    Inspirados pela força e delicadeza que encontramos nas plantas, buscamos criar peças que traduzem autenticidade e beleza natural.
                </p>
                <p class="text-muted">
                    Mais do que roupas, cada criação carrega um propósito: celebrar a essência de quem as veste, promover sustentabilidade e resgatar a conexão com o meio ambiente.
                </p>
                <p class="text-muted">
                    <strong>Nossos modelos refletem uma jornada de respeito à terra e valorização do estilo consciente, para pessoas que buscam mais do que vestir, mas viver a moda de forma responsável.</strong>
                </p>
            </div>
            <div class="col-md-6">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/lojaLoja.jpg') }}" alt="Roupas na loja" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>

        <div class="row about-row text-center">
            <div class="col-md-4">
                <h3>Nossa Missão</h3>
                <p class="about-text">Inspirar e empoderar nossas clientes através da moda, oferecendo produtos que combinam estilo, conforto e identidade, sempre com um atendimento acolhedor e personalizado.</p>
                <img src="{{ asset('assets/images/fotoSobreFour.jpg') }}" alt="Imagem Missão" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-4">
                <h3>Nossa Visão</h3>
                <p class="about-text">Ser referência em moda em Formosa e região, proporcionando uma experiência única de compra, com qualidade, exclusividade e um atendimento próximo e diferenciado.
                </p>
                <img src="{{ asset('assets/images/fotoSobre.jpg') }}" alt="Imagem Visão" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-4">
                <h3>A Empresa</h3>
                <p class="about-text">Localizada no coração de Formosa, Goiás, nossa loja oferece peças, unindo tendências e conforto para valorizar sua personalidade. Aqui, moda é mais do que vestir — é se expressar!
                </p>
                <img src="{{ asset('assets/images/fotoSobreTree.jpg') }}" alt="Imagem Empresa" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7687.927645385793!2d-47.337123!3d-15.54007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9350a38a25168d75%3A0xdfc92157a64fb423!2sFlor%20di%20oficial!5e0!3m2!1spt-BR!2sbr!4v1737686538384!5m2!1spt-BR!2sbr"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="shadow rounded">
        </iframe>
    </div>

@endsection
