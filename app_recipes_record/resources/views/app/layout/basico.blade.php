<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>RR - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    </head>

    <body>
        @include('app.layout._partials.menu')
        @yield('conteudo')
    </body>r
</html>