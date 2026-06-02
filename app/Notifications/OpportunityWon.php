<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Opportunity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OpportunityWon extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Opportunity $opportunity
    )
    {
        // $this->queue = 'notifications';

    }

    public function via(object $notifiable): array
    {
        // return ['mail', 'database'];
        // dd($notifiable->notification_channels);
        return  $notifiable->notification_channels ?? ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        //criando de forma customizada a mensagem de email, utilizando o MailMessage do Laravel, que é uma classe que facilita a criação de mensagens de email, e que possui diversos métodos para personalizar a mensagem, como greeting, line, action, etc.
        return (new MailMessage())
            ->markdown('emails.opportunity_won', ['userName' => $notifiable->name]);
        /*return (new MailMessage)
                    ->greeting('Hello ' . $notifiable->name . '!')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
        }*/
    }

    public function toArray(object $notifiable): array
    {
        return $this->opportunity->toArray();
    }
}
