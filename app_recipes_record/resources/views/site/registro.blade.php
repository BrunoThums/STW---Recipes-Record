@extends('site.layout.basico')

@section('titulo', 'Registre-se')
@section('conteudo')


    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Registre-se</h1>
        </div>


        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto">
                <form action={{ route('site.registro') }} method="POST">
                    @csrf
                    <input name="name" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input name="email" value="{{ old('email') }}" type="text" placeholder="Email" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <input name="password" value="{{ old('senha') }}" type="password" placeholder="Senha"
                        class="borda-preta">
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                    <button style="background-color:dodgerblue" type="submit" class="borda-preta">Registrar-se</button>
                </form>
                <a href="{{ route('site.acesso') }}">Login</a>
            </div>
        </div>
    </div>
    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>+55 51 3714-1600</span>
            <br>
            <span>atendimento@stwautomacao.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
