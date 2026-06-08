
<x-drawer wire:model="modal" title="Notification Central" class="w-1/3 p-4" right>
    {{-- The Master doesn't talk, he acts. --}}

    {{-- //all times that have a component inside a loop should have a unique key, so Livewire can track them properly. You can use the notification ID for this purpose. --}}
    @if ($this->notifications->isNotEmpty())

    @foreach ($this->notifications as $notification)
        <x-notification.item :notification="$notification"
            wire:key="{{ $notification->id }}"
        />

    @endforeach

    <div class="flex justify-center mt-4">
        {{ $this->notifications->links() }}
    </div>
    @endif


</x-drawer>

