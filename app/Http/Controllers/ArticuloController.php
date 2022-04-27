<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Articulo;
use Illuminate\Http\Request;

/**
 * Class ArticuloController
 * @package App\Http\Controllers
 */
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::paginate();

        return view('articulo.index', compact('articulos'))
            ->with('i', (request()->input('page', 1) - 1) * $articulos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulo = new Articulo();
        
        $categorias = Categoria::all()->pluck('nombre', 'id');
        
        return view('articulo.create', compact('articulo','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Articulo::$rules);

        $input = $request->all();

        if ($imagen = $request->file('imagen')) {
            $direccion = str_replace("public/","",$imagen->store('public/Productos'));
            $input['imagen'] = "$direccion";
        } else {
            $input['imagen'] = "sinimagen.png";
        }

        $articulo = Articulo::create($input);

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);

        return view('articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::find($id);
        $categorias = Categoria::all()->pluck('nombre', 'id');

        return view('articulo.edit', compact('articulo','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        request()->validate(Articulo::$rules);

        $input = $request->all();
        

        if ($imagen = $request->file('imagen')) {
            // si cambiamos la imagen se borrar del storage la antigua
            if (file_exists("storage/".$articulo->imagen) && "storage/".$articulo->imagen!="storage/sinimagen.png") {
            unlink("storage/".$articulo->imagen);
            }
            $direccion = str_replace("public/","",$imagen->store('public/Productos'));
            $input['imagen'] = "$direccion";
        }else{
            unset($input['imagen']);
        }

        $articulo->update($input);

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        if (file_exists("storage/".$articulo->imagen)&& "storage/".$articulo->imagen!="storage/sinimagen.png") {
            unlink("storage/".$articulo->imagen);
        }

        $articulo->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo deleted successfully');
    }
}
