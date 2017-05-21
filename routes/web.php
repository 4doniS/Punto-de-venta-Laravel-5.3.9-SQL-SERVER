<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});


Route::get('/ventas/venta/datos','VentaController@Paginacion'); 

Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/producto','ProductoController');
Route::resource('ventas/cliente','ClienteController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');
Route::resource('ventas/venta','VentaController');
Route::resource('seguridad/usuario','UsuarioController');

Route::get('/logout', 'Auth\LoginController@logout');
//Route::Auth();
//Auth::routes();
Route::auth();

Route::get('/home', 'HomeController@index');
//Auth::routes();
Route::get('/home', 'HomeController@index');
