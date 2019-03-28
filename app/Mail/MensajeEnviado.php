<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MensajeEnviado extends Mailable
{
    use Queueable, SerializesModels;
  public $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msn)
    {
        //
        $this->mensaje=$msn;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.envio_credenciales_usuario');
    }
}
