@extends('app.layout.basico')

@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de ingredientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('ingrediente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                Há {{$ingredientes->total()}} ingredientes
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingredientes as $ingrediente)
                            <tr>
                                <td>{{ $ingrediente->codigo }} </td>
                                <td>{{ $ingrediente->descricao }} </td>
                                <td><a href="{{ route('ingrediente.show', ['ingrediente' => $ingrediente->id])}}">Ver</a></td>
                                <td><a href="">Editar</a></td>
                                <td><a href="">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ingredientes->appends($request)->links()}}
            </div>
        </div>
    </div>
@endsection
