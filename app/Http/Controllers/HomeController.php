<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class HomeController extends Controller
{
    public function index()
    {
        $flights = Flight::orderBy('departure_time', 'asc')->take(6)->get();

        return view('home', compact('flights'));
    }
}
