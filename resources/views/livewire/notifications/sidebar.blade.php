
<x-drawer wire:model="modal" title="Notification Central" class="w-1/3 p-4" right>
    {{-- The Master doesn't talk, he acts. --}}

    {{-- //all times that have a component inside a loop should have a unique key, so Livewire can track them properly. You can use the notification ID for this purpose. --}}
    @if ($this->notifications->isNotEmpty())
         <div class="flex justify-between items-center mb-4">
            <span class="text-sm text-gray-500">
                {{ $this->unread }} unread(s)
            </span>

            @if($this->unread > 0)
                <x-button
                    label="Mark all as read"
                    class="btn-ghost btn-xs"
                    wire:click="markAllAsRead"
                />
            @endif
        </div>

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

