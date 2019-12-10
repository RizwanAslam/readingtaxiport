@component('mail::message')
#Dear {{$customer->name}} , we have received your booking and and now is being processed.
##The details are as follows:
###Pick up:{{$location->origin}}
###Destination: {{$location->destination}}
###Date:{{$booking->pickup_date}} 
###Price:{{$booking->cost}}£
###Type of journey:{{$booking->journey}}

Thank you for booking your journey with us.
Jubile Cars.
Phone number.
www.jubilecars.com
@endcomponent
