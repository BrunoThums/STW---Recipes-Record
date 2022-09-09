<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitasIngredientesPreparoreceita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Convenção sobre chave estrangeira: nome da tabela no sing. + "_id"
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60);
            $table->integer('codigo');
            //recebe id de users
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            //user_id da tabela users
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('descricao', 45);
            //recebe id de unidades
            $table->unsignedBigInteger('unidade_id');
            $table->timestamps();

            //unidade_id da tabela unidades
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        Schema::create('preparo_receitas', function (Blueprint $table) {
            $table->id();
            $table->float('quantidade',10, 2);
            $table->integer('ordem');
            //recebe id de receitas
            $table->unsignedBigInteger('receita_id');
            //recebe id de ingredientes
            $table->unsignedBigInteger('ingrediente_id');
            $table->timestamps();

            //receita_id da tabela receitas
            $table->foreign('receita_id')->references('id')->on('receitas');
            //ingrediente_id da tabela ingredientes
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('receitas');
        Schema::dropIfExists('ingredientes');
        Schema::dropIfExists('preparo_receitas');
        Schema::disableForeignKeyConstraints();
    }
}
