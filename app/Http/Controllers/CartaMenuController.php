<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\Menu;

class CartaMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartas = Carta::paginate();
        $menus = Menu::paginate();

        return view('cartamenu.index', compact('cartas','menus'));
            
    }

    public function carta($id)
    {
        $carta = Carta::find($id);

        return view('cartamenu.show', compact('carta'));
    }

    public function menu($id)
    {
        $carta = Menu::find($id);

        return view('cartamenu.show', compact('carta'));
    }
}
