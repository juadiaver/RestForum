<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;

class MesasDisponiblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesa::all();
        $mesasDisponibles = 0;
        $mesasOcupadas = 0;
        $mesasTotales= 0;
        
        foreach ($mesas as $mesa){
            if ($mesa->activo == "NO") {
                $mesasOcupadas = $mesasOcupadas + 1;
            } else {
                $mesasDisponibles = $mesasDisponibles + 1;
            }
            $mesasTotales= $mesasTotales + 1;   
        }

        return view('mesasdisponibles.index', compact('mesasDisponibles','mesasOcupadas','mesasTotales'));
            
    }
}
