@extends('site.layout.basico')

@section('titulo', 'Contato')
@section('conteudo')


    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        
        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layout._components.form_contato', ['classe' => 'borda-preta', 'motivo_contatos'=>$motivo_contatos])  
                <p>A nossa equipe analisará sua mensagem e retornará o mais breve possível.</p>
                <p>Nosso tempo médio de resposta é de 48 horas.</p>                 
                @endcomponent
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
