<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Job;

class MessageSent extends Notification // implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public $message)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Los mensajes estan en queue, usar comando php artisan queue:work, para cuando querramos mandar los correors
        return (new MailMessage)
        ->subject("Tienes un nuevo mensaje")
        ->greeting('Saludos')
        ->line($this->message->body)
        ->action('Ver notificacion', route('messages.show', $this->message->id))
        ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $notifiable->notification += 1;
        $notifiable->save();

        return [
            'url' => route('messages.show', $this->message->id),
            'message' => 'Tienes una nueva notificación.' //User::find($this->message->from_user_id)->name . 'ha aplicado a '
        ];
    }
}
