<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class correo extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $asunto;
    public $contenido;
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$asunto,$contenido,$mail)
    {
        $this->nombre = $nombre;
        $this->asunto = $asunto;
        $this->contenido = $contenido;
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view("mail")
            ->from("darksoulink@gmail.com")
            ->subject("Contacto casa juan");
    }
}
