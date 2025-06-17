<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger; 
use App\Models\Ticket;


class PassengerController extends Controller
{    
     

    public function index()
    {
        $passengers = Passenger::all(); 

        return view('admin.passengers.index', compact('passengers'));
    }
    public function bookings()
{
    $recentTickets = Ticket::with([
        'passenger',
        'flight.originAirport',
        'flight.destinationAirport',
        'flight.schedules'
    ])
    ->orderBy('created_at', 'desc')
    ->paginate(10); 

    $totalBookings = Ticket::count();

    return view('admin.bookings', compact('recentTickets', 'totalBookings'));
}

}
