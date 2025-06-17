@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="container my-5">
     <div class="d-flex justify-content-end gap-2 mb-3">
    
    <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-circle" title="Logout" style="width: 45px; height: 45px;">
        <i class="bi bi-box-arrow-in-right"></i>
    </a>
    <a href="{{ route('passenger.dashboard') }}" class="btn btn-outline-primary rounded-circle" title="Dashboard" style="width: 45px; height: 45px;">
        <i class="bi bi-speedometer2"></i>
    </a>
    <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-circle" title="Home" style="width: 45px; height: 45px;">
        <i class="bi bi-house-door-fill"></i>
    </a>
</div>
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white text-center py-3">
            <h2 class="mb-0">Complete Your Payment</h2>
        </div>
        <div class="card-body">
            <p><strong>Flight:</strong> {{ $ticket->flight->flight_number }}</p>
            <p><strong>Seats:</strong> {{ $ticket->seats_booked }}</p>
            <p><strong>Total:</strong> ${{ number_format($ticket->flight->price * $ticket->seats_booked, 2) }}</p>

            <form action="{{ route('payment.process', $ticket->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="method" class="form-label">Payment Method</label>
                    <select name="method" id="method" class="form-select" required>
                        <option value="">Choose Method</option>
                        <option value="visa">Visa</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash">Cash</option>
                    </select>
                    @error('method')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

<button type="submit" class="btn px-5 py-2 text-white" style="background-color: #3B82F6;">
    Pay Now
</button>
            </form>
        </div>
    </div>
</div>
@endsection
