@extends('app.layout.basico')

@section('titulo', 'Receita')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Receita</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('receita.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                @component('app.receita._components.form_create_edit', ['users' =>$users])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
