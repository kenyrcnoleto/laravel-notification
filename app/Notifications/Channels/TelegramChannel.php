<?php

namespace App\Notifications\Channels;

use Illuminate\Support\Facades\Log;

class TelegramChannel
{
    public function send($notifiable, $notification): void
    {


        $route = $notifiable->routeNotificationForTelegram();
        $message = $notification->toTelegram($notifiable);


        Log::info("Notification sending Telegram to {$route}", [
            'message' => $message,
        ]);
    }
}
