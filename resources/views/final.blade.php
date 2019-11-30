@extends('layout')
@section('content')
<div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                  100% Complete (info)
            </div>
        </div>
        <div class="alert alert-success">
            <strong>Success!</strong> {{$record->name}} Your booking has been placed succesfully.
        </div>
            <div class="container">
                <h3>{{$record->name}} Your Phone number is {{$record->telephone}} <br>and email {{$record->email}}</h3>          
                
            </div>

</div>
@endsection('content');