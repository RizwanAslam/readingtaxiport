@component('mail::message')
#Dear {{$customer->name}} , we have received your booking and and now is being processed.
##The details are as follows:
###Pick up:{{$location->origin}}
###Destination: {{$location->destination}}
###Date:{{$booking->pickup_time}} 
###Price:{{$booking->cost}}£
###Type of journey:{{$booking->journey}}

Thank you for booking your journey with us.
Jubile Cars<br>
Phone number:07450215762<br>
jubilecars.com<br>
Email:Bookings@jubilecars.com
@endcomponent
