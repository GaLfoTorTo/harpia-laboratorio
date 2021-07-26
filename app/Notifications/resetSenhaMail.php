<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class resetSenhaMail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $token;
    public function __construct($token)
    {
        $this->token = $token;
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
                ->subject('Redefinição de senha')
                ->greeting('Olá')
                ->line('Recebemos uma solicitção de redefinição de senha do sistema harpia para sua conta. Se reconhece essa ação clique no botão abaixo para seguir à renovação da sua senha. Caso NÃO reconheça essa ação ou não deseje renovar sua senha, Por Favor ignore essa notificação.')
                ->action('Redefinir Senha', url('/reset-password', $this->token))
                ->line('Atenciosamente, equipe Harpia!');
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
