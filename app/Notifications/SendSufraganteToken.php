<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSufraganteToken extends Notification
{
    use Queueable;
    protected $token;
    protected $nombre;
    protected $documento;
    /**
     * Create a new notification instance.
     */
    public function __construct(String $nombre, String $token, String $documento)
    {
        $this->token = $token;
        $this->nombre = $nombre;
        $this->documento = $documento;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/sufragante/verify-token/'.$this->documento.'/'.$this->token);
        return (new MailMessage)
                    ->subject('Acceso Votaciones Virtuales Unitrópico')
                    ->greeting('Hola, '.$this->nombre.'!')
                    ->line('Ya está todo listo para que puedas ingresar a ejercer tu derecho al voto: ')
                    ->action('Ingresar al aplicativo', $url)
                    ->line('Gracias por usar esta aplicación!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
