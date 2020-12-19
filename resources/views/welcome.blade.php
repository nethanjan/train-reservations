@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-center">Welcome to Train Reservation</h2>
    </div>
    <h3>Trains</h3>
    <div class="d-flex align-items-start flex-wrap">
        <table class="table table-striped">
            <thead>
                <tr>
                <td>ID</td>
                <td>Train Name</td>
                <td>Train Departure Time</td>
                <td>Available Seats</td>
                <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($trains as $train)
                <tr>
                    <td>{{$train->id}}</td>
                    <td>{{$train->name}}</td>
                    <td>{{$train->departure}}</td>
                    <td>{{$train->seats}}</td>
                    <td><a href="{{ route('trains.bookings.create', $train->id)}}" class="btn btn-primary">Book</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

