<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Painel vendedor')</title>

    <!-- Tailwind CSS ou Bootstrap -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Ícones -->
    <script src="https://kit.fontawesome.com/12004a6e82.js" crossorigin="anonymous"></script>
</head>

<body class="min-h-screen bg-gray-900 text-gray-200 flex">
    <!-- Navegação lateral -->
    @include('vendedor.partials-vendedor.navigation')

    <div class="flex-1 flex flex-col">
 
        @include('vendedor.partials-vendedor.header')

        <main class="flex-1 p-6">
            @yield('content')
        </main>

        @include('vendedor.partials-vendedor.footer')

    </div>
    
</body>
</html>
