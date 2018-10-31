@component('mail::message')
#Message sent from website

**Full Names:** {{$request->fullnames}}

**Email to reply to:** {{$request->email}}

**Message Body:** {{ $request->message }}

Regards,<br>
{{ config('app.name') }}
@endcomponent
