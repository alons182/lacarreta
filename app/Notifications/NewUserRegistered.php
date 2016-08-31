<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nuevo usuario registrado')
                    ->line($this->user->name. ', Bienvenido a La Carreta !!.')
                    ->line('Ya estás suscrito a nuestro sistema, podés empezar a comprar cuando querrás.')
                    ->line('Nuestro sistema cuenta con los más altos estándares de seguridad para que podás hacer transacciones con tu tarjeta de débito o crédito sin ningún problema gracias a la seguridad Verify by Visa y Mastercard SecureCode.')
                    ->action('Ir al Sitio', 'https://grupolacarretacr.com')
                    ->line('Gracias por usar nuestro sitio!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
