@extends('app.layout.basico')

@section('titulo', 'Receita')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Receitas</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('receita.create') }}">Novo</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                Há {{ $receitas->total() }} receitas
                <table class="highlight" border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Usuário</th>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receitas as $receita)
                            <tr>
                                <td>{{ $receita->codigo }} </td>
                                <td>{{ $receita->user->name }} </td>
                                <td>{{ $receita->nome}} </td>
                                <td><a href="{{ route('preparo-receita.create', ['receita' => $receita->id]) }}">Adicionar produto</a></td>
                                <td><a href="{{ route('preparo-receita.show', ['receita' => $receita->id]) }}">Ver</a></td>
                                <td><a href="{{ route('preparo-receita.edit', ['receita' => $receita->id]) }}">Editar</a></td>
                                <td>
                                    <form id="_form{{$receita->id}}" method="post"
                                        action="{{ route('preparo-receita.destroyRecipe', $receita->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('_form{{$receita->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $receitas->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
