@extends('app.layout.basico')

@section('titulo', 'Ingrediente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Ingrediente</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('ingrediente.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <table border="1" style="text-align: left">
                    <tr>
                        <td>Código</td>
                        <td>{{ $ingrediente->codigo }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $ingrediente->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Unidade de Medida:</td>
                        <td>{{ $ingrediente->unidade->descricao }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
