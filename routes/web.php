<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ControllerCalendar;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\MenuController;
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

Route::get('calendar/{mes}',[App\Http\Controllers\ControllerCalendar::class, 'index_month'])->middleware('auth')->middleware('admin');

Route::get('calendar',[App\Http\Controllers\ControllerCalendar::class, 'index'])->name('calendario')->middleware('auth')->middleware('admin');

Route::resource('/articulos', ArticuloController::class)->middleware('admin');

Route::resource('/pos', PosController::class)->middleware('auth')->middleware('admin');

Route::get('/pos/pago/{idMesa}',  [App\Http\Controllers\PosController::class, 'pago'])->name('pos.pago')->middleware('auth')->middleware('admin');

Route::get('/pdf/{idVenta}',  [App\Http\Controllers\PosController::class, 'pdf'])->name('pos.pdf')->middleware('auth')->middleware('admin');

Route::get('/pos/venta/{idVenta}',  [App\Http\Controllers\PosController::class, 'ticket'])->name('pos.ticket')->middleware('auth')->middleware('admin');

Route::post('/pos/pago/{idMesa}',  [App\Http\Controllers\PosController::class, 'completarPago'])->name('pos.completarPago')->middleware('auth')->middleware('admin');

Route::get('/pos/cerrarCaja/{idCaja}',  [App\Http\Controllers\PosController::class, 'cerrarCaja'])->name('pos.cerrarCaja')->middleware('auth')->middleware('admin');

Route::post('/pos/cerrarCaja/{idCaja}',  [App\Http\Controllers\PosController::class, 'completarCierre'])->name('pos.completarCierre')->middleware('auth')->middleware('admin');

Route::resource('/categorias', CategoriaController::class)->middleware('auth')->middleware('admin');

Route::resource('/restaurantes', RestauranteController::class)->middleware('auth')->middleware('admin');

Route::resource('/mesas', MesaController::class)->middleware('auth')->middleware('admin');

Route::resource('/ventas', VentaController::class)->middleware('auth')->middleware('admin');

Route::resource('/pedidos', PedidoController::class)->middleware('auth')->middleware('admin');

Route::resource('/reservas', ReservaController::class)->middleware('auth')->middleware('admin');

Route::resource('/cajas', CajaController::class)->middleware('auth')->middleware('admin');

Route::resource('/menus', MenuController::class)->middleware('auth')->middleware('admin');

Route::resource('/cartas', CartaController::class)->middleware('auth')->middleware('admin');
