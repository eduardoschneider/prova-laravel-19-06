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

Route::resource('products', 'ProdutoController'); //guiador aqui, as rotas com as funções estão nos forms manualmente

Route::group(['middleware'=>['web','auth']], function(){
	Route::get('/', function () {
    	return view('welcome');
	});

	Route::get('/home', function(){
		if(Auth::user()->admin == 0){
			$products['products'] = \App\Produto::all();
			return view('home', $products);
		} else {
			$users['users'] = \App\User::all();
			return view('adminhome', $users);
		}
	});
});