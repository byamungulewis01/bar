@component('mail::message')
# Hello,<br><br> 
You have reset your password and an email has been sent to you to reset it. Click the button below to complete resetting your password.<br>

@component('mail::button', ['url' => route('password.check', 'key='.$key.'&userId='.$email)])
    Reset Password
@endcomponent

If you have not requested password reset, please ignore and delete this email.<br><br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent