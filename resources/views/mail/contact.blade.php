@component('mail::message')
# New Submission From Contact Form

Here is the message:

<strong>From: </strong>{{$contact['email']}} <br>
<strong>Name: </strong>{{$contact['name']}} <br>
<strong>Subject: </strong>{{$contact['subject']}} <br>
<strong>Message: </strong><br>{!!nl2br($contact['message'])!!} <br>

Regards,<br>
{{ config('app.name') }}
@endcomponent