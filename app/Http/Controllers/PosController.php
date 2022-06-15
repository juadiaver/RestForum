<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Mesa;
use App\Models\Venta;
use App\Models\Caja;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;

class PosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $mesas = Mesa::all();

        //buscamos la ultima caja que se creo para comprobar si esta abierta o cerrada desde la vista.
        $caja = Caja::all()->sortByDesc('created_at')->first();
        

        // Actualizamos las mesas si hay articulos en el interior
        foreach ($mesas as $mesa){
            if($mesa->articulos()->count() >= 1){
                $mesa->activo ='NO';
                $mesa->save();

            }else{
                $mesa->activo ='SI';
                $mesa->save(); 
            };
        }

        return view('pos.pos', compact('mesas','caja'));
    }


    public function posMesa($id)
    {

        $mesa = Mesa::find($id);

        return view('pos.menu', compact('mesa'));
    }

    public function edit(Request $request, $id)
    {
        $mesa = Mesa::find($id);

        $cat = $request->get('buscar');


        //si la reques añadir viene con datos ejecutamos la insercion de un articulo en la mesa.
        if ($request->get('anadir') != null) {

            $idArticulo = $request->get('anadir');
            //llamamos al metod que nos mete el articulo en la mesa.
            $this->anadirArticulo($id, $idArticulo);

            return redirect()->back()->with('success', 'Articulo añadido correctamente');
        } else {
            // en caso contrario se realiza una busqueda por categorias 
            $articulos = Articulo::where('categoria_id', 'like', "%$cat%")->paginate(20);
            $categorias = Categoria::all();

            return view('pos.edit', compact('mesa', 'articulos', 'categorias', 'cat'));
        }
    }

    public static function  anadirArticulo($idMesa, $idArticulo)
    {
        // buscamos la mesa 
        $mesa = Mesa::find($idMesa);
        //si la mesa no tiene articulos con ese id generamos la relacion con la tabla pivote
        if ($mesa->articulos()->find($idArticulo) == null) {
            $mesa->articulos()->attach($idArticulo);
        } else {
            // si si tuviese articulos se añade uno mas a la cantidad en la relacion.
            $cantidad = $mesa->articulos()->find($idArticulo)->pivot->cantidad;
            $mesa->articulos()->sync([$idArticulo => ['cantidad' => $cantidad + 1]], false);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, $id)
    {
        $mesa = Mesa::find($request->mesa);

        // segun venga de la request se elimina uno o todos los articulos 
        if ($request->borrarUno != null) {
            $idArticulo = $request->borrarUno;
            $cantidad = $mesa->articulos()->find($idArticulo)->pivot->cantidad;

            if ($cantidad == 1) {
                $mesa->articulos()->detach($id);
            } else {
                $mesa->articulos()->sync([$idArticulo => ['cantidad' => $cantidad - 1]], false);
            }

            return redirect()->back()
                ->with('success', 'Borrado un articulo');
        } else {
            $mesa->articulos()->detach($id);
            return redirect()->back()
                ->with('success', 'Articulo borrado correctamente de la mesa');
        }
    }

    public function pago($id)
    {

        $mesa = Mesa::find($id);
        //pasamos el array de metodos de pago a la vista
        $metodoPago = array(
            'Efectivo' => 'Efectivo',
            'Tarjeta' => 'Tarjeta',
    );

        return view('pos.pago', compact('mesa','metodoPago'));
        
        
    }

    public function completarPago(Request $request, $id)
    {
        
        $mesa = Mesa::find($id);
        
        // Se genera el modelo de venta para luego añadirle los articulos con la cantidades. 
        $venta = new Venta();
        $venta->mesa_id = $mesa->id;
        $venta->precio = $request->get('total');
        $venta->modo_pago = $request->get('metodoPago');
        $venta->ticket = $this->crearTicket($id);
        $venta->save();

        //Una vez generada la venta se recorre los articulos asociados con la mesa y se meten en la tabla pivote articulo_venta
        foreach ($mesa->articulos as $articulo){
            $venta->articulos()->attach($articulo->id);
            $cantidad = $mesa->articulos()->find($articulo->id)->pivot->cantidad;
            $venta->articulos()->sync([$articulo->id => ['cantidad' => $cantidad]], false);
            $venta->articulos()->sync([$articulo->id => ['created_at' => now()->format('Y-m-d')]], false);
        }

        $mesa->articulos()->detach();
        
        return redirect()->route('pos.ticket', ['idVenta' => $venta->id]);
        
        
    }

    // Metodo para crear ticket recibiendo el id de la mesa, se llama desde completar pago. 
    public function crearTicket ( $id){

        $mesa = Mesa::find($id);

        $ticket = "<h1>Casa Juan</h1>";
        $ticket = $ticket."<h2>Resumen de compra</h2>";
        $ticket = $ticket.'<table border="1"><thead><tr><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Precio total</th></tr></thead>';
        $precioTotal = 0;
        foreach ($mesa->articulos as $articulo){
            $precioTotal = $precioTotal+$articulo->precio*$articulo->pivot->cantidad;
            $ticket = $ticket."<tbody><tr>";
            $ticket = $ticket."<td>".$articulo->nombre."</td>";
            $ticket = $ticket."<td>".number_format($articulo->precio, 2, ',', '.')." €</td>";
            $ticket = $ticket."<td>".$articulo->pivot->cantidad."</td>";
            $ticket = $ticket."<td>".number_format($articulo->precio*$articulo->pivot->cantidad, 2, ',', '.')." €</td>";
            $ticket = $ticket."<tr><tbody>";

        }
        $ticket = $ticket."</table>";
        $ticket = $ticket."<h2>Precio total: ".number_format($precioTotal, 2, ',', '.')." €</h2>";

        return $ticket;

    }
    //metodo para generar pdf
    public function pdf($idVenta)
{
    $venta = Venta::find($idVenta);
    
    $pdf = app('dompdf.wrapper');
    $pdf->loadHTML($venta->ticket);

    return $pdf->stream('ticket de venta Nº: '.$venta->ticket );
}
// metodo para la creacion del ticke en html
public function ticket(Request $request,$idVenta)
{
    $venta = Venta::find($idVenta);
    
    return view('pos.ticket', compact('venta'));
}
// metodo para cerrar la caja 
public function cerrarCaja(Request $request,$idCaja)
{   
    // se busca la caja abierta 
    $caja = Caja::find($idCaja);

    //se introduce los valores 
    $fecha = new Carbon($caja->fechaApertura.' '.$caja->horaApertura);
    // se buscan las ventas cuya fecha sea mayor a la creacion de la caja
    $ventas = Venta::all()->where('created_at','>',$fecha);
    // se establecen valores a 0 
    $ventasEfectivo = 0;
    $totalEfectivo = 0;
    $ventasTarjeta = 0;
    $totalTarjeta = 0;
    $total = 0;

    // se recorren las ventas y se va calculando los datos
    foreach($ventas as $venta){
        if($venta->modo_pago == "Efectivo"){
            $ventasEfectivo = $ventasEfectivo + 1;
            $totalEfectivo = $totalEfectivo + $venta->precio;
        }else{
            $ventasTarjeta = $ventasTarjeta + 1;
            $totalTarjeta = $totalTarjeta + $venta->precio;
        }

        $total = $total + $venta->precio;
        
    }
 
    
    return view('pos.cerrarCaja', compact('caja','ventas','ventasEfectivo','totalEfectivo','ventasTarjeta','totalTarjeta','total'));
}
// metodo que se llama para completar el cierre de caja y la insercion en base de datos del modelo caja
public function completarCierre(Request $request,$idCaja)
{
    $caja = Caja::find($idCaja);

    $fecha = new Carbon($caja->fechaApertura.' '.$caja->horaApertura);

    $ventas = Venta::all()->where('created_at','>',$fecha);
    $ventasEfectivo = 0;
    $totalEfectivo = 0;
    $ventasTarjeta = 0;
    $totalTarjeta = 0;
    $total = 0;

    foreach($ventas as $venta){
        if($venta->modo_pago == "Efectivo"){
            $ventasEfectivo = $ventasEfectivo + 1;
            $totalEfectivo = $totalEfectivo + $venta->precio;
        }else{
            $ventasTarjeta = $ventasTarjeta + 1;
            $totalTarjeta = $totalTarjeta + $venta->precio;
        }

        $total = $total + $venta->precio;
        
    }
    
    $caja->dineroFinal = $total;
    $caja->tarjeta= $ventasTarjeta;
    $caja->dineroTarjeta=$totalTarjeta;
    $caja->efectivo=$ventasEfectivo;
    $caja->dineroEfectivo=$totalEfectivo;
    $caja->abierta= "Cerrada";
    $caja->fechaCierre= Carbon::now()->toDateString();
    $caja->horaCierre= Carbon::now()->toTimeString();

    $caja->save();

    return redirect()->route('pos.index')
            ->with('success', 'Caja cerrada ');
}

}
