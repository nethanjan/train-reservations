@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Train</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard') }}"> Back</a>
            </div>
        </div>
    </div>
  
    <form action="{{ route('trains.update',$train->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p><input type="text" name="name" placeholder="Train Name" value="{{ $train->name }}" class="form-control" placeholder="Name"></p>
        <p><input type="datetime-local" name="departure" placeholder="Select Departure Time" value="{{ $train->departure }}"></p>
        <p><input type="nmber" name="seats" placeholder="Number of Seats" value="{{ $train->seats }}"></p>
   
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

   
    </form>

    @if ($errors->any())
        <div class="bg-danger text-white py-2 px-4">
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection