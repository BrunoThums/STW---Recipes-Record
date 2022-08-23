<h3>Fornecedor</h3>

{{-- Este é um comentário que será ignorado pelo Blade, não sendo exibido nem usando o "inspecionar elemento" --}}


@forelse($fornecedores as $indice => $fornecedor)
    <h4>Iteração atual: {{ $loop -> iteration }}</h4>
    Fornecedor: {{ $fornecedor['nome']}}<br>
    Status: {{ $fornecedor['status'] }}<br>
    CNPJ: {{ $fornecedor['cnpj'] }}<br>
    <br>
    @if($loop->first)
        Primeira iteração do loop
    @endif
    
    @if($loop->last)
        Última iteração do loop
        <br>
        Total de Registros: {{ $loop->count}}
    @endif
    <hr>

    @empty
        Não existem fornecedores cadastrados
@endforelse

