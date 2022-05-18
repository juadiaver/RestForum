<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Mesa;
use Illuminate\Http\Request;

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

        return view('pos.pos', compact('mesas'));
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



        if ($request->get('anadir') != null) {

            $idArticulo = $request->get('anadir');
            $this->anadirArticulo($id, $idArticulo);
            return redirect()->back()->with('success', 'Articulo añadido correctamente');;
        } else {
            $articulos = Articulo::where('categoria_id', 'like', "%$cat%")->paginate(7);
            $categorias = Categoria::all();

            return view('pos.edit', compact('mesa', 'articulos', 'categorias', 'cat'));
        }
    }

    public static function  anadirArticulo($idMesa, $idArticulo)
    {

        $mesa = Mesa::find($idMesa);

        if ($mesa->articulos()->find($idArticulo) == null) {
            $mesa->articulos()->attach($idArticulo);
        } else {
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

        return view('pos.pago', compact('mesa'));
        
        
    }

    public function completarPago($id)
    {
        
        $mesa = Mesa::find($id);
        $mesa->articulos()->detach();
        return redirect()->action([PosController::class, 'index'])
        ->with('success', 'Pago realizado con exito');;
        
        
    }
}
