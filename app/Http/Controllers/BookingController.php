<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;
use App\Models\Booking;
use DB;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Train $train)
    {
        return view('trains.bookings.create', compact('train'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($train_id, Request $request)
    {
        $train = Train::find($train_id);

        $request->validate([
            'nic'  => 'required|max:10',
            'seatCount'  => 'required|integer|max:'.$train->seats.'',
        ]);

        $booking_id = Booking::create($request->all() + ['train_id' => $train_id])->id;

        // reduce from train avaialable seats
        $updated_train = Train::find($train_id);
        $updated_train->seats = $train->seats - $request->seatCount;
        $updated_train->save();

        return redirect('/trains/'.$train_id.'/bookings/'.$booking_id.'')
            ->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($train_id, Booking $booking)
    {
        $train = DB::table('trains as t')
             ->where('t.id',$train_id)
             ->select('t.id','t.name')
             ->first();
        return view('trains.bookings.show', compact('train', 'booking'));
    }
}
