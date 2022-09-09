<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.jpg') }}">
    </div>

    <div class="page">
        <nav class="page__menu menu">
            <ul class="menu__list r-list">
                <li class="menu__group"><a href="{{ route('ingrediente.index') }}" class="menu__link r-link text-underlined">Ingrediente</a></li>
                <li class="menu__group"><a href="{{ route('receita.index') }}" class="menu__link r-link text-underlined">Receita</a></li>
                <li class="menu__group"><a href="{{ route('app.sair') }}" class="menu__link r-link text-underlined">Sair</a></li>
            </ul>
        </nav>
    </div>
</div>
