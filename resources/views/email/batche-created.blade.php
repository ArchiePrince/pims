@component('mail::message')
# Event Created

A new event has been created!


@component('mail::button', ['url' => 'http://pims-reach.net/events', 'color' => 'red'])
View Event
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
