<?php

use Illuminate\Database\Seeder;
use App\Unidade;

class UnidadeSeeder extends Seeder
{
    public function run()
    {
        //é necessário ter o fillable na classe modelo
        Unidade::create([
            'unidade' => 'g',
            'descricao' => 'gramas',
        ]);

        Unidade::create([
            'unidade' => 'l',
            'descricao' => 'litros',
        ]);

        Unidade::create([
            'unidade' => 'ml',
            'descricao' => 'mililitros',
        ]);

        Unidade::create([
            'unidade' => 'kg',
            'descricao' => 'kilogramas',
        ]);

        Unidade::create([
            'unidade' => 'pc',
            'descricao' => 'peça',
        ]);

        Unidade::create([
            'unidade' => 'un',
            'descricao' => 'unidade',
        ]);
    }
}
