@extends('app.layout.basico')

@section('titulo', 'Ingrediente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Receita</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('receita.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <h2>{{$receita->nome}}</h2>
            <h4 style="color: lightgray">Por {{$receita->user->name}}</h4>
                @component('app.receita._components.form_create_edit', ['receita' => $receita, 'users' => $users])
                @endcomponent
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Ordem</th>
                            <th>Código</th>
                            <th>Nome do Produto</th>
                            <th>Quantidade</th>
                            <th>UN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receita->ingredientes as $ingrediente)
                        <tr>
                            <td>{{$ingrediente->pivot->ordem}}</td>
                            <td>{{$ingrediente->codigo}}</td>
                            <td>{{$ingrediente->descricao}}</td>
                            <td>{{$ingrediente->pivot->quantidade}}</td>
                            <td>{{$ingrediente->unidade->descricao}}</td>
                        </tr>
                        @endforeach
                    </tbody>



                </table>
            </div>
        </div>
    </div>
@endsection
