@extends('layouts.app')

@section('title', 'All Flights')

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
            <h2>All Flights</h2>
        </div>
        <div class="card-body">

            <div class="mb-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Search flights by number, origin, or destination...">
            </div>

            @if($flights->isEmpty())
                <p class="text-center text-muted fs-5">No flights available.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle" id="flightsTable">
                        <thead class="table-primary text-uppercase">
                            <tr>
                                <th>Flight Number</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Departure Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flights as $flight)
                            <tr style="cursor: pointer;">
                                <td class="fw-bold">{{ $flight->flight_number }}</td>
                                <td>{{ $flight->originAirport->name }}</td>
                                <td>{{ $flight->destinationAirport->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y, H:i') }}</td>
                                <td><a href="{{ route('flights.show', $flight->id) }}" class="btn btn-primary btn-sm">Book Now</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#flightsTable tbody tr');

        rows.forEach(row => {
            let flightNumber = row.cells[0].textContent.toLowerCase();
            let origin = row.cells[1].textContent.toLowerCase();
            let destination = row.cells[2].textContent.toLowerCase();

            if (flightNumber.includes(filter) || origin.includes(filter) || destination.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
