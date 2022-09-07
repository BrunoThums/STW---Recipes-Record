<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = ['codigo', 'descricao', 'unidade_id']; 

    public function receitas() {
        //1 produto pertence a muitos pedidos
        return $this->belongsToMany('App\Receita', 'preparo_receitas');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class,'unidade_id','id');
    }
}
