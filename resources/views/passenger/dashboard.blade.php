@extends('layouts.app')

@section('title', 'Passenger Dashboard')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="sidebar-buttons">
    <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-circle" title="Home" style="width: 45px; height: 45px;">
        <i class="bi bi-house-door-fill"></i>
    </a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-primary rounded-circle" title="Logout" style="width: 45px; height: 45px;">
            <i class="bi bi-box-arrow-in-right"></i>
        </button>
    </form>
</div>

<div class="dashboard-container">

    <h2>Passenger Dashboard</h2>

    <div class="row g-4 mb-5">
        <div class="col-12">
            <div class="card-dashboard card-blue">
                <h5>Total Bookings</h5>
                <p>{{ $myBookingsCount }}</p>
            </div>
        </div>

        <div class="col-12">
            <div class="card-dashboard card-green">
                <h5>Next Flight</h5>
                <p class="fs-5 fw-semibold">
                    @if($nextFlight && $nextFlight->departure_time)
                        {{ $nextFlight->flight_number }} — {{ \Carbon\Carbon::parse($nextFlight->departure_time)->format('Y-m-d H:i') }}
                    @else
                        No upcoming flights
                    @endif
                </p>
            </div>
        </div>

        <div class="col-12">
            <div class="card-dashboard card-indigo">
                <h5>Reward Points</h5>
                <p>{{ $userPoints }}</p>
            </div>
        </div>
    </div>

    <div class="card-dashboard card-green recent-bookings-card">
        <h5>My Recent Bookings</h5>

        @if($recentTickets->isNotEmpty())
            <div class="table-responsive rounded shadow-sm mt-3">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Flight Number</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Departure Time</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentTickets as $ticket)
                            @php
                                $schedule = $ticket->flight->schedules->first();
                                $paymentStatus = $ticket->status ?? null;
                            @endphp
                            <tr>
                                <td>{{ $ticket->flight->flight_number ?? 'N/A' }}</td>
                                <td>{{ optional($ticket->flight->originAirport)->name ?? 'N/A' }}</td>
                                <td>{{ optional($ticket->flight->destinationAirport)->name ?? 'N/A' }}</td>
                                <td>{{ $schedule ? \Carbon\Carbon::parse($schedule->departure_time)->format('Y-m-d H:i') : 'N/A' }}</td>
                                <td>
                                    <span class="{{ $paymentStatus === 'paid' ? 'status-confirmed' : 'status-other' }}">
                                        {{ $paymentStatus ? ucfirst($paymentStatus) : 'Pending' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="no-bookings text-center mt-4">No bookings found.</p>
        @endif
    </div>

</div>

<style>
.sidebar-buttons {
    position: fixed;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 15px;
    z-index: 1000;
}
.circle-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    font-size: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    text-decoration: none;
}
.btn-home {
    background: #3867d6;
}
.btn-home:hover {
    background: #2c4db7;
    transform: scale(1.1);
}
.btn-flight {
    background: #4a69bd;
}
.btn-flight:hover {
    background: #3b55a0;
    transform: scale(1.1);
}
.btn-logout {
    background: #e74c3c;
}
.btn-logout:hover {
    background: #c0392b;
    transform: scale(1.1);
}
.dashboard-container {
    max-width: 960px;
    margin: 0 auto;
    background: #f0f4f8;
    border-radius: 1rem;
    padding: 30px 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}
h2, h3 {
    font-weight: 700;
    color: #3b3b98;
    margin-bottom: 1.5rem;
    text-align: center;
}
.card-dashboard {
    border-radius: 1rem;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    color: white;
    padding: 2rem 1.5rem;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: default;
}
.card-dashboard:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.2);
}
.card-blue { background: #4a69bd; }
.card-green { background: #38ada9; }
.card-indigo { background: #6a89cc; }
.table thead {
    background-color: #f1f2f6;
}
.table thead th {
    color: #4a69bd;
    font-weight: 700;
    border-bottom: none;
    letter-spacing: 0.05em;
    text-transform: uppercase;
}
.table tbody tr:hover {
    background-color: #d6e6ff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.table tbody td {
    vertical-align: middle;
    font-size: 1rem;
    color: #333;
}
.status-confirmed {
    background-color: #7bed9f;
    color: #2d3436;
    padding: 0.25rem 0.7rem;
    border-radius: 9999px;
    font-weight: 700;
    font-size: 0.85rem;
    user-select: none;
}
.status-other {
    background-color: #dfe6e9;
    color: #636e72;
    padding: 0.25rem 0.7rem;
    border-radius: 9999px;
    font-weight: 700;
    font-size: 0.85rem;
    user-select: none;
}
.no-bookings {
    color: #95a5a6;
    font-style: italic;
}
</style>
@endsection
