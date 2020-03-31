@extends('layout')
@section('content')
    <div class="container">
        <h1>Admin Panal</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <th scope="row">{{$record->id}}</th>
                    <td>{{$record->name}}</td>
                    <td>{{$record->email}}</td>
                    <td>{{$record->telephone}}</td>
                    <td><a class="btn btn-outline-danger" href="#" role="button">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>  
    </div>
@endsection('content');