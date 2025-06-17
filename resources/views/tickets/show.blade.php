@extends('layouts.app')

@section('title', 'Booking Details')

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
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Booking Details</h3>
        </div>
        <div class="card-body px-5 py-4">
            <div class="mb-3">
                <span class="fw-bold text-primary">Flight Number:</span>
                <span class="text-dark">{{ $ticket->flight->flight_number }}</span>
            </div>
            <div class="mb-3">
                <span class="fw-bold text-primary">From → To:</span>
                <span class="text-dark">{{ $ticket->flight->originAirport->name ?? 'N/A' }} → {{ $ticket->flight->destinationAirport->name ?? 'N/A' }}</span>
            </div>
            <div class="mb-3">
                <span class="fw-bold text-primary">Departure:</span>
                <span class="text-dark">{{ \Carbon\Carbon::parse($ticket->flight->departure_time)->format('d M Y, H:i') }}</span>
            </div>
            <div class="mb-3">
                <span class="fw-bold text-primary">Arrival:</span>
                <span class="text-dark">{{ \Carbon\Carbon::parse($ticket->flight->arrival_time)->format('d M Y, H:i') }}</span>
            </div>
            <div class="mb-3">
                <span class="fw-bold text-primary">Seat Number:</span>
                <span class="text-dark">{{ $ticket->seat_number }}</span>
            </div>
            <div class="mb-3">
                <span class="fw-bold text-primary">Seats Booked:</span>
                <span class="text-dark">{{ $ticket->seats_booked }}</span>
            </div>
            <div class="mb-3">
                <span class="fw-bold text-primary">Status:</span>
                @php
                    $status = strtolower($ticket->status);
                    $statusColor = '#94A3B8'; 
                    $statusIcon = '❔';
                    $statusText = ucfirst($status);

                    if ($status === 'confirmed') {
                        $statusColor = '#3B82F6'; 
                        $statusIcon = '✔️';
                        $statusText = 'Confirmed';
                    } elseif ($status === 'pending') {
                        $statusColor = '#60A5FA'; 
                        $statusIcon = '⏳';
                        $statusText = 'Pending';
                    } elseif ($status === 'cancelled') {
                        $statusColor = '#F87171'; 
                        $statusIcon = '❌';
                        $statusText = 'Cancelled';
                    }
                @endphp
                <span class="badge text-white px-3 py-2" style="background-color: {{ $statusColor }}">
                    {{ $statusIcon }} {{ $statusText }}
                </span>
            </div>
            <div class="mb-4">
                <span class="fw-bold text-primary">Booked At:</span>
                <span class="text-dark">{{ $ticket->created_at->format('d M Y, H:i') }}</span>
            </div>
            <a href="{{ route('tickets.index') }}" class="btn btn-outline-primary px-4">Back to My Bookings</a>
        </div>
    </div>
</div>
@endsection
