<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <title>{{ config('app.name', 'Flor de Pitanga') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-white antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-800">
            <div>
                <a href="/" class="no-underline">
                    <div class="flex flex-row items-center no-underline">
                        <img class="rounded-full w-16 h-16 mx-2" src="{{ ('assets\images\Flor Oficial.png') }}" alt="Logo">
                        <div class="flex flex-col align-items no-underline">
                            <h1 class="text-lg font-bold text-orange-100 montserrat mb-0 no-underline">Flor Oficial</h1>
                            <p class="text-sm text-nowrap text-orange-100 mb-0 no-underline">BY Thays Conrado</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 text-dark shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
