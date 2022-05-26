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
use App\Models\Articulo;



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
    $articulos = Articulo::latest()
     ->take(10)
     ->get();
    return view('welcome', compact('articulos'));
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth')->middleware('admin');

Route::resource('/articulos', ArticuloController::class)->middleware('auth')->middleware('admin');

Route::resource('/pos', PosController::class)->middleware('auth')->middleware('admin');

Route::get('/pos/pago/{idMesa}',  [App\Http\Controllers\PosController::class, 'pago'])->name('pos.pago')->middleware('auth')->middleware('admin');

Route::post('/pos/pago/{idMesa}',  [App\Http\Controllers\PosController::class, 'completarPago'])->name('pos.completarPago')->middleware('auth')->middleware('admin');

Route::resource('/categorias', CategoriaController::class)->middleware('auth')->middleware('admin');

Route::resource('/restaurantes', RestauranteController::class)->middleware('auth')->middleware('admin');

Route::resource('/mesas', MesaController::class)->middleware('auth')->middleware('admin');

Route::resource('/ventas', VentaController::class)->middleware('auth')->middleware('admin');

Route::resource('/pedidos', PedidoController::class)->middleware('auth')->middleware('admin');

Route::resource('/reservas', ReservaController::class)->middleware('auth')->middleware('admin');
