<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PromocioneController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DatosUsuarioController;
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

    $articulos = Articulo::all();
    
    return view('welcome','articulos');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth')->middleware('admin');

Route::get('calendar/{mes}',[App\Http\Controllers\ControllerCalendar::class, 'index_month'])->middleware('auth')->middleware('admin');

Route::get('calendar',[App\Http\Controllers\ControllerCalendar::class, 'index'])->name('calendario')->middleware('auth')->middleware('admin');

Route::resource('/articulos', ArticuloController::class)->middleware('admin');

Route::resource('/datos-usuarios', DatosUsuarioController::class)->middleware('auth');

Route::get('/datos/editar/{id}',  [App\Http\Controllers\DatosUsuarioController::class, 'edit'])->name('usuarios.editar')->middleware('auth');

Route::post('/datos/editar/{id}',  [App\Http\Controllers\DatosUsuarioController::class, 'update'])->name('usuarios.editar')->middleware('auth');

Route::get('/datos/crear',  [App\Http\Controllers\DatosUsuarioController::class, 'create'])->name('usuarios.crear')->middleware('auth');

Route::post('/datos/crear',  [App\Http\Controllers\DatosUsuarioController::class, 'store'])->name('usuarios.crear')->middleware('auth');

Route::get('/datos/{id}',  [App\Http\Controllers\DatosUsuarioController::class, 'show'])->name('usuarios.datos')->middleware('auth');

Route::post('/datos/{id}',  [App\Http\Controllers\DatosUsuarioController::class, 'show'])->name('usuarios.datos')->middleware('auth');

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

Route::resource('/promociones', PromocioneController::class)->middleware('auth')->middleware('admin');

Route::resource('/reservas', ReservaController::class)->middleware('auth')->middleware('admin');

Route::resource('/cajas', CajaController::class)->middleware('auth')->middleware('admin');

Route::resource('/menus', MenuController::class)->middleware('auth')->middleware('admin');

Route::resource('/cartas', CartaController::class)->middleware('auth')->middleware('admin');

Route::get('/reserva',  [App\Http\Controllers\ReservaController::class, 'lista'])->name('reservaCliente.lista')->middleware('auth');

Route::get('/reserva/crear',  [App\Http\Controllers\ReservaController::class, 'crear'])->name('reservaCliente.crear')->middleware('auth');

Route::post('/reserva/crear',  [App\Http\Controllers\ReservaController::class, 'creado'])->name('reservaCliente.crear')->middleware('auth');

Route::get('/reserva/editar/{id}',  [App\Http\Controllers\ReservaController::class, 'editar'])->name('reservaCliente.editar')->middleware('auth');

Route::post('/reserva/editar/{id}',  [App\Http\Controllers\ReservaController::class, 'editado'])->name('reservaCliente.editar')->middleware('auth');

//rutas para carro de compra
Route::get('/carrito', [ProductController::class, 'index'])->name('carrito')->middleware('auth');  
Route::get('cart', [ProductController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart')->middleware('auth');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart')->middleware('auth');
Route::post('/cart', [ProductController::class, 'realizarPedido'])->name('realizarPedido.cart')->middleware('auth');
