
<x-drawer wire:model="modal" title="Notification Central" class="w-1/3 p-4" right>
    {{-- The Master doesn't talk, he acts. --}}

    @foreach ($this->notifications as $notification)
        {{-- <div class="p-4 mb-2 bg-gray-100 rounded">
            <h3 class="font-bold">{{ $notification->data['title'] }}</h3>
            <p>{{ $notification->data['message'] }}</p>
            <small class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
        </div> --}}
        @dd($notification);
    @endforeach

</x-drawer>

