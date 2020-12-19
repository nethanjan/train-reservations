@extends('layouts.app')

@section('content')
    <div>
        <h2>Booking Created!!!</h2>
            <p>Train Name : {{ $train->name }}</p>
            <p>Your NIC : {{ $booking->nic }}</p>
            <p>Number of seats booked : {{ $booking->seatCount }}</p>
    </div>
@endsection