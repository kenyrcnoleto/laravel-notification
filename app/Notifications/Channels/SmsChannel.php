<?php

namespace App\Notifications\Channels;

use Illuminate\Support\Facades\Log;

class SmsChannel
{
    public function send($notifiable, $notification): void
    {
        $message = $notification->toSms($notifiable);

        // Here you would integrate with your SMS service provider to send the message.
        // For example:
        // SmsService::send($notifiable->phone_number, $message);

        $message = $notification->toSms($notifiable);

        //Code to send the SMS using your preferred SMS service provider (API call, etc.)
        Log::info("Sending SMS to {$notifiable->phone_number}", [
            'message' => $message,
        ]);
    }
}
