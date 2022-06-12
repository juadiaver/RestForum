<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnvioMailController extends Controller
{
    public function index()
    {

        return view('mail.index');

    }

    public function enviar(Request $request)
    {
       

    $destinatario = "jj__18@hotmail.com";
    $nombre = $request['nombre'];
    $asunto= $request['asunto'];
    $contenido =$request['contenido'];
    $mail =$request['mail'];
    // Armar correo y pasarle datos para el constructor
    $correo = new \App\Mail\correo($nombre,$asunto, $contenido,$mail);
    # ¡Enviarlo!
    Mail::to($destinatario)->send($correo);

    return redirect()->route('welcome')
    ->with('success', 'Correo enviado');
            
    }
}
