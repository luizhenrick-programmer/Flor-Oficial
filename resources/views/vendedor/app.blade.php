<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Painel vendedor')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/12004a6e82.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="flex flex-col w-full min-h-screen bg-gray-900">
        @include('vendedor.partials-vendedor.header')
        <div class="flex flex-row flex-grow min-h-screen bg-gray-900">
            <aside class="bg-gray-800 hidden lg:flex lg:w-64">
                @include('vendedor.partials-vendedor.navigation')
            </aside>
            <div class="flex flex-col flex-grow">
                <main>
                    @yield('content')
                </main>
            </div>

        </div>
        @include('vendedor.partials-vendedor.footer')
    </div>
</body>
</html>
