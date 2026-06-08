@props(['notification'])

<div
    @class([
    'p-3 rounded-lg cursor-pointer transition-colors',
    'bg-base-200/80' => is_null($notification->read_at),
    'bg-base-100 opacity-60' => !is_null($notification->read_at),
    ])
    wire:click="markAsRead('{{ $notification->id }}')"
>
    <div class="flex items-start gap-3">
        @if(is_null($notification->read_at))
        <span class="mt-1.5 h-2 w-2 rounded-full bg-primary shrink-0"></span>
        @else
        <span class="mt-1.5 h-2 w-2 rounded-full bg-transparent shrink-0"></span>
        @endif

        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium truncate">
                {{ $notification->data['title'] ?? class_basename($notification->type) }}
            </p>

            @if(!empty($notification->data['amount']))
            <p class="text-xs text-gray-500 mt-0.5">
                R$ {{ number_format($notification->data['amount'] / 100, 2, ',', '.') }}
            </p>
            @endif

            <p class="text-xs text-gray-400 mt-1">
                {{ $notification->created_at->diffForHumans() }}
            </p>
        </div>
    </div>
</div>
