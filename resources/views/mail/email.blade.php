{{-- Subject: {{ $data['subject'] }}
<br>
Message: {{ $data['body'] }} --}}
@component('mail::message')
    # {{ $data['subject'] }}

    {{ $data['body'] }}

    Thanks,
    Justine
@endcomponent