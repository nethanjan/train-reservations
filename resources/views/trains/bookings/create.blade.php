@extends('layouts.app')

@section('content')
    <div>
        <h2>Create Booking</h2>
        <form action="{{ route('trains.bookings.store', $train->id) }}" method="POST">
            @csrf
            <p><input type="text" name="name" placeholder="Train Name" value="{{ $train->name }}" disabled></p>
            <p><input type="text" name="nic" placeholder="Your NIC" value="{{ old('nic') }}"></p>
            <p><input type="nmber" name="seatCount" placeholder="Number of Seats" value="{{ old('seatCount') }}"></p>
            <p><input type="submit" value="Submit"></p>
        </form>
    </div>

    @if ($errors->any())
        <div class="bg-danger text-white py-2 px-4">
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection