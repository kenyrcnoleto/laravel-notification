<?php

namespace App\Notifications\Channels;

use Illuminate\Support\Facades\Log;

class WhatsAppChannel
{
    public function send($notifiable, $notification): void
    {
        $route = $notifiable->routeNotificationForWhatsApp();
        $message = $notification->toWhatsApp($notifiable);

        Log::info("Notification sending WhatsApp to {$route}", [
            'message' => $message,
        ]);
    }
}
