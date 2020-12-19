<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;

class DashboardController extends Controller
{
    public function index()
    {
        $trains = Train::all();
        return view('dashboard', compact('trains'));
    }
}
