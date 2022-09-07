@extends('site.layout.basico')

@section('titulo', 'Home')
@section('conteudo')


    <div class="conteudo-destaque">

        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Recipes Record</h1>
                <p>Software para gestão de receitas, ideal para a sua empresa.
                <p>
                <div class="chamada">
                    <img src="{{ asset('/img/check.png') }}">
                    <span class="texto-branco">Cadastro completo e descomplicado</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Sua empresa na nuvem</span>
                </div>
            </div>

            <div class="video">
                <img style= "border-radius:40px" src="{{ asset('img/logoSTW.png') }}">
            </div>
        </div>

        <div class="direita">
            <div class="contato">
                <h1>Contato</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.
                <p>
                    @component('site.layout._components.form_contato', ['classe' => 'borda-branca', 'motivo_contatos'=>$motivo_contatos])                   
                    @endcomponent
            </div>
        </div>
    </div>
@endsection
