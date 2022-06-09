<?php

namespace App\Http\Controllers;

use App\Models\Carrusel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;



/**
 * Class CarruselController
 * @package App\Http\Controllers
 */
class CarruselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrusels = Carrusel::paginate();

        return view('carrusel.index', compact('carrusels'))
            ->with('i', (request()->input('page', 1) - 1) * $carrusels->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrusel = new Carrusel();
        return view('carrusel.create', compact('carrusel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Carrusel::$rules);

        $input = $request->all();
        
        

            Storage::disk('s3')->put("carrusel".$request['nombre'], file_get_contents($input['imagen']));
            $input['imagen'] = "carrusel".$request['nombre'];
        

        $carrusel = Carrusel::create($input);

        return redirect()->route('carrusel.index')
            ->with('success', 'Carrusel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrusel = Carrusel::find($id);

        return view('carrusel.show', compact('carrusel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrusel = Carrusel::find($id);

        return view('carrusel.edit', compact('carrusel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carrusel $carrusel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrusel $carrusel)
    {
        request()->validate(Carrusel::$rules);

        $input = $request->all();

        if ($imagen = $request->file('imagen')) {
            // si cambiamos la imagen se borrar del storage la antigua
            Storage::disk('s3')->delete($carrusel->imagen);
            Storage::disk('s3')->put("carrusel".$request['nombre'], file_get_contents($input['imagen']));
            $input['imagen'] = "carrusel".$request['nombre'];
        }else{
            unset($input['imagen']);
        }

        $carrusel->update($input);

        return redirect()->route('carrusel.index')
            ->with('success', 'Imagen de carrusel actualizada');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carrusel = Carrusel::find($id);

        Storage::disk('s3')->delete($carrusel->imagen);

        $carrusel->delete();


        return redirect()->route('carrusel.index')
            ->with('success', 'Imagen de carrusel eliminada');
    }
}
