<?php

namespace App\Livewire\Notifications;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Sidebar extends Component
{
    use WithPagination;

    public bool $modal = false;

    #[On('notifications')]
    public function open(): void
    {
        $this->modal = true;
    }

    #[Computed]
    public function notifications(): Collection|DatabaseCollection|Paginator
    {

        if($this->modal) {
          // return auth()->user()->notifications;

          /** $var App\Models\User $user */
          $user = Auth::user();

           return $user->notifications()->simplePaginate(8);
        }
        return collect();
    }

    public function render()
    {
        return view('livewire.notifications.sidebar');
    }
}
