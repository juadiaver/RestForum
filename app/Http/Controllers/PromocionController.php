<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

/**
 * Class PromocionController
 * @package App\Http\Controllers
 */
class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocions = Promocion::paginate();

        return view('promocion.index', compact('promocions'))
            ->with('i', (request()->input('page', 1) - 1) * $promocions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promocion = new Promocion();
        return view('promocion.create', compact('promocion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Promocion::$rules);

        $promocion = Promocion::create($request->all());

        return redirect()->route('promocions.index')
            ->with('success', 'Promocion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promocion = Promocion::find($id);

        return view('promocion.show', compact('promocion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocion = Promocion::find($id);

        return view('promocion.edit', compact('promocion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Promocion $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocion $promocion)
    {
        request()->validate(Promocion::$rules);

        $promocion->update($request->all());

        return redirect()->route('promocions.index')
            ->with('success', 'Promocion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $promocion = Promocion::find($id)->delete();

        return redirect()->route('promocions.index')
            ->with('success', 'Promocion deleted successfully');
    }
}
