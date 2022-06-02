<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;

/**
 * Class CartaController
 * @package App\Http\Controllers
 */
class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartas = Carta::paginate();

        return view('carta.index', compact('cartas'))
            ->with('i', (request()->input('page', 1) - 1) * $cartas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carta = new Carta();
        $estado = [
            'Si'=>'Activa',
            'No'=>'No activa'
        ];
        return view('carta.create', compact('carta','estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Carta::$rules);

        $carta = Carta::create($request->all());

        return redirect()->route('cartas.index')
            ->with('success', 'Carta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carta = Carta::find($id);

        return view('carta.show', compact('carta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carta = Carta::find($id);

        $estado = [
            'Si'=>'Activa',
            'No'=>'No activa'
        ];

        return view('carta.edit', compact('carta','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carta $carta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carta $carta)
    {
        request()->validate(Carta::$rules);

        $carta->update($request->all());

        return redirect()->route('cartas.index')
            ->with('success', 'Carta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carta = Carta::find($id)->delete();

        return redirect()->route('cartas.index')
            ->with('success', 'Carta deleted successfully');
    }
}
