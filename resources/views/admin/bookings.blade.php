@extends('layouts.app')

@section('title', 'Admin Bookings')

@section('content')

<h1 class="mb-4">📋 Recent Bookings <span class="text-muted">(Total: {{ $totalBookings }})</span></h1>

@if($recentTickets->isNotEmpty())
    <div class="table-responsive rounded shadow-sm mt-3">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Booking ID</th>
                    <th>Passenger</th>
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
                        $paymentStatus = $ticket->status ?? 'pending';
                    @endphp
                    <tr>
                        <td>#{{ $ticket->id }}</td>
                        <td>{{ $ticket->passenger->full_name ?? 'N/A' }}</td>
                        <td>{{ $ticket->flight->flight_number ?? 'N/A' }}</td>
                        <td>{{ optional($ticket->flight->originAirport)->name ?? 'N/A' }}</td>
                        <td>{{ optional($ticket->flight->destinationAirport)->name ?? 'N/A' }}</td>
                        <td>{{ $schedule ? \Carbon\Carbon::parse($schedule->departure_time)->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $paymentStatus === 'paid' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($paymentStatus) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $recentTickets->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            ← Back to Dashboard
        </a>
    </div>
@else
    <div class="alert alert-info mt-4">
        No bookings found.
    </div>
@endif
<style>
    .table-responsive {
        max-width: 90%;
        margin: auto;
        font-size: 0.92rem;
    }

    table.table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
        padding: 0.6rem;
        font-weight: 600; 
    }

    .pagination .page-link {
        color: #6c757d;
        border: 1px solid #dee2e6;
        font-size: 0.9rem;
    }

    .pagination .page-link:hover {
        color: #495057;
        background-color: #f8f9fa;
        border-color: #ced4da;
    }

    .pagination .active .page-link {
        color: #fff;
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .pagination .disabled .page-link {
        color: #adb5bd;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
</style>


@endsection
