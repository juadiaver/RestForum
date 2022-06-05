<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Pedido;
use App\Models\Categoria;
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
            $categoria = Categoria::where("nombre",'like',"%$buscar%")->first();

            //busqueda de lod articulos
            $articulos = Articulo::where('categoria_id','like',"%$categoria->id%")->paginate(10);

        } else {
           $articulos = Articulo::buscarpor($tipo, $buscar)->paginate(10);  
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
            session()->flash('success', 'Cart updated successfully');
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
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function realizarPedido(Request $request)
    {   
        $cart = session()->get('cart');
        $user = Auth::user();
        $pedido = new Pedido();
        $pedido->user_id = $user->id;

        $total = 0;

        foreach ($cart as $articulo){
            $total += $articulo['price'] * $articulo['quantity'];
        }

        $pedido->precio = $total;
        $pedido->estado = "Pendiente";
        $pedido->fecha = Carbon::now()->toDateString();
        $pedido->modo_pago = "Pago en local";
        $pedido->ticket = $this->crearTicket();
        $pedido->save();
        session()->forget('cart');
            
        return redirect()->route('carrito');    
        
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
            $ticket = $ticket."<td>".$articulo['price']." €</td>";
            $ticket = $ticket."<td>".$articulo['quantity']."</td>";
            $ticket = $ticket."<td>".$articulo['price'] * $articulo['quantity']." €</td>";
            $ticket = $ticket."<tr><tbody>";

        }
        $ticket = $ticket."</table>";
        $ticket = $ticket."<h2>Precio total: ".$precioTotal." €</h2>";

        return $ticket;

    }
}
