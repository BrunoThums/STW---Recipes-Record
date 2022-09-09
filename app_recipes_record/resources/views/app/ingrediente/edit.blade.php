@extends('app.layout.basico')

@section('titulo', 'Ingrediente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Ingrediente</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('ingrediente.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                @component('app.ingrediente._components.form_create_edit', ['ingrediente'=>$ingrediente, 'unidades' => $unidades])
                @endcomponent
                </form>
            </div>
        </div>
    </div>
@endsection
