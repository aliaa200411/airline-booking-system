<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Flights List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
    body {
        background: #f5f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #222;
        padding: 30px 15px;
    }
    .container {
        max-width: 100%;
        background: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    h2 {
        font-weight: 700;
        margin-bottom: 30px;
        color: #1c1c1c;
        text-align: center;
    }
    table {
         max-width: 100%;
        font-weight: 600;
        color: #2c2c2c;
        font-size: 0.95rem;
    }
    thead.table-dark {
        background-color: #343a40;
        color: #fff;
        font-weight: 700;
    }
    tbody tr:hover {
        background-color: #e9ecef;
    }
    .btn-secondary {
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        color: white;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Flights List</h2>
    <table class="table table-bordered table-striped shadow-sm align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Flight Number</th>
                <th>From</th>
                <th>To</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flights as $flight)
            <tr>
                <td>{{ $flight->id }}</td>
                <td>{{ $flight->flight_number }}</td>
                <td>{{ $flight->originAirport ? $flight->originAirport->name : 'N/A' }}</td>
                <td>{{ $flight->destinationAirport ? $flight->destinationAirport->name : 'N/A' }}</td>
                <td>{{ $flight->departure_time }}</td>
                <td>{{ $flight->arrival_time }}</td>
                <td>${{ $flight->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3 d-block mx-auto" style="max-width: 200px;">
        ← Back to Dashboard
    </a>
</div>
</body>
</html>
