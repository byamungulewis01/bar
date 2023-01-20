@component('mail::message')
# Welcome to {{ config('app.name') }}

Your new RBA MIS account have been created, credential are:

Email: {{ $email }}
Password: {{ $password }}

If this looks irrelevant to you, Please Ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
