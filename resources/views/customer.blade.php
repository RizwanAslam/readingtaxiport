@extends('layout')
@section('content')
<div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                  80% Complete (info)
            </div>
        </div>
<h1 style='color: #25a2c3; text-align:center'>Passanger Details</h1>
<form method="POST" action="{{url('/contact')}}">
            <div class="form-group">
                    <div style='visibility:hidden'>
                        <input name='location_id' value='{{$record->location_id}}'/>
                    </div>
                    <div style='visibility:hidden'>
                        <input name='vehical_id' value='{{$record->id}}'/>
                    </div>
                <h4>*Full Name:</h4>
                <input type="text" class="form-control" id="name" placeholder="Enter Full name" name="name" required>
            </div>
            {{csrf_field()}}
            <div class="form-group">
                <h4>Company Name:(optional)</h4>
                <input type="text" class="form-control" id="company" placeholder="Enter Company name" name="company">
            </div>
            <div class="form-group">
                <h4>*Phone No:</h4>
                <input type="integer" class="form-control" id="tel" placeholder="Enter contact no" name="telephone" requird>
            </div>
            <div class="form-group">
                <h4>*Email:</h4>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" requird>
            </div>
        <h2 style='color: #25a2c3; text-align:center'>Flight Details(optional)</h2>
            <div class="form-group">
                <h4>Flight Details(optional)</h4>
                <input type="text" class="form-control" id="flight" placeholder="Enter Flight details" name="flightinfo">
            </div>
            <div class="form-group">
                <h4>Lead Passenger Phone No:</h4>
                <input type="integer" class="form-control" id="ftel" placeholder="Enter contact no" name="flightphone">
            </div>
            <div class="form-group">
            <div style="visibility:hidden"> 
                <input name='costupdate'  id='costupdate' value='{{$record->cost}}'/>
            </div>
                <h4>Meet and Great:</h4>
                <select id='meet' name="meetgreet" class='form-control' onchange='costinput()'>
                    <option value="yes">YES</option>
                    <option value="no" selected>NO</option>
                </select>
            </div>
            <script>
            function costinput(){
              var meet=document.getElementById('meet').value;
              if(meet=='yes'){
                document.getElementById('costupdate').value={{$record->cost}}+10;
              }
              if(meet=='no'){
                document.getElementById('costupdate').value={{$record->cost}};
              }
            }
            </script>
            <div class="form-group">
                <h4>Adtional Flight Details(optional)</h4>
                <textarea class="form-control" rows="2" id="aditionalinfo" name='aditionalinfo'></textarea>
            </div>
            <ul class="actions">
                <input type='submit' value='Booking Placed'/>
            </ul>
  </form>
</div>
@endsection('content')