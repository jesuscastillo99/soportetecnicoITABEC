<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $activationLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $activationToken)
    {
        $this->user = $user;
        $this->activationLink = route('activate', $activationToken);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Activación de cuenta del ITABEC')
                    ->html('<p>Haga clic en el siguiente enlace para activar su cuenta:</p>'.
                           '<a href="'.$this->activationLink.'">Activar Cuenta</a>'.
                           '<p>¡Serás redirigido al formulario al dar click al enlace!</p>');
    }
}







