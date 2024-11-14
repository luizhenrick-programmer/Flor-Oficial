<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="css/app.css" type="text/css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
<body>
    <div id="app">
        <header>
        @include('partials.header')
        </head>
        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            @include('partials.footer')
        </footer>
    </div>
</body>
</html>