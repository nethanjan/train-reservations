@extends('layouts.app')

@section('content')
    <div>
        <h2 class="text-center">Welcome to Dashboard</h2>
    </div>
    <h3>Trains</h3>
    <div class="d-flex align-items-start flex-wrap">
        <div>
            <a href="{{ route('trains.create') }}" class="text-sm text-gray-700 underline">Add Trains</a>
        </div>
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
                    <td><a href="{{ route('trains.edit', $train->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('trains.destroy', $train->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection