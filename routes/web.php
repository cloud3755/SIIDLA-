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

Route::get('/entradas', 'HomeController@entradas')->name('home');
Route::get('/salidas', 'HomeController@salidas')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
/*
Route::get('/login', 'HomeController@login')->name('login');


Route::post('/login', [
	'uses' => 'Auth\LoginController@login'
]);

Route::group( ['middleware' => 'auth'],
    function()
    {
        Route::get('/entradas', 'HomeController@index')->name('home');
        Route::get('/salidas', 'HomeController@index')->name('home');

    }
);
*/
Auth::routes();




