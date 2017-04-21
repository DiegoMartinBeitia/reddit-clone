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


//aca aplico un  middleware a la ruta 
//Route::get('/home', 'HomeController@index')->middleware('auth');

//y existe la posibilidad de poder definir una grupo de rutas para definir
//el middleware que lo aplicara de esa manera

Route::group(['middleware'=>'auth'], function(){

	Route::name('home')->get('/home', 'HomeController@index');
	Route::name('create_post_path')->get('/posts/create','PostsController@create');
	Route::name('store_post_path')->post('/posts','PostsController@store');
	Route::name('edit_post_path')->get('/posts/{post}/edit','PostsController@edit');
	Route::name('update_post_path')->put('/posts/{post}','PostsController@update');
	Route::name('delete_post_path')->delete('/posts/{post}','PostsController@delete');

});

Route::name('raiz')->get('/','PostsController@index');



Route::name('posts_path')->get('/posts','PostsController@index');
/*
	Route::name('posts_path') esta parte define el nombre de la ruta
  	->get('/posts','PostsController@index'); esta segunda parte lo que hace es la definicioin de la ruta
*/

Route::name('post_path')->get('/posts/{post}','PostsController@show');

