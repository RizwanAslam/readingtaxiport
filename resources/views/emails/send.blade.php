@component('mail::message')
# {{$customer->name}} your booking  hase been placed
##Your are going from {{$location->origin}} to {{$location->destination}}
##at date {{$booking->pickup_date}} in cost {{$booking->cost}}£.
Thanks,<br>
@endcomponent
