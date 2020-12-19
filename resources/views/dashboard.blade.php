@extends('layouts.app')

@section('content')
    <div>
        <h2 class="text-center">Welcome to Dashboard</h2>
    </div>
    <h3>Trains</h3>
    <div class="d-flex align-items-start flex-wrap">
        <div>
            <a href="{{ url('/dashboard/add-train') }}" class="text-sm text-gray-700 underline">Add Trains</a>
        </div>
        <!-- <div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="bg-danger text-white py-2 px-4 ml-4 mb-2">
                        <p class="mb-0">{{ $error }}</p>
                    </div>
                @endforeach
            @endif
        </div> -->
    </div>
@endsection