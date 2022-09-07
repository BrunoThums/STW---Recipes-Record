@extends('app.layout.basico')

@section('titulo', 'Preparo Receita')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Ingredientes a Receita</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('receita.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes da Receita</h4>
            <p>ID da Receita: {{ $receita->id }}</p>
            <p>Usuário: {{$receita->user_id}}</p>

            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <h4>Ingredientes da receita</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Ordem</th>
                            <th>Nome do Produto</th>
                            <th>Quantidade</th>
                            <th>UN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receita->ingredientes as $ingrediente)
                        <tr>
                            <td>{{$ingrediente->ordem}}</td>
                            <td>{{$ingrediente->descricao}}</td>
                            <td>{{$ingrediente->quantidade}}</td>
                            <td>{{$ingrediente->unidade->descricao}}</td>
                        </tr>
                        @endforeach
                    </tbody>



                </table>
                @component('app.preparo_receita._components.form_create', ['receita' => $receita, 'ingredientes' => $ingredientes])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
