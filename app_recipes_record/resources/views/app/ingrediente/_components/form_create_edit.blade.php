@if (isset($ingrediente->id))
    <form method="post" action="{{ route('ingrediente.update', ['ingrediente' => $ingrediente->id]) }}">
        @csrf
        @method('PUT')
@else
        <form method="post" action="{{ route('ingrediente.store') }}">
            @csrf
@endif

<input type="text" name="codigo" value="{{ $ingrediente->codigo ?? old('codigo') }}" placeholder="Código" class="borda-preta">
{{ $errors->has('codigo') ? $errors->first('codigo') : '' }}
<input type="text" name="descricao" value="{{ $ingrediente->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
<select name="unidade_id">
    <option>--Selecione a Unidade de Medida--</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" {{$unidade->id ??  old('unidade_id') == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
<button type="submit" class="borda-preta">Cadastrar</button>

</form>