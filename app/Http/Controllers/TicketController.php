<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function create($flightId)
    {
        $flight = Flight::findOrFail($flightId);
        $passenger = Auth::guard('passenger')->user();

        return view('tickets.create', compact('flight', 'passenger'));
    }

    public function show($id)
    {
        $ticket = Ticket::with(['flight.originAirport', 'flight.destinationAirport', 'passenger'])->findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }
public function cancel(Ticket $ticket)
{
    if ($ticket->status !== 'confirmed') {
        return redirect()->back()->with('error', 'Only confirmed tickets can be cancelled.');
    }

    $amount = $ticket->flight->price * $ticket->seats_booked;

    $ticket->update([
        'status' => 'cancelled',
    ]);

    $ticket->passenger->decrement('points', (int)$amount);

    return redirect()->route('tickets.index')->with('success', 'Ticket cancelled successfully. Points have been deducted.');
}

   public function store(Request $request)
{
    $request->validate([
        'flight_id' => 'required|exists:flights,id',
        'seat_numbers' => 'required|array|min:1',
        'seat_numbers.*' => 'required|string|max:10',
        'seats_booked' => 'required|integer|min:1|max:'.Flight::findOrFail($request->flight_id)->seats_available,
    ]);

    $passenger = Auth::guard('passenger')->user();
    $flight = Flight::findOrFail($request->flight_id);

    if (count($request->seat_numbers) != $request->seats_booked) {
        return back()->withErrors(['seat_numbers' => 'Number of seat numbers does not match the number of seats booked.'])->withInput();
    }

    $existingSeats = Ticket::where('flight_id', $flight->id)
        ->whereIn('seat_number', $request->seat_numbers)
        ->pluck('seat_number')
        ->toArray();

    if (!empty($existingSeats)) {
        return back()->withErrors([
            'seat_numbers' => 'The following seats are already booked: ' . implode(', ', $existingSeats)
        ])->withInput();
    }

    foreach ($request->seat_numbers as $seatNumber) {
        Ticket::create([
            'flight_id' => $flight->id,
            'passenger_id' => $passenger->id,
            'admin_id' => 1,
            'seat_number' => $seatNumber,
            'status' => 'pending',
            'seats_booked' => 1, 
        ]);
    }

    $flight->decrement('seats_available', $request->seats_booked);

    $firstTicket = Ticket::where('flight_id', $flight->id)
        ->where('passenger_id', $passenger->id)
        ->latest()
        ->first();

    return redirect()->route('payment.show', $firstTicket->id);
}


public function index()
{
    $passenger = Auth::guard('passenger')->user();

    $tickets = Ticket::with(['flight.originAirport', 'flight.destinationAirport'])
        ->where('passenger_id', $passenger->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('tickets.index', compact('tickets'));
}


}
