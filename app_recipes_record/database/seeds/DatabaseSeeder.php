<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use App\MotivoContato;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UnidadeSeeder::class);
        $this->call(MotivoContatoSeeder::class);
    }
}
