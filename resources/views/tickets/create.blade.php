@extends('layouts.app')

@section('title', 'Book Flight')

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
            <h2 class="mb-0">Book Your Flight</h2>
        </div>
        <div class="card-body">
            <h4 class="mb-3">
                Flight: {{ $flight->flight_number }} 
                ({{ $flight->originAirport->code ?? 'N/A' }} → {{ $flight->destinationAirport->code ?? 'N/A' }})
            </h4>
            <p>🛫 Departure: <strong>{{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y, H:i') }}</strong></p>
            <p>💲 Price per Seat: <strong>${{ number_format($flight->price, 2) }}</strong></p>
            <p>🪑 Seats Available: <span class="badge bg-success">{{ $flight->seats_available }}</span></p>

            <form action="{{ route('tickets.store') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="seats_booked" class="form-label">Number of Seats</label>
                        <input type="number" name="seats_booked" id="seats_booked" class="form-control"
                            placeholder="e.g. 1" required min="1" max="{{ $flight->seats_available }}"
                            value="{{ old('seats_booked', 1) }}">
                        @error('seats_booked')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Seat Numbers</label>
                        
                        <div id="seat-numbers-wrapper">
                        </div>
                        @error('seat_numbers')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        @error('seat_numbers.*')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn px-5 py-2 text-white" style="background-color: #3B82F6;">
                        Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const seatCountInput = document.getElementById('seats_booked');
        const seatWrapper = document.getElementById('seat-numbers-wrapper');

        const oldSeatNumbers = @json(old('seat_numbers', []));

        function generateSeatInputs(count) {
            seatWrapper.innerHTML = '';
            for (let i = 0; i < count; i++) {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'seat_numbers[]';
                input.className = 'form-control mb-2';
                input.placeholder = 'E.g. B1 for Business, E12 for Economy';
                input.title = 'Enter seat number starting with B for Business class (e.g. B1) or E for Economy (e.g. E12) and  F for First Class (e.g. f2)';
                input.required = true;
                input.maxLength = 10;
                input.value = oldSeatNumbers[i] || '';
                seatWrapper.appendChild(input);
            }
        }

        const initialCount = parseInt(seatCountInput.value) || 1;
        generateSeatInputs(initialCount);

        seatCountInput.addEventListener('input', function () {
            let count = parseInt(this.value);
            if (count > 0 && count <= {{ $flight->seats_available }}) {
                generateSeatInputs(count);
            } else {
                seatWrapper.innerHTML = '';
            }
        });
    });
</script>
@endpush


