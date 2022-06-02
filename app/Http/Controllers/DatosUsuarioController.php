<?php

namespace App\Http\Controllers;

use App\Models\DatosUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class DatosUsuarioController
 * @package App\Http\Controllers
 */
class DatosUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosUsuarios = DatosUsuario::paginate();

        return view('datos-usuario.index', compact('datosUsuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $datosUsuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosUsuario = new DatosUsuario();
        $user = Auth::user();
        return view('datos-usuario.create', compact('datosUsuario','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DatosUsuario::$rules);
        $user = Auth::user();

        $input = $request->all();
        
        $input['user_id'] = $user->id;


        $datosUsuario = DatosUsuario::create($input);

        return redirect()->route('usuarios.datos',$datosUsuario->id)
            ->with('success', 'DatosUsuario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   


        $datosUsuario = DatosUsuario::find($id);
        

        return view('datos-usuario.show', compact('datosUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosUsuario = DatosUsuario::find($id);
        $user = Auth::user();
        return view('datos-usuario.edit', compact('datosUsuario','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DatosUsuario $datosUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(DatosUsuario::$rules);

        $datosUsuario = DatosUsuario::find($id);
        
        $user = Auth::user();

        $input = $request->all();
        
        $input['user_id'] = $user->id;

        $datosUsuario->update($input);
        

        return redirect()->route('usuarios.datos',$user->datosUsuario->id)
            ->with('success', 'DatosUsuario created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $datosUsuario = DatosUsuario::find($id)->delete();

        return redirect()->route('datos-usuarios.index')
            ->with('success', 'DatosUsuario deleted successfully');
    }
}
