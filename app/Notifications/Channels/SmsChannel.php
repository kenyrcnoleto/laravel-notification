<?php

namespace App\Notifications\Channels;

use Illuminate\Support\Facades\Log;

class SmsChannel
{
    public function send($notifiable, $notification): void
    {
        //verificar se o metodo toSms está definido na notificação, caso contrário lançar uma exceção
        if (!method_exists($notification, 'toSms')) {
            throw new \Exception('Notification is missing toSms method.');
        }

        //verificar se o método routeNotificationForSms está definido no notifiable, caso contrário lançar uma exceção
        if (!method_exists($notifiable, 'routeNotificationForSms')) {
            throw new \Exception('Notifiable is missing routeNotificationForSms method.');
        }


        // toda vez que criar um canal precisa ter um destino para ela, e aqui estamos dizendo que o destino é o telefone do usuário,
        //precisa ter um padrão de método para construir a mensagem, e aqui estamos dizendo que o método é o toSms, ou seja, toda notificação que for enviada por esse canal precisa ter um método toSms para construir a mensagem,
        // em seguida precisa chamar a api necessária para enviar a mensagem, e aqui estamos apenas logando a mensagem para fins de teste, mas em um cenário real você integraria com um serviço de SMS para enviar a mensagem.

        $route = $notifiable->routeNotificationForSms();
        $message = $notification->toSms($notifiable);

        // Here you would integrate with your SMS service provider to send the message.
        // For example:
        // SmsService::send($notifiable->phone_number, $message);

        // $message = $notification->toSms($notifiable);

        //Code to send the SMS using your preferred SMS service provider (API call, etc.)
        Log::info("Notification sending SMS to {$route}", [
            'message' => $message,
        ]);
    }
}
