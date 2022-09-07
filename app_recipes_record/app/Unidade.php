<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = ['unidade', 'descricao']; 

    public function ingredientes()
    {
        return $this->hasMany(Ingrediente::class,'unidade_id','id');
    }
}
