<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainRequest;
use Illuminate\Http\Request;
use App\Models\Train;
use DB;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trains = Train::all();
        return view('dashboard', compact('trains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:100|unique:trains,name',
            'departure'  => 'required',
            'seats'  => 'required|integer|max:10',
        ]);

        $article = Train::create($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Train added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $train = DB::table('trains as t')
             ->where('t.id',$id)
             ->select('t.id','t.name',DB::raw('DATE_FORMAT(t.departure, "%Y-%m-%dT%H:%i") as departure'), 't.seats')
             ->first();

        return view('trains.edit',compact('train'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Train  $train
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Train $train)
    {
        $request->validate([
            'name'  => 'required|max:100|unique:trains,name,'."$train->name".',name',
            'departure'  => 'required',
            'seats'  => 'required|integer|max:10',
        ]);

        $train->update($request->all());
    
        return redirect()->route('dashboard')
                        ->with('success','Train updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Train $train)
    {
        $train->delete();

        return redirect()->route('dashboard')
                        ->with('success','Train deleted successfully');
    }
}
