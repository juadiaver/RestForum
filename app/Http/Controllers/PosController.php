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

    public function edit(Request $request ,$id)
    {   
        $mesa = Mesa::find($id);

        $cat = $request->get('buscar');

        $articulos = Articulo::where('categoria_id','like',"%$cat%")->paginate(7);
        $categorias = Categoria::all();

        return view('pos.edit', compact('mesa','articulos','categorias','cat'));
        
    }
}