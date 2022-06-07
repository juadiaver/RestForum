<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(10);

        return view('categoria.index', compact('categorias'))
            ->with('i', (request()->input('page', 1) - 1) * $categorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Categoria::$rules);

        
        $input = $request->all();

        if ($imagen = $request->file('imagen')) {
            
            Storage::disk('s3')->put("img".$request['nombre'], file_get_contents($input['imagen']));
            $input['imagen'] = "img".$request['nombre'];
        } else {
            
            Storage::disk('s3')->put("img".$request['nombre'], Storage::disk('s3')->get("sinimagen.png"));
            $input['imagen'] = "img".$request['nombre'];
        }

        $categoria = Categoria::create($input);

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        request()->validate(Categoria::$rules);

        $input = $request->all();

        if ($imagen = $request->file('imagen')) {
            // si cambiamos la imagen se borrar del storage la antigua
            Storage::disk('s3')->delete($categoria->imagen);
            Storage::disk('s3')->put("img".$request['nombre'], file_get_contents($input['imagen']));
            $input['imagen'] = "img".$request['nombre'];
        }else{
            unset($input['imagen']);
        }


        $categoria->update($input);

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        Storage::disk('s3')->delete($categoria->imagen);

        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria borrada correctamente');
    }
}
