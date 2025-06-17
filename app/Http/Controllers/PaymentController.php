<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Booking;


class PaymentController extends Controller
{ 
 protected $fillable = [
        'flight_id',
        'booking_date',
    ];
    
    public function show(Ticket $ticket)
    {
        return view('payment.show', compact('ticket'));
    }

   public function process(Request $request, Ticket $ticket)
{
    $request->validate([
        'method' => 'required|string',
    ]);

    $ticket->update([
        'status' => 'confirmed',
    ]);

    $booking = $ticket->booking;
    if (!$booking) {
        $booking = Booking::create([
            'flight_id' => $ticket->flight->id,
            'booking_date' => Carbon::now(),
        ]);
    }

    $amount = $ticket->flight->price * $ticket->seats_booked;
    $payment = Payment::create([
        'method' => $request->input('method', 'manual'),
        'amount' => $amount,
        'booking_id' => $booking->id,
        'ticket_id' => $ticket->id,
    ]);

    $ticket->passenger->increment('points', (int) $amount);

    return redirect()->route('tickets.index')->with('success', 'Payment successful. Your ticket is confirmed.');
}

}
