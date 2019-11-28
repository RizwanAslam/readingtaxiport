@extends('layout')
@section('content')
<!-- Banner -->
<section id="banner">
	<div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:5%">
                  5% Complete (info)
            </div>
        </div>
			<h1>Location</h1>
				<form id="distance_form" class="form-horizontal" method='post' action="{{url('/booking')}}">
					<div class="form-group">
					    <input class="form-control" id="from_places" placeholder="Enter current location" />
						<input id="origin"  name="origin" required="" type="hidden" value=""/>
					</div>
                {{csrf_field()}}
					<div class="form-group">
						<input class="form-control"id="to_places" placeholder="Enter destination location"/>
						<input id="destination"  name="destination"  required="" type="hidden" value=""/>
                    </div>
                    <div id="result" style='visibility:hidden'>
                        <input name='distance' class="form-control" id="in_mile"/>
				    </div>
                    <button type='button' id='distance' class="btn btn-danger">click to continue</button>
                    
				</form>
	</div>
<script>
    $(function() {
        // add input listeners
        google.maps.event.addDomListener(window, 'load', function () {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });

        });
        // calculate distance
        function calculateDistance() {
            var origin = $('#origin').val();
            var destination = $('#destination').val();
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callback);
        }
        // get distance results
        function callback(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    console.log(response.rows[0].elements[0].distance);
                    var distance_in_kilo = distance.value / 1000; // the kilom
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    var duration_value = duration.value;
                    $('#in_mile').val(distance_in_mile.toFixed(2));
                    $('#distance_form').submit();
                }
            }
        }
        // print results on submit the form
        $('#distance').click(function(e){
            e.preventDefault();
            calculateDistance();
        });

    });

</script>			
</section>

@endsection('content')