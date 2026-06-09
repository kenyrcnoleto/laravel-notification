<?php

namespace App\Livewire\Notifications;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Icon extends Component
{
    #[On('notifications::update-count')]
    public function updateCount(): void
    {
        // $this->emitSelf('notifications::update-count');
    }
    public function render()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        return view('livewire.notifications.icon', [
            'count' => $user->notifications()->whereNull('read_at')->count(),
        ]);
    }
}
