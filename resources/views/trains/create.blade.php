@extends('layouts.app')

@section('content')
    <div>
        <h2>Add Train</h2>
        <form action="{{ route('trains.store') }}" method="POST">
            @csrf
            <p><input type="text" name="name" placeholder="Train Name" value="{{ old('name') }}"></p>
            <p><input type="datetime-local" name="departure" placeholder="Select Departure Time" value="{{ old('departure') }}"></p>
            <p><input type="nmber" name="seats" placeholder="Number of Seats" value="{{ old('seats') }}"></p>
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