<?php

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
    return view('Tablero.index');
});

Route::get('login', 'App\Http\Controllers\AutenticarIngreso@autenticar');
Route::post('login', 'App\Http\Controllers\AutenticarIngreso@validar');

Route::get('register', 'App\Http\Controllers\RegistrarNuevoUsuario@registroNuevo');
Route::post('register', 'App\Http\Controllers\RegistrarNuevoUsuario@registrarBD');
// Route::get('register', function () {
//     return view('registro');
// });

Route::get('categorias', function () { //ESTO SOLO ES DE PREUBA PARA VER SI FUNCIONA EL INICIO DE SESIÓN
    return view('Tablero.presentacion');
});