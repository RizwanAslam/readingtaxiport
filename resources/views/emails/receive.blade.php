@component('mail::message')
# Customer has Placed booking
## Name of customer
             {{$customer->name}}
## Company
            {{$customer->company}}
## Email
            {{$customer->email}}
## Phone Number
            {{$customer->telephone}}
## Pickup Point
            {{$location->origin}}
## Destination
            {{$location->destination}}
## Distance
            {{$location->distance}}
## vehical Type
             {{$booking->vehicalType}}
## vehical Type
             {{$booking->occupants}}
## vehical Type
             {{$booking->luggage}}
## vehical Type
              {{$booking->suitcase}}
## vehical Type
              {{$booking->journey}}
## vehical Type
                {{$booking->pickup_time}}
## vehical Type
                {{$booking->cost}}£
## Flight information
                {{$customer->flightinfo}}
## Meet and Greet 
                {{$customer->meetgreet}}
## Aditional information about flight 
                {{$customer->aditionalinfo}}

Thanks,<br>
@endcomponent
