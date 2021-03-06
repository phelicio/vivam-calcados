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
##Admin Routes ##begin
Route::group(['as' => 'produtos.', 'prefix' => '/admin/produtos' ,'middleware' => 'auth.admin'], function(){

    Route::get('', ['as' => 'index','uses' =>'ProdutoController@index']);
    Route::get('/novo', ['as' => 'create','uses' =>'ProdutoController@create']);
    Route::post('', ['as' => 'store','uses' =>'ProdutoController@store']);
    Route::get('/{id}', ['as' => 'edit','uses' =>'ProdutoController@edit']);
    Route::put('/{id}', ['as' => 'update','uses' =>'ProdutoController@update']);
    Route::delete('/delete/{id}', ['as' => 'destroy','uses' =>'ProdutoController@destroy']);
});

Route::group(['as' => 'marcas.', 'prefix' => '/admin/marcas','middleware' => 'auth.admin'], function(){

    Route::get('', ['as' => 'index','uses' =>'MarcaController@index']);
    Route::get('/novo', ['as' => 'create','uses' =>'MarcaController@create']);
    Route::post('', ['as' => 'store','uses' =>'MarcaController@store']);
    Route::get('/{id}', ['as' => 'edit','uses' =>'MarcaController@edit']);
    Route::put('/{id}', ['as' => 'update','uses' =>'MarcaController@update']);
    Route::delete('/delete/{id}', ['as' => 'destroy','uses' =>'MarcaController@destroy']);
});

Route::group(['as' => 'categorias.', 'prefix' => '/admin/categorias','middleware' => 'auth.admin'], function(){

    Route::get('', ['as' => 'index','uses' =>'CategoriaController@index']);
    Route::get('/novo', ['as' => 'create','uses' =>'CategoriaController@create']);
    Route::post('', ['as' => 'store','uses' =>'CategoriaController@store']);
    Route::get('/{id}', ['as' => 'edit','uses' =>'CategoriaController@edit']);
    Route::put('/{id}', ['as' => 'update','uses' =>'CategoriaController@update']);
    Route::delete('/delete/{id}', ['as' => 'destroy','uses' =>'CategoriaController@destroy']);
});

Route::get('/admin/pedido/{id}', ['as' => 'admin.pedido', 'uses' => 'AdminController@pedido', 'middleware' => 'auth.admin']);


Route::group(['as' => 'admin.', 'prefix' => '/admin'], function(){
    
    Route::get('/', ['as' => 'loginPage', 'uses' => 'AdminController@loginPage']);
    Route::post('/login' , ['as' => 'login' , 'uses' => 'AdminController@login']);
    Route::post('/logout' , ['as' => 'logout' , 'uses' => 'AdminController@logout']);

});

Route::post('/admin/acoes', ['as' => 'acoesVendas', 'uses' => 'AdminController@acoesVendas', 'middleware' => 'auth.admin']);
Route::get('/admin/clientes', ['as' => 'admin.clientes', 'uses' => 'AdminController@clientes', 'middleware' => 'auth.admin']);



Route::get('/admin/email', function () {
    return view('admin.auth.passwords.email');
});


Route::get('/admin/vendas', ['as' => 'admin.vendas', 'uses' => 'AdminController@historico', 'middleware' => 'auth.admin']);

##Admin Routes ##end


##User Routes

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/sobre', ['as' => 'sobre', 'uses' => 'HomeController@sobre']);
Route::get('/endereco', ['as' => 'enderecos', 'uses' => 'EnderecoController@index', 'middleware' => 'auth']);
Route::get('/endereco/escolha', ['as' => 'enderecosEscolha', 'uses' => 'EnderecoController@entrega', 'middleware' => 'auth']);
Route::post('/endereco', ['as' => 'enderecos.store', 'uses' => 'EnderecoController@store', 'middleware' => 'auth']);
Route::post('/enderecoEntrega', ['as' => 'enderecos.saveEntrega', 'uses' => 'EnderecoController@saveEntrega', 'middleware' => 'auth']);
Route::get('/checkout', ['as' => 'checkoutPage', 'uses' => 'CheckoutController@checkoutPage']);
Route::get('/compra', ['as' => 'compraConcluida', 'uses' => 'CheckoutController@compraConcluida', 'middleware' => 'auth']);
Route::post('/checkout', ['as' => 'checkout', 'uses' => 'CheckoutController@checkout', 'middleware' => 'auth']);
Route::get('/compras', ['as' => 'compras', 'uses' => 'CheckoutController@compras', 'middleware' => 'auth']);
Route::get('/checkoutStore', ['as' => 'checkoutStore', 'uses' => 'CheckoutController@store', 'middleware' => 'auth']);
Route::get('/pedidos', ['as' => 'pedidos', 'uses' => 'CheckoutController@index', 'middleware' => 'auth']);
Route::get('/pedido/{id}', ['as' => 'pedido', 'uses' => 'CheckoutController@pedido', 'middleware' => 'auth']);
Route::get('/produtos', ['as' => 'produtos', 'uses' => 'ProdutoController@userIndex']);
Route::group(['as' => 'produtos.', 'prefix' => '/produtos'], function(){

    Route::get('', ['as' => 'catalogo','uses' =>'ProdutoController@catalogo']);
    Route::get('/{id}', ['as' => 'show','uses' =>'ProdutoController@show']);

});

Route::group(['as' => 'carrinho.', 'prefix' => '/carrinho', 'middleware' => 'auth'], function(){
    
    Route::get('', ['as' => 'carrinho', 'uses' => 'CarrinhoController@show']);
    Route::post('', ['as' => 'addProduto', 'uses' => 'CarrinhoController@addProduto']);
    Route::get('{carrinho}/{modelo}/{id}', ['as' => 'rmvProduto', 'uses' => 'CarrinhoController@rmvProduto']);
    Route::post('/update', ['as' => 'updateCarrinho', 'uses' => 'CarrinhoController@update']);


});

Route::get('/documentos',  function(){
    return view('documentos');
});