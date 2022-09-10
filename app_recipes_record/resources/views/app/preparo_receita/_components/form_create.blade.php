<form method="post" action="{{ route('preparo-receita.store', ['receita' => $receita]) }}">
    @csrf
    <input type="number" name="ordem" value="{{ old('ordem') ? old('ordem') : ''}}" placeholder="Ordem" class="borda-preta">
    {{$errors->has('ordem') ? $errors->first('ordem') : ''}}
    <select name="ingrediente_id">
        <option>-- Selecione um Ingrediente --</option>

        @foreach($ingredientes as $ingrediente)
            <option value="{{ $ingrediente->id }}" {{ old('ingrediente_id') == $ingrediente->id ? 'selected' : '' }} >{{ ($ingrediente->descricao) }}</option>
        @endforeach
    </select>
    {{ $errors->has('ingrediente_id') ? $errors->first('ingrediente_id') : '' }}
    <input type="number" name="quantidade" value="{{ old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta">
    {{$errors->has('quantidade') ? $errors->first('quantidade') : ''}}

    <button type="submit" class="borda-preta">Adicionar</button>
<form>