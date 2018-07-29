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
//Auth::routes();

// Authentication Routes...
Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => '',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::group( ['middleware' => ['auth', 'rol:any']],
    function()
    {
        Route::get('/entradas', 'EntradasController@entradas')->name('entradas');
        Route::post('/entradas', 'EntradasController@nuevaEntrada')->name('entradasPost');
        Route::get('/salidas', 'SalidasController@salidas')->name('salidas');
        Route::post('/salidas', 'SalidasController@nuevaSalida')->name('salidasPost');

        Route::post('/subirarchivo', 'EntradasController@subirarchivo');

        Route::get('/ubicaciones', 'ubicacionesController@ubicaciones')->name("ubicaciones");
        Route::get('/getubicaciones', 'ubicacionesController@getJsonUbicaciones')->name("getubicaciones");
        Route::post('/ubicaciones', 'ubicacionesController@nuevaUbicacion');

    }
);

Route::group( ['middleware' => ['auth', 'rol:1-2']],
    function()
    {
        // Registration Routes...
Route::get('register', 'HomeController@showRegistrationForm')->name('register');
Route::post('register', 'HomeController@register1');

Route::get('/entradas/show', 'EntradasController@showEntradas')->name("showEntradas");
Route::get('/salidas/show', 'SalidasController@showSalidas')->name("showSalidas");
Route::get('/salidas/show/{id}', 'SalidasController@showSalidasDetalle')->name("showSalidasDetalle");
Route::get('/entradas/show/{id}', 'EntradasController@showEntradasDetalle')->name("showEntradasDetalle");

Route::get('/numerosParte', 'numeroParteController@numerosParte')->name('numerosParte');
Route::post('/numerosParte', 'numeroParteController@nuevo')->name('numerosPartePost');
Route::get('/numerosParte/CambioArea', 'numeroParteController@cambioArea')->name('cambioArea');
Route::post('/numerosParte/CambioArea', 'numeroParteController@nuevoCambioArea')->name('numerosPartePost');
Route::get('/numerosParte/CambioArea/historial/resumen', 'numeroParteController@showNumerosParteHistorialResumen');
Route::get('/numerosParte/CambioArea/historial/{numeroParte}', 'numeroParteController@showNumeroParteHistorial')->name('showNumeroParteHistorial');



Route::get('/unidadMedida', 'numeroParteController@unidadMedida')->name('unidadMedida');
Route::post('/unidadMedida', 'numeroParteController@nuevaUnidadMedida')->name('unidadMedidaPost');

Route::post('/subirarchivo', 'EntradasController@subirarchivo');
// pdo




        Route::post('/historial/pdo','pdoController@historial');

        Route::get('pdo/download/{id}', 'pdoController@getDownload')->name("descargaPdo");

        Route::post('create-zip/', 'pdoController@zip')->name('create-zip');
        Route::get('/historial/pdo','pdoController@historial');
    }


);



Route::get('/cargar/pdo','pdoController@pdo')->name("cargarPdo");

Route::post('/pdo','pdoController@subir');


//Route::get('/home', 'HomeController@index')->name('home');
/*
Route::get('/login', 'HomeController@login')->name('login');


Route::post('/login', [
	'uses' => 'Auth\LoginController@login'
]);


*/
