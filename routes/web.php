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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/produtos', ['as' => 'index','uses' =>'AdminController@produto']);
Route::get('/admin/produto/novo', ['as' => 'index','uses' =>'AdminController@criarProduto']);


Route::group(['as' => 'produtos.', 'prefix' => '/admin/produtos'], function(){

    Route::get('', ['as' => 'index','uses' =>'ProdutoController@index']);
    Route::get('/novo', ['as' => 'create','uses' =>'ProdutoController@create']);
    Route::post('', ['as' => 'store','uses' =>'ProdutoController@store']);
    Route::get('/{id}', ['as' => 'edit','uses' =>'ProdutoController@edit']);
    Route::post('/{id}', ['as' => 'update','uses' =>'ProdutoController@update']);
    Route::get('/delete/{id}', ['as' => 'destroy','uses' =>'ProdutoController@destroy']);
});

Route::group(['as' => 'marcas.', 'prefix' => '/admin/marcas'], function(){

    Route::get('', ['as' => 'index','uses' =>'MarcaController@index']);
    Route::get('/novo', ['as' => 'create','uses' =>'MarcaController@create']);
    Route::post('', ['as' => 'store','uses' =>'MarcaController@store']);
    Route::get('/{id}', ['as' => 'edit','uses' =>'MarcaController@edit']);
    Route::post('/{id}', ['as' => 'update','uses' =>'MarcaController@update']);
    Route::get('/delete/{id}', ['as' => 'destroy','uses' =>'MarcaController@destroy']);
});

Route::group(['as' => 'categorias.', 'prefix' => '/admin/categorias'], function(){

    Route::get('', ['as' => 'index','uses' =>'CategoriaController@index']);
    Route::get('/novo', ['as' => 'create','uses' =>'CategoriaController@create']);
    Route::post('', ['as' => 'store','uses' =>'CategoriaController@store']);
    Route::get('/{id}', ['as' => 'edit','uses' =>'CategoriaController@edit']);
    Route::post('/{id}', ['as' => 'update','uses' =>'CategoriaController@update']);
    Route::get('/delete/{id}', ['as' => 'destroy','uses' =>'CategoriaController@destroy']);
});

Route::get('/admin', function () {
    return view('admin.auth.login');
});

Route::get('/admin/email', function () {
    return view('admin.auth.passwords.email');
});

Route::get('/admin/reset', function () {
    return view('admin.auth.passwords.email');
});


