<?php

namespace App\Http\Controllers;

use App\Models\Promocione;
use Illuminate\Http\Request;

/**
 * Class PromocioneController
 * @package App\Http\Controllers
 */
class PromocioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promociones = Promocione::paginate();

        return view('promocione.index', compact('promociones'))
            ->with('i', (request()->input('page', 1) - 1) * $promociones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promocione = new Promocione();
        return view('promocione.create', compact('promocione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Promocione::$rules);

        $promocione = Promocione::create($request->all());

        return redirect()->route('promociones.index')
            ->with('success', 'Promocione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promocione = Promocione::find($id);

        return view('promocione.show', compact('promocione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocione = Promocione::find($id);

        return view('promocione.edit', compact('promocione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Promocione $promocione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocione $promocione)
    {
        request()->validate(Promocione::$rules);

        $promocione->update($request->all());

        return redirect()->route('promociones.index')
            ->with('success', 'Promocione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $promocione = Promocione::find($id)->delete();

        return redirect()->route('promociones.index')
            ->with('success', 'Promocione deleted successfully');
    }
}
