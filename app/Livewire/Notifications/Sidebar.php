<?php

namespace App\Livewire\Notifications;

use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{
    public bool $modal = false;

    #[On('notifications')]
    public function open(): void
    {
        $this->modal = true;
    }

    public function render()
    {
        return view('livewire.notifications.sidebar');
    }
}
