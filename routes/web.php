<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
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

Route::get('/', function () {
    return redirect('/categorias');
});

Route::get('login', 'App\Http\Controllers\AutenticarIngreso@autenticar');
Route::post('login', 'App\Http\Controllers\AutenticarIngreso@validar');
Route::post('salir', 'App\Http\Controllers\AutenticarIngreso@salir');

Route::get('register', 'App\Http\Controllers\RegistrarNuevoUsuario@registroNuevo');
Route::post('register', 'App\Http\Controllers\RegistrarNuevoUsuario@registrarBD');
// Route::get('register', function () {
//     return view('registro');
// });

Route::get('inicio', function () {
    return view('Roles.supervisor');
});

Route::resource('/categorias', CategoriasController::class);
Route::resource('/usuarios', UsuariosController::class);
Route::resource('/productos', ProductosController::class);
