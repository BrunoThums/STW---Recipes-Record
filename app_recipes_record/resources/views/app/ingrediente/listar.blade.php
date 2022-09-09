@extends('app.layout.basico')

@section('titulo', 'Ingredientes')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Ingredientes - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.ingredientes.create') }}">Novo</a></li>
                <li><a href="{{ route('app.ingredientes.listar') }}">Consulta</a></li>
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
                            <th>Unidade</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingredientes as $ingrediente)
                            <tr>
                                <td>{{ $ingrediente->codigo }} </td>
                                <td>{{ $ingrediente->descricao }} </td>
                                <td>{{ $ingrediente->unidade->descricao }} </td>
                                <td><a href="{{ route('app.ingrediente.edit', $ingrediente->id)}}">Editar</a></td>
                                <td><a href="{{ route('app.ingrediente.destroy', $ingrediente->id) }}">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ingredientes->appends($request)->links()}}
            </div>
        </div>
    </div>
@endsection
