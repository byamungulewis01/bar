@component('mail::message')
{{ $message }}
<br>
<br>
If this looks irrelevant to you, Please Ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
