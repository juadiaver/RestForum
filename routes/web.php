<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PosController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('/articulos', ArticuloController::class)->middleware('auth');

Route::resource('/pos', PosController::class)->middleware('auth');

Route::resource('/categorias', CategoriaController::class)->middleware('auth');

Route::resource('/restaurantes', RestauranteController::class)->middleware('auth');

Route::resource('/mesas', MesaController::class)->middleware('auth');

Route::resource('/ventas', VentaController::class)->middleware('auth');

Route::resource('/pedidos', PedidoController::class)->middleware('auth');

Route::resource('/reservas', ReservaController::class)->middleware('auth');
