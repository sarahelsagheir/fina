@component('mail::message')
# From Bookie Team
Hey {{auth()->user()->name}} !
Thank you For Purchasing

Thanks,<br>
{{ config('app.name') }}
@endcomponent
