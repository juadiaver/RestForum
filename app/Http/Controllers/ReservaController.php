<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ReservaController
 * @package App\Http\Controllers
 */
class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::paginate();

        return view('reserva.index', compact('reservas'))
            ->with('i', (request()->input('page', 1) - 1) * $reservas->perPage());
    }

    public function lista()
    {
        $user = Auth::user();
        $reservas = Reserva::where('user_id', '=', $user->id)->orderBy('fecha','desc')->paginate();

        return view('reservaCliente.index', compact('reservas'))
            ->with('i', (request()->input('page', 1) - 1) * $reservas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reserva = new Reserva();
        
        $user = User::all()->pluck('name', 'id');
        $estado = [
            'Confirmado'=>'Confirmado',
            'Pendiente'=>'Pendiente',
            'Modificada'=>'Modificada'
        ];
        return view('reserva.create', compact('reserva','user','estado'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reserva::$rules);

        
        $reserva = Reserva::create($request->all());

        if ($request->calendario != null) {

            return redirect()->route('calendario')
            ->with('success', 'Reserva actualizada correctamente');
            
        } else {

            return redirect()->route('reservas.index')
            ->with('success', 'Reserva actualizada correctamente');
            
        }
    }

    public function crear()
    {
        $reserva = new Reserva();
        
        return view('reservaCliente.create', compact('reserva'));
    }

    public function creado(Request $request)
    {
        request()->validate(Reserva::$rules);

        $input = $request->all();
        $user = auth::user();
        $input['user_id']=$user->id;
        $input['estado']="Pendiente";

        $reserva = Reserva::create($input);

 
        return redirect()->route('reservaCliente.lista')
            ->with('success', 'Reserva actualizada correctamente');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);

        return view('reserva.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::find($id);
        $user = User::all()->pluck('name', 'id');
        $estado = [
            'Confirmado'=>'Confirmado',
            'Pendiente'=>'Pendiente',
            'Modificada'=>'Modificada'
        ];
        return view('reserva.edit', compact('reserva','user','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reserva $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        request()->validate(Reserva::$rules);

        $reserva->update($request->all());

        if ($request->calendario != null) {

            return redirect()->route('calendario')
            ->with('success', 'Reserva updated successfully');
            
        } else {

            return redirect()->route('reservas.index')
            ->with('success', 'Reserva updated successfully');
            
        }

        
    }

    public function editar($id)
    {
        $reserva = Reserva::find($id);

        return view('reservaCliente.edit', compact('reserva'));
    }

    public function editado(Request $request, $id)
    {
        request()->validate(Reserva::$rules);

        $reserva = Reserva::find($id);
        $input = $request->all();
        $input['estado']="Modificada";
        $reserva->update($input);

            return redirect()->route('reservaCliente.lista')
            ->with('success', 'Reserva actualizada correctamente');
            
        

        
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva deleted successfully');
    }
}
