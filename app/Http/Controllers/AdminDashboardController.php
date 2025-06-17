<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Ticket;
use App\Models\Passenger; 


class AdminDashboardController extends Controller
{
    

public function index()
{
    $flightCount = Flight::count();
    $bookingCount = Ticket::count();
    $passengerCount = Passenger::count();
   $totalRevenue = DB::table('tickets')
    ->join('flights', 'tickets.flight_id', '=', 'flights.id')
    ->select(DB::raw('SUM(flights.price) as total_price'), DB::raw('COUNT(tickets.id) as tickets_count'))
    ->first();

$totalPayments = $totalRevenue->total_price * $totalRevenue->tickets_count;




    return view('admin.dashboard', compact('flightCount', 'bookingCount', 'passengerCount', 'totalPayments'));
}

}
