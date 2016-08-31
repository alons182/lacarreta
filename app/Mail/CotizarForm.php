<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CotizarForm extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
       $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attach = request()->file('file');
        
        if($attach)
        {
            $ext = $attach->guessClientExtension();

            return $this->subject('Nueva Cotización del formulario de La Carreta')->view('emails.cotizar')->attach($attach, [
                            "as" => "cotizacion.{$ext}"
                            
                        ]);
        }

         return $this->subject('Nueva Cotización del formulario de La Carreta')->view('emails.cotizar');
    }
}
