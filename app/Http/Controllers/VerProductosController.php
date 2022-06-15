<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;

class VerProductosController extends Controller
{
    public function index(Request $request)
    {
        

        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');

        //metodo para buscar por categorias, solo se buscara por la categoria encontrada en la busqueda.
        if ($tipo == "categoria" && $buscar != ""){
            
            //busquedad de la categoria 
            $categoria = Categoria::where("nombre",'like',"%$buscar%")->first();

            if ($categoria != null) {
                //busqueda de lod articulos
                $articulos = Articulo::where('categoria_id','like',"%$categoria->id%")->paginate(10);
            } else {
                $articulos = Articulo::paginate(10);
            }

        } else {
           $articulos = Articulo::buscarpor($tipo, $buscar)->paginate(10);  
        }

        return view('verproducto.index', compact('articulos','buscar','tipo'))
            ->with('i', (request()->input('page', 1) - 1) * $articulos->perPage());
    }
}
