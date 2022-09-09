@extends('app.layout.basico')


@section('titulo', 'Ingrediente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Ingredientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('ingrediente.create') }}">Novo</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                Há {{$ingredientes->total()}} ingredientes
                <table class="highlight" border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Unidade</th>
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
                                <td>{{ $ingrediente->unidade->descricao }} </td>
                                <td><a href="{{ route('ingrediente.show', ['ingrediente' => $ingrediente->id])}}">Ver</a></td>
                                <td><a href="{{ route('ingrediente.edit', ['ingrediente' => $ingrediente->id]) }}">Editar</a></td>
                                <td>
                                    <form id="_form{{$ingrediente->id}}" method="post"
                                        action="{{ route('ingrediente.destroy', [('ingrediente')=>$ingrediente -> id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('_form{{$ingrediente->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ingredientes->appends($request)->links()}}
            </div>
        </div>
    </div>
@endsection
