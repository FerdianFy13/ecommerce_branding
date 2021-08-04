@component('mail::message')
# New Account Created

You can now log into our website using following credentials.

Email: {{$data['email']}}
Password: {{$data['password']}}

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent