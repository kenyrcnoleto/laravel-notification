<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserDeletedNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via(object $notifiable): array
    {
        return $notifiable->notification_channels ?? ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
                    ->line('You no longer have access to the ' . config('app.name'))
                    ->line('Thank you for using our application! 🖖');
    }

    public function toSms(object $notifiable): string
    {
        return "Hello {$notifiable->name}, you no longer have access to the " . config('app.name') . "(sms).";
    }

    public function toWhatsApp(object $notifiable): string
    {
        return "Hello {$notifiable->name}, you no longer have access to the " . config('app.name') . "(whatsapp).";
    }

    public function toTelegram(object $notifiable): string
    {
        return "Hello {$notifiable->name}, you no longer have access to the " . config('app.name') . "(telegram).";
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
