@component('mail::message')
#{{ $contact['f_name'] }} {{ $contact['l_name'] }} sent you a message.
## From: {{ $contact['email'] }}
@component('mail::panel')
{{ $contact['body'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
