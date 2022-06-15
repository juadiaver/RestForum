<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Pedido;
use App\Models\Categoria;
use App\Models\Promocione;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        

        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');

        //metodo para buscar por categorias, solo se buscara por la categoria encontrada en la busqueda.
        if ($tipo == "categoria" && $buscar != ""){
            
            //busquedad de la categoria 
            $categoria = Categoria::where("nombre",'like',"%$buscar%")->where('Activo','SI')->first();

            if ($categoria != null) {
                //busqueda de lod articulos
                $articulos = Articulo::where('categoria_id','like',"%$categoria->id%")->where('Activo','SI')->paginate(10);
            } else {
                $articulos = Articulo::where('Activo','SI')->paginate(10);
            }

        } else {
           $articulos = Articulo::buscarpor($tipo, $buscar)->where('Activo','SI')->paginate(10);  
        }

        return view('products', compact('articulos','buscar','tipo'))
            ->with('i', (request()->input('page', 1) - 1) * $articulos->perPage());
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }

    public function promociones()
    {
        return view('cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Articulo::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->nombre,
                "quantity" => 1,
                "price" => $product->precio,
                "image" => $product->imagen
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Carrito actualizado correctamente');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Producto eliminado correctamente');
        }
    }

    public function realizarPedido(Request $request)
    {   

        if ($request['realizarPedido']=='ok') {
            $cart = session()->get('cart');
            $user = Auth::user();
            $pedido = new Pedido();
            $pedido->user_id = $user->id;

            $total = 0;
        if (session()->has('nombrePromocion')) {
            foreach ($cart as $articulo){
                $total += $articulo['price'] * $articulo['quantity'];
            }
            $total = $total - $total*(int)session('porcentaje')/100;
            $total = round($total,2);
        } else {
            foreach ($cart as $articulo){
            $total += $articulo['price'] * $articulo['quantity'];
            $total = round($total,2);
            }
        }
        
            
        

        $pedido->precio = $total;
        $pedido->estado = "Pendiente";
        $pedido->fecha = Carbon::now()->toDateString();
        $pedido->modo_pago = "Pago en local";
        $pedido->ticket = $this->crearTicket();
        $pedido->save();
        session()->forget('cart');
        session()->forget('nombrePromocion');
        session()->forget('porcentaje');
        session()->forget('promocionNoEncontrada');
            
        return redirect()->route('carrito'); 
        } else {
            if ($request['realizarPedido']=='quitarPromocion') {
                
                session()->forget('nombrePromocion');
                session()->forget('porcentaje');

                return view('cart');

            } else {

                $codigoPromocion = $request['codigoPromocion'];

                $promocion = Promocione::where('codigo', $codigoPromocion)->first();
                
                if ($promocion != null) {
                    session()->forget('promocionNoEncontrada');
                    session(['nombrePromocion' => $promocion->nombre,'porcentaje' => $promocion->descuento ]);
                    return view('cart');
                } else {
                    session(['promocionNoEncontrada' => $request['codigoPromocion']]);
                    return view('cart');
                }
                
            }
  
        }        
        
    }
    

    public function crearTicket (){

        $cart = session()->get('cart');

        $ticket = "<h1>Casa Juan</h1>";
        $ticket = $ticket."<h2>Resumen de compra</h2>";
        $ticket = $ticket.'<table border="1"><thead><tr><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Precio total</th></tr></thead>';
        $precioTotal = 0;
        foreach ($cart as $articulo){
            $precioTotal += $articulo['price'] * $articulo['quantity'];
            $ticket = $ticket."<tbody><tr>";
            $ticket = $ticket."<td>".$articulo['name']."</td>";
            $ticket = $ticket."<td>".number_format($articulo['price'], 2, ',', '.')." €</td>";
            $ticket = $ticket."<td>".$articulo['quantity']."</td>";
            $ticket = $ticket."<td>".number_format($articulo['price'] * $articulo['quantity'], 2, ',', '.')." €</td>";
            $ticket = $ticket."<tr><tbody>";

        }
        $ticket = $ticket."</table>";
        if (session()->has('nombrePromocion')) {
            $precioPromocion =  number_format($precioTotal - $precioTotal*(int)session('porcentaje')/100, 2, ',', '.');
            $ticket = $ticket."<h2>Total: ".number_format($precioTotal, 2, ',', '.')." €</h2>";
            $ticket = $ticket."<h2>Promocion: ".session('nombrePromocion')."</h2>";
            $ticket = $ticket."<h2>Subtotal: ".$precioPromocion." €</h2>";
        } else {
            $ticket = $ticket."<h2>Precio Total: ".number_format($precioTotal, 2, ',', '.')." €</h2>";

        }

        return $ticket;

    }
}
