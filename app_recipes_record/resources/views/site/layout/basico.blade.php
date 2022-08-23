<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>RR - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    </head>

    <body>
        @include('site.layout._partials.menu')
        @yield('conteudo')
    </body>
</html>