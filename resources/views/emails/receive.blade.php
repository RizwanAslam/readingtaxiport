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
## Vehical Type
             {{$booking->vehicalType}}
## Occupants
             {{$booking->occupants}}
## Luggages
             {{$booking->luggage}}
## Suitcase
              {{$booking->suitcase}}
## Journey Type
              {{$booking->journey}}
## Date and Time
                {{$booking->pickup_time}}
## Cost
                {{$booking->cost}}£
## Flight information
                {{$customer->flightinfo}}
## Meet and Greet 
                {{$customer->meetgreet}}
## Aditional information about flight 
                {{$customer->aditionalinfo}}

Thanks,<br>
@endcomponent
