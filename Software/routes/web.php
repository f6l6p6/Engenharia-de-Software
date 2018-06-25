<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Listando cliente
Route::get('/client', 'ProjectController@index');

// pesquisando cliente
Route::any('/client-search', 'ProjectController@searchClient')->name('search.client');

// salvando cliente
Route::get('/client/create', 'ProjectController@create');
Route::post('client/store', 'ProjectController@store')->name('client.store');

// Formulário de edição
Route::get('/client/{id}/edit', 'ProjectController@edit');
Route::post('/client/{id}/update', 'ProjectController@update')->name('client.update');

// Apagando cliente
Route::get('/client/{id}/destroy', 'ProjectController@delete');



// Listando produto
Route::get('/produto', 'ProdutoController@index');

// pesquisando produto
Route::any('/produto-search', 'ProdutoController@searchProduto')->name('search.produto');

// salvando produto
Route::get('/produto/create', 'ProdutoController@create');
Route::post('produto/store', 'ProdutoController@store')->name('produto.store');

// Formulário de edição
Route::get('/produto/{id}/edit', 'ProdutoController@edit');
Route::post('/produto/{id}/update', 'ProdutoController@update')->name('produto.update');

// Apagando produto
Route::get('/produto/{id}/destroy', 'ProdutoController@delete');




// Listando fornecedor
Route::get('/fornecedor', 'FornecedorController@index');

// pesquisando fornecedor
Route::any('/fornecedor-search', 'FornecedorController@searchFornecedor')->name('search.fornecedor');

// salvando fornecedor
Route::get('/fornecedor/create', 'FornecedorController@create');
Route::post('fornecedor/store', 'FornecedorController@store')->name('fornecedor.store');

// Formulário de edição
Route::get('/fornecedor/{id}/edit', 'FornecedorController@edit');
Route::post('/fornecedor/{id}/update', 'FornecedorController@update')->name('fornecedor.update');

// Apagando fornecedor
Route::get('/fornecedor/{id}/destroy', 'FornecedorController@delete');



// Agenda 
Route::get('/agenda', 'AgendaController@index');

// pesquisando agenda
Route::any('/agenda-search', 'AgendaController@searchAgenda')->name('search.agenda');

// salvando agenda
Route::get('/agenda/create', 'AgendaController@create');
Route::post('agenda/store', 'AgendaController@store')->name('agenda.store');

// editar agenda
Route::get('/agenda/{id}/edit', 'AgendaController@edit');
Route::post('/agenda/{id}/update', 'AgendaController@update')->name('agenda.update');

// Cancelando
Route::get('/agenda/{id}/destroy', 'AgendaController@delete');


//relatório 1º Semestre
Route::get('/relatorio', 'AgendaController@relatorio');
//PDF 1º Semestre
Route::get('/pdf', 'AgendaController@pdf');

//relatório Fornecedor
Route::get('/relatorio-produto', 'AgendaController@relatorioProduto');
//PDF 1º Semestre
Route::get('/pdf-produto', 'AgendaController@pdfProduto');



// Listando patrimonio
Route::get('/patrimonio', 'PatrimonioController@index');
// Apagando cliente
Route::get('/patrimonio/create', 'PatrimonioController@create');

Route::post('patrimonio/store', 'PatrimonioController@store')->name('patrimonio.store');

// Formulário de edição
Route::get('/patrimonio/{id}/edit', 'PatrimonioController@edit');

Route::post('/patrimonio/{id}/update', 'PatrimonioController@update')->name('client.update');
// Apagando cliente
Route::get('/patrimonio/{id}/destroy', 'PatrimonioController@delete');

Route::get('profile', function(){
    return view('profile');
});

/* View Composer*/
View::composer(['*'], function($view){
    
    $user = Auth::user();
    $view->with('user',$user);
    
});
