<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.jpg') }}">
    </div>

    <div class="page">
        <nav class="page__menu menu">
            <ul class="menu__list r-list">
                <li class="menu__group"><a href="{{ route('cliente.index') }}" class="menu__link r-link text-underlined">Cliente</a></li>
                <li class="menu__group"><a href="{{ route('app.fornecedor') }}" class="menu__link r-link text-underlined">Fornecedor</a></li>
                <li class="menu__group"><a href="{{ route('ingrediente.index') }}" class="menu__link r-link text-underlined">Ingrediente</a></li>
                <li class="menu__group"><a href="{{ route('receita.index') }}" class="menu__link r-link text-underlined">Receita</a></li>
                <li class="menu__group"><a href="{{ route('produto.index') }}" class="menu__link r-link text-underlined">Produto</a></li>
                <li class="menu__group"><a href="{{ route('pedido.index') }}" class="menu__link r-link text-underlined">Pedido</a></li>
                <li class="menu__group"><a href="{{ route('app.sair') }}" class="menu__link r-link text-underlined">Sair</a></li>
            </ul>
        </nav>
    </div>
</div>
