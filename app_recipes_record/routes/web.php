<?php

use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/acesso/{erro?}', 'LoginController@index')->name('site.acesso');
Route::post('/acesso', 'LoginController@autenticar')->name('site.acesso');
Route::get('/registro', 'LoginController@index_register')->name('site.registro');
Route::post('/registro', 'LoginController@register')->name('site.registro');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::resource('ingrediente', 'IngredienteController');

    Route::resource('receita', 'ReceitaController');
    Route::get('preparo-receita/create/{receita}', 'PreparoReceitaController@create')->name('preparo-receita.create');
    Route::post('preparo-receita/store/{receita}', 'PreparoReceitaController@store')->name('preparo-receita.store');
    Route::delete('preparo-receita.destroy/{receita}/{ingrediente}', 'PreparoReceitaController@destroy')->name('preparo-receita.destroy');
    Route::get('preparo-receita/{receita}/edit', 'PreparoReceitaController@edit')->name('preparo-receita.edit');
    Route::put('preparo-receita/{receita}/update', 'PreparoReceitaController@update')->name('preparo-receita.update');
    Route::delete('preparo-receita.destroyRecipe/{receita}', 'PreparoReceitaController@destroyRecipe')->name('preparo-receita.destroyRecipe');
    Route::get('preparo-receita.show/{receita}', 'PreparoReceitaController@show')->name('preparo-receita.show');
});

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui</a> para voltar para a página inicial';
});
/*
verbo http:

get
post
put
patch
delete
options
 */

Auth::routes();