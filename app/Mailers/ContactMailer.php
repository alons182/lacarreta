<?php namespace App\Mailers;


class ContactMailer extends Mailer{

    protected $listLocalEmail = ['alonso@avotz.com'];
    protected $listProductionEmail = ['info@grupolacarretacr.com'];
    protected $listAdministration = ['administrador@grupolacarretacr.com'];

    public function contact($data)
    {
        $view = 'emails.contact.contact';
        $subject = 'Información desde formulario de contacto de Guanacaste vende';
        $emailTo = $this->listProductionEmail;

        return $this->sendTo($emailTo, $subject, $view, $data);
    }

    
    public function paymentConfirmation($data)
    {
        $view = 'emails.contact.paymentConfirmation';
        $subject = 'Información desde el sitio La carreta - Confirmación de pago';
        $emailTo = $data['email'];

        return $this->sendTo($emailTo, $subject, $view, $data);
    }

    public function welcome($data)
    {
        $view = 'emails.contact.welcome';
        $subject = 'Información desde el sitio La Carreta - Bienvenido';
        $emailTo = $data['email'];
        return $this->sendTo($emailTo, $subject, $view, $data);
    }
   
} 