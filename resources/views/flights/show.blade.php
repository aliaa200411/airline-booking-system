@extends('layouts.app')

@section('title', 'Flight Details')

@section('content')
<div class="container my-5">
     <div class="d-flex justify-content-end gap-2 mb-3">
    
    <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-circle" title="Login" style="width: 45px; height: 45px;">
        <i class="bi bi-box-arrow-in-right"></i>
    </a>
    <a href="{{ route('passenger.dashboard') }}" class="btn btn-outline-primary rounded-circle" title="Dashboard" style="width: 45px; height: 45px;">
        <i class="bi bi-speedometer2"></i>
    </a>
    <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-circle" title="Home" style="width: 45px; height: 45px;">
        <i class="bi bi-house-door-fill"></i>
    </a>
</div>
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h2>Flight Details</h2>
        </div>
        <div class="card-body">
            <h4 class="mb-3"><strong>Flight Number:</strong> {{ $flight->flight_number }}</h4>
            <p><strong>From:</strong> {{ $flight->originAirport->name ?? 'N/A' }}</p>
            <p><strong>To:</strong> {{ $flight->destinationAirport->name ?? 'N/A' }}</p>
            <p><strong>Departure:</strong> {{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y, H:i') }}</p>
            <p><strong>Arrival:</strong> {{ \Carbon\Carbon::parse($flight->arrival_time)->format('d M Y, H:i') }}</p>
            <p><strong>Price:</strong> ${{ $flight->price }}</p>
            <p><strong>Seats Available:</strong> {{ $flight->seats_available }}</p>

<a href="{{ route('tickets.create', $flight->id) }}" class="btn mt-3 text-white" style="background-color: #3B82F6;">Continue to Booking</a>
        </div>
    </div>
</div>
@endsection
