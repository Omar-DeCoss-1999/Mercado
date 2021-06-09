<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AutenticarIngreso;
use App\Http\Controllers\RegistrarNuevoUsuario;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\CategoriasController@index');
Route::resource('categorias', CategoriasController::class);

Route::get('productos/{id_categorias}/buscarpor', 'App\Http\Controllers\ProductosController@buscarpor');
Route::get('productos/{id_categorias}/index', 'App\Http\Controllers\ProductosController@index');
Route::get('crearProducto', 'App\Http\Controllers\ProductosController@create');
Route::get('crearCategoria', 'App\Http\Controllers\CategoriasController@create');
Route::post('producto', 'App\Http\Controllers\ProductosController@store');
Route::post('categorias', 'App\Http\Controllers\CategoriasController@store');
Route::put('categorias/{id}', 'App\Http\Controllers\CategoriasController@update');
Route::put('actualizarProducto/{id}', 'App\Http\Controllers\ProductosController@update');
Route::get('productos/{id}/show' ,'App\Http\Controllers\ProductosController@show');
Route::get('editarProducto/{id}' ,'App\Http\Controllers\ProductosController@edit');
Route::post('deleteProducto/{id}' ,'App\Http\Controllers\ProductosController@destroy');
Route::get('login', 'App\Http\Controllers\AutenticarIngreso@autenticar');
Route::post('login', 'App\Http\Controllers\AutenticarIngreso@validar');
Route::get('salir', 'App\Http\Controllers\AutenticarIngreso@logout');
// Route::get('salir', function () {
//     Auth::logout();
//     return Redirect::to('/');
// });
Route::post('pregunta/{id}', 'App\Http\Controllers\PreguntasController@createPregunta');
Route::put('pregunta/{id}', 'App\Http\Controllers\PreguntasController@createRespuesta');

Route::put('productos/{id}/concesionar', 'App\Http\Controllers\ProductosController@concesionar');
Route::put('productos/{id}/motivo', 'App\Http\Controllers\ProductosController@motivo');

Route::post('comprar/{id}', 'App\Http\Controllers\ComprasController@store');

Route::get('productosComprados', 'App\Http\Controllers\ProductosController@comprasProducto');

Route::get('register', 'App\Http\Controllers\RegistrarNuevoUsuario@registroNuevo');
Route::post('register', 'App\Http\Controllers\RegistrarNuevoUsuario@registrarBD');

Route::get('olpassword', 'App\Http\Controllers\AutenticarIngreso@verificarCorreo');
Route::post('olpassword', 'App\Http\Controllers\AutenticarIngreso@verificarCorreoR');
Route::put('olpassword/{email}', 'App\Http\Controllers\AutenticarIngreso@cambiarContra');

Route::resource('usuarios', UsuariosController::class);
Route::get('usuarios/{id}');
Route::post('usuarios/{id}', 'App\Http\Controllers\UsuariosController@update');
Route::get('restablecer/{id}', 'App\Http\Controllers\UsuariosController@restablecerPassword');
Route::put('usuarios/restablecer/{id}', 'App\Http\Controllers\UsuariosController@actualizarPassword');
Route::get('editar/{id}', 'App\Http\Controllers\CategoriasController@edit');
// Route::get('register', function () {
//     return view('registro');
// });
/* Route::get('/', function () {
    return redirect('/categorias');
});
Route::get('inicio', function () {
    return view('Roles.supervisor');
});

Route::resource('categorias', CategoriasController::class);
Route::resource('/usuarios', UsuariosController::class);
Route::resource('/productos', ProductosController::class); */
