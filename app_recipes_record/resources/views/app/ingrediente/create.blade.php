@extends('app.layout.basico')

@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Ingrediente</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{route('ingrediente.store')}}">
                    @csrf
                    <input type="text" name="codigo" value="{{ old('codigo') }}" placeholder="Código" class="borda-preta">
                    {{$errors->has('codigo') ? $errors->first('codigo') : ''}}
                    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    <select name="unidade_id">
                        <option>--Selecione a Unidade de Medida--</option>
                        @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id}}"  {{ old('unidade_id') ==$unidade->id ? 'selected' : '' }} >{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
                    <button type="submit" class="borda-preta">Cadastrar</button>

                </form>
            </div>
        </div>
    </div>
@endsection
