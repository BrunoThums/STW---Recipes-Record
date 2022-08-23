<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor100';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //é necessário ter o fillable na classe modelo
        Fornecedor::create([
            'nome' => 'Fornecedor100',
            'uf' => 'CE',
            'email' => 'contato@fornecedor100.com.br'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor100',
            'uf' => 'CE',
            'email' => 'contato@fornecedor100.com.br'
        ]);

    }
}
