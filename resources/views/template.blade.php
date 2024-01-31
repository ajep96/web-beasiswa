<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Beasiswa - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-5.3.2/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>
        @include('partials.navbar')
        @include('partials.header')
        <main class="container-fluid">
            @yield('content')
        </main>
        @stack('scripts')
    </body>

</html>
