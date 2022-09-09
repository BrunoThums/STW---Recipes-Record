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
            </ul>
        </div>
        <div class="informacao-pagina">
            <h2>{{$receita->nome}}</h2>
            <h4 style="color: lightgray">Por {{$receita->user->name}}</h4>
            
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <h2>Ingredientes</h2>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Ordem</th>
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
                            <td>{{$ingrediente->descricao}}</td>
                            <td>{{$ingrediente->pivot->quantidade}}</td>
                            <td>{{$ingrediente->unidade->descricao}}</td>
                            <td>
                                <form id="form_{{$receita->id}}_{{$ingrediente->id}}" method="post" action="{{route('preparo-receita.destroy', ['receita'=>$receita->id, 'ingrediente'=>$ingrediente->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$receita->id}}_{{$ingrediente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
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
