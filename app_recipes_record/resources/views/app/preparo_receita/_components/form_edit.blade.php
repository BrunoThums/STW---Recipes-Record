@if (isset($receita->id))
    <form method="post" action="{{ route('receita.update', ['receita' => $receita->id]) }}">
        @csrf
        @method('PUT')
@else
        <form method="post" action="{{ route('receita.store') }}">
            @csrf
@endif

<input type="text" name="codigo" value="{{ $receita->codigo ?? old('codigo') }}" 
placeholder="Código" class="borda-preta">

{{ $errors->has('codigo') ? $errors->first('codigo') : '' }}

<input type="text" name="nome" value="{{ $receita->nome ?? old('nome') }}" 
placeholder="Nome" class="borda-preta">

{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<select name="user_id">
    <option>--Selecione o usuário--</option>
    @foreach ($users as $user)
    <option value="{{ $user->id }}" {{($receita->user_id ?? old('user_id')) == $user->id ? 'selected' : '' }}>
            {{ $user->name }}</option>
    @endforeach
</select>
{{ $errors->has('user_id') ? $errors->first('user_id') : '' }}
<button type="submit" class="borda-preta">Cadastrar</button>

</form>