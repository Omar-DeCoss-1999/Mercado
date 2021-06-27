<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AutenticarIngreso;
use App\Http\Controllers\RegistrarNuevoUsuario;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', 'CategoriasController@index');
//Route::resource('categorias', CategoriasController::class);

Route::get('productos/{id_categorias}/buscarpor', 'ProductosController@buscarpor');
Route::get('productos/{id_categorias}/index', 'ProductosController@index');
Route::get('crearProducto', 'ProductosController@create');
Route::get('crearCategoria', 'CategoriasController@create');
Route::post('producto', 'ProductosController@store');
Route::post('categorias', 'CategoriasController@store');
Route::put('categorias/{id}', 'CategoriasController@update');
Route::put('actualizarProducto/{id}', 'ProductosController@update');
Route::get('productos/{id}/show' ,'ProductosController@show');
Route::get('editarProducto/{id}' ,'ProductosController@edit');
Route::post('deleteProducto/{id}' ,'ProductosController@destroy');

Route::get('login', 'ValidarController@autenticar');
Route::post('login', 'ValidarController@validar');
Route::get('salir', 'ValidarController@salir');
Route::get('olpassword', 'ValidarController@verificarCorreo');
Route::post('olpassword', 'ValidarController@verificarCorreoR');
Route::put('olpassword/{email}', 'ValidarController@cambiarContra');

/* Route::get('login', 'AutenticarIngreso@autenticar');
Route::post('login', 'AutenticarIngreso@validar');
Route::get('salir', 'AutenticarIngreso@salir');

Route::get('olpassword', 'AutenticarIngreso@verificarCorreo');
Route::post('olpassword', 'AutenticarIngreso@verificarCorreoR');
Route::put('olpassword/{email}', 'AutenticarIngreso@cambiarContra'); */
// Route::get('salir', function () {
//     Auth::logout();
//     return Redirect::to('/');
// });
Route::post('pregunta/{id}', 'PreguntasController@createPregunta');
Route::put('pregunta/{id}', 'PreguntasController@createRespuesta');
Route::post('/eliminarPregunta/{id}', 'PreguntasController@destroy');

Route::put('productos/{id}/concesionar', 'ProductosController@concesionar');
Route::put('productos/{id}/motivo', 'ProductosController@motivo');

Route::post('comprar/{id}', 'ComprasController@store');
Route::post('eliminarCarrito/{id}', 'ComprasController@destroy');

Route::get('productosComprados', 'ProductosController@comprasProducto');

Route::get('autorizar/{id}', 'ProductosController@autorizarCompra');

Route::get('register', 'RegistrarNuevoUsuario@registroNuevo');
Route::post('register', 'RegistrarNuevoUsuario@registrarBD');
Route::get('searchEmail/{email}', 'RegistrarNuevoUsuario@search');

Route::get('usuarios', 'UsuariosController@index');
Route::get('usuarios/create',' UsuariosController@create');
Route::get('usuarios/{id}/show' ,'UsuariosController@show');
Route::put('usuarios/{id}/update', 'UsuariosController@update');
Route::post('usuarios/delete/{id}', 'UsuariosController@destroy');
Route::get('usuarios/{id}/edit', 'UsuariosController@edit');
Route::get('restablecer/{id}', 'UsuariosController@restablecerPassword');
Route::put('usuarios/restablecer/{id}', 'UsuariosController@actualizarPassword');
Route::get('editar/{id}', 'CategoriasController@edit');

Route::put('comprobante/{id}', 'ComprasController@update');

Route::post('autorizacion_rechazo/{id}', 'ComprasController@proceso_autorizacion_rechazo');
Route::get('autorizacion_aceptado/{id}', 'ComprasController@proceso_autorizacion_aceptado');

Route::get('contactanos', function(){
    $correo = new ContactanosMailable;
    Mail::to('ruizomar003@gmail.com')->send($correo);
    return redirect('/');
});
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
