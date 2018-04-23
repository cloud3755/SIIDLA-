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

Route::group( ['middleware' => 'auth'],
    function()
    {
        Route::get('/entradas', 'HomeController@entradas')->name('entradas');
        Route::post('/entradas', 'EntradasController@nuevaEntrada')->name('home');
        Route::get('/salidas', 'HomeController@salidas')->name('salidas');
        Route::post('/salidas', 'SalidasController@nuevaSalida')->name('home');

    }
);
//Route::get('/home', 'HomeController@index')->name('home');
/*
Route::get('/login', 'HomeController@login')->name('login');


Route::post('/login', [
	'uses' => 'Auth\LoginController@login'
]);


*/

