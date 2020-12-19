<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;
use DB;

class HomePageController extends Controller
{
    public function index()
    {
        $today = date("Y-m-d H:i:s");
        $trains = DB::table('trains as t')
             ->where('t.bookingAvaialble',1)
             ->whereDate('t.departure','>', $today)
             ->select('t.*',)->get();

        return view('welcome', compact('trains'));
    }

}
