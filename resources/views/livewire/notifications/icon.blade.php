<div>
    <div class="tooltip tooltip-left" data-tip="notifications central">
        <x-button
            icon="o-bell"
            class="btn-circle btn-ghost btn-xs indicator"
            @click="$dispatch('notifications')" >
            <x-badge :value="$count" class="badge-secondary badge-xs badge-soft badge-dash indicator-item" />
        </x-button>
    </div>
</div>
