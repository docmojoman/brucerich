@component('mail::message')
# $f_name $l_name sent you a message.
## From: $email
@component('mail::panel')
$body
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
