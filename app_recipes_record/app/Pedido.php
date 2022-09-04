<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos() {
        //1 produto pertence a muitos pedidos
        return $this->belongsToMany('App\Produto', 'pedidos_produtos');
        /*
        return $this->belongsToMany('App\Produto', 'pedidos_produtos', 'pedido_id', 'produto_id');
        Parâmetros do belongsToMany(1, 2, 3, 4)
        1 - Modelo do relacionamento NxN em relação ao que estamos implementando
        Ou seja, a outra parte àquem deste modelo
        2 - Tabela auxiliar que armazena os registros do relacionamento
        Ou seja, nome da tabela auxiliar entre as 2 entidades (ex.: pedido e produto)
        3 - Nome da FK da tabela mapeada pelo modelo na tabela de relacionamentos
        Ou seja, FK que representa este modelo implementado (no caso, pedido_id) 
        4 - Nome da FK da tabela mapeada pelo modelo utilizado no relacionamento que estamos implementando
        Ou seja, FK oposta ao modelo implementado, que, por sua vez, é a FK do parâmetro 1 (produto_id)
        
        Obs.: este campo é opcional, é apenas em casos em que o nome da tabela não corresponda à
        chave estrangeira da tabela com a qual se relaciona (ex.: Produto x Item, porém a primary_key
        de Item é "produto_id")

        */
    }
}
