<?php

use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/acesso/{erro?}', 'LoginController@index')->name('site.acesso');
Route::post('/acesso', 'LoginController@autenticar')->name('site.acesso');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');
    Route::resource('/produto','ProdutoController');

    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');
    //Route::resource('pedido_produto', 'PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    
    Route::resource('ingrediente', 'IngredienteController');
    Route::resource('receita', 'ReceitaController');
    Route::get('preparo-receita/create/{receita}', 'PreparoReceitaController@create')->name('preparo-receita.create');
    Route::post('preparo-receita/store/{receita}', 'PreparoReceitaController@store')->name('preparo-receita.store');
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