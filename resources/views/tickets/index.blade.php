@extends('layouts.app')

@section('title', 'My Bookings')

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
            <h3 class="mb-0">My Flight Bookings</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($tickets->isEmpty())
                <p class="text-muted text-center fs-5">You have no bookings yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Flight #</th>
                                <th>From → To</th>
                                <th>Departure</th>
                                <th>Seat #</th>
                                <th>Seats</th>
                                <th>Status</th>
                                <th>Booked At</th>
                                <th>View</th>
                                <th>Pay</th>
                                <th>Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td class="fw-bold">{{ $ticket->flight->flight_number }}</td>
                                <td>{{ $ticket->flight->originAirport->code ?? 'N/A' }} → {{ $ticket->flight->destinationAirport->code ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($ticket->flight->departure_time)->format('d M Y, H:i') }}</td>
                                <td>{{ $ticket->seat_number }}</td>
                                <td>{{ $ticket->seats_booked }}</td>
                                <td>
                                    @php
                                        $statusLabel = ucfirst($ticket->status);
                                        $statusColor = '#cbd5e1'; 
                                        $statusIcon = '';

                                        switch ($ticket->status) {
                                            case 'confirmed':
                                                $statusColor = '#3B82F6'; 
                                                $statusIcon = '✔️';
                                                break;
                                            case 'pending':
                                                $statusColor = '#60A5FA'; 
                                                $statusIcon = '⏳';
                                                break;
                                            case 'cancelled':
                                                $statusColor = '#94A3B8'; 
                                                $statusIcon = '❌';
                                                break;
                                            default:
                                                $statusIcon = '❔';
                                        }
                                    @endphp

                                    <span class="badge text-white px-3 py-2" style="background-color: {{ $statusColor }}">
                                        {{ $statusIcon }} {{ $statusLabel }}
                                    </span>
                                </td>
                                <td>{{ $ticket->created_at->format('d M Y, H:i') }}</td>

                                <td>
                                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm text-white" style="background-color: #3B82F6;">View</a>
                                </td>

                                <td>
                                    @if($ticket->status === 'pending')
                                        <a href="{{ route('payment.show', $ticket->id) }}" class="btn btn-sm btn-success">Pay</a>
                                    @endif
                                </td>

                                <td>
                                    @if(in_array($ticket->status, ['confirmed', 'pending']))
                                        <form action="{{ route('tickets.cancel', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this ticket?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
