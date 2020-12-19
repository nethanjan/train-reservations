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
             ->select('t.*',)
             ->selectRaw('IF(t.departure > "'.$today.'", 1, 0) as avaialble')
            //  ->where('t.bookingAvaialble',1)
             ->get();
        return view('welcome', compact('trains'));
    }

}
