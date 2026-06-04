<?php

namespace App\Livewire\Notifications;

use Livewire\Component;

class Icon extends Component
{
    public function render()
    {

        return view('livewire.notifications.icon', [
            'count' => auth()->user()->notifications()->count(),
        ]);
    }
}
