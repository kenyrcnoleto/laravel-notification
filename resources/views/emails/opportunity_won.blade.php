<x-mail::message>
    # Opportunity Won

    {{ $userName }}, <p>we are excited to inform you that you have won the opportunity!</p> <p>Congratulations on your achievement. We appreciate your hard work and dedication. If you have any questions or need further assistance, please feel free to reach out to us.</p>
<x-mail::panel>
    This is a custom panel to highlight important information about the opportunity you won. Please review the details and let us know if you have any questions.
</x-mail::panel>

    <x-mail::button :url="url('/')">
        {{__('Visit our website')}}
    </x-mail::button>
</x-mail::message>
