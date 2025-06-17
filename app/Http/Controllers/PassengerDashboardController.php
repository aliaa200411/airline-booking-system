<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class PassengerDashboardController extends Controller
{
    public function index()
    {
        $passengerId = Auth::guard('passenger')->id();

        $recentTickets = Ticket::with([
            'flight.originAirport',
            'flight.destinationAirport',
            'flight.schedules'
        ])
        ->where('passenger_id', $passengerId)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        $myBookingsCount = Ticket::where('passenger_id', $passengerId)->count();

        $nextFlightSchedule = $recentTickets->flatMap(function($ticket) {
            return $ticket->flight->schedules->filter(function($schedule) {
                return $schedule->scheduled_time > now();
            });
        })->sortBy('scheduled_time')->first();

        $nextFlight = null;
        if ($nextFlightSchedule) {
            $nextFlight = (object) [
                'flight_number' => $nextFlightSchedule->flight->flight_number,
                'departure_time' => $nextFlightSchedule->departure_time,
            ];
        }

        $userPoints = Auth::guard('passenger')->user()->points ?? 0;

        return view('passenger.dashboard', compact('myBookingsCount', 'nextFlight', 'userPoints', 'recentTickets'));
    }
}
