<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocione;

class VerPromocionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promociones = Promocione::paginate();

        return view('verpromociones.index', compact('promociones'));
            
    }

    public function promocion($id)
    {
        $promocion = Promocione::find($id);

        return view('verpromociones.ver', compact('promocion'));
    }
}
