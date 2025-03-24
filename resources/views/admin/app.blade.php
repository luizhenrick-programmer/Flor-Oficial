<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Painel Administrativo')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/12004a6e82.js" crossorigin="anonymous"></script>

<body>
    <script src="{{ asset('js/cep.js') }}"></script>
    <!-- Layout Principal -->
    <div class="tw-bg-primary flex flex-col w-full min-h-screen">
        @include('admin.partials-admin.header')
        <div class="flex flex-grow">
            <aside class="hidden lg:flex lg:w-64">
                @include('admin.partials-admin.navigation')
            </aside>
            @yield('content')
        </div>
    </div>
</body>

</html>
