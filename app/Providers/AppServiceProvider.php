<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Model::unguard();
        Model::preventLazyLoading(
            !app()->isProduction()
        );
        $this->app->make(ChannelManager::class)
            ->extend('sms', fn () => new \App\Notifications\Channels\SmsChannel());
        $this->app->make(ChannelManager::class)
            ->extend('whatsapp', fn () => new \App\Notifications\Channels\WhatsAppChannel());
        $this->app->make(ChannelManager::class)
            ->extend('telegram', fn () => new \App\Notifications\Channels\TelegramChannel());
    }
}
