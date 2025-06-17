<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller

{  
    public function create($flightId)
    {
        return view('bookings.create', compact('flightId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
        ]);

        $passenger = Auth::guard('passenger')->user();

        $booking = Booking::create([
            'flight_id' => $request->flight_id,
            'booking_date' => now(),
            'status' => 'pending',
        ]);

        $booking->passengers()->attach($passenger->id);

        return redirect()->route('payment.show', $booking->id);
    }

    public function index()
    {
        $passenger = Auth::guard('passenger')->user();

        $bookings = Booking::with('flight')
            ->whereHas('passengers', function($q) use ($passenger) {
                $q->where('passenger_id', $passenger->id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('bookings.index', compact('bookings'));
    }
}
