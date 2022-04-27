<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

/**
 * Class RestauranteController
 * @package App\Http\Controllers
 */
class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantes = Restaurante::paginate();

        $restaurante = Restaurante::find(1);

        return view('restaurante.index', compact('restaurantes','restaurante'))
            ->with('i', (request()->input('page', 1) - 1) * $restaurantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurante = new Restaurante();
        return view('restaurante.create', compact('restaurante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Restaurante::$rules);

        $restaurante = Restaurante::create($request->all());

        return redirect()->route('restaurantes.index')
            ->with('success', 'Restaurante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurante = Restaurante::find($id);

        return view('restaurante.show', compact('restaurante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurante = Restaurante::find($id);

        return view('restaurante.edit', compact('restaurante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Restaurante $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        request()->validate(Restaurante::$rules);

        $input = $request->all();

        if ($imagen = $request->file('imagen')) {
            // si cambiamos la imagen se borrar del storage la antigua
            if (file_exists("storage/".$restaurante->imagen)) {
                unlink("storage/".$restaurante->imagen);
                if ($imagen = $request->file('imagen')) {
                    $direccion = str_replace("public/","",$imagen->store('public/Restaurante'));
                    $input['imagen'] = "$direccion";
                }
            }
            $direccion = str_replace("public/","",$imagen->store('public/Restaurante'));
            $input['imagen'] = "$direccion";
        }else{
            unset($input['imagen']);
        }

        $restaurante->update($input);
        

        return redirect()->route('restaurantes.index')
            ->with('success', 'Restaurante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $restaurante = Restaurante::find($id)->delete();

        return redirect()->route('restaurantes.index')
            ->with('success', 'Restaurante deleted successfully');
    }
}
