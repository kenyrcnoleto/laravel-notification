<?php

namespace App\Livewire\Notifications;

use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Sidebar extends Component
{
    public bool $modal = false;

    #[On('notifications')]
    public function open(): void
    {
        $this->modal = true;
    }

    #[Computed]
    public function notifications(): DatabaseNotificationCollection
    {
        // return auth()->user()->notifications;
        return Auth::user()->notifications;
    }

    public function render()
    {
        return view('livewire.notifications.sidebar');
    }
}
