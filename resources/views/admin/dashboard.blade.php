<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
  body {
    background: #f8f9fa;
  }
  .sidebar {
    height: 100vh;
    background-color: #343a40;
  }
  .sidebar a {
    color: #adb5bd;
    text-decoration: none;
    display: block;
    padding: 15px 20px;
    border-left: 4px solid transparent;
  }
  .sidebar a:hover, .sidebar a.active {
    background-color: #495057;
    color: #fff;
    border-left: 4px solid #0d6efd;
  }
  .navbar-brand {
    font-weight: 700;
    color: #0d6efd !important;
  }
  .card-icon {
    font-size: 2.5rem;
    color: #0d6efd;
  }
</style>
</head>
<body>
<div class="d-flex">
  <nav class="sidebar flex-shrink-0 p-3">
    <a href="#" class="navbar-brand mb-4 text-center">Admin Panel</a>
    <a href="#" class="active">Dashboard</a>
    <a href="{{ route('admin.passengers') }}">Passengers</a>
    <a href="{{ route('admin.flights') }}">Flights</a>
    <a href="{{ route('admin.bookings') }}">Bookings</a>
    <a href="#">Settings</a>
    <a href="{{ route('login') }}" title="logout">Logout</a>
  </nav>

  <div class="flex-grow-1 p-4">
    <h1 class="mb-4">Welcome, Admin!</h1>

    <div class="row g-4 mb-4">
      <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <div class="card-icon mb-2">&#128100;</div>
            <h5 class="card-title">Total Users</h5>
        <p>{{ $passengerCount }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <div class="card-icon mb-2">&#9992;&#65039;</div>
            <h5 class="card-title">Flights</h5>
    <p class="card-text fs-4">{{ $flightCount }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <div class="card-icon mb-2">&#128179;</div>
            <h5 class="card-title">Revenue</h5>
    <p>${{ number_format($totalPayments, 2) }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <div class="card-icon mb-2">&#128221;</div>
            <h5 class="card-title">Bookings</h5>
        <p>{{ $bookingCount }}</p>
          </div>
        </div>
      </div>
    </div>

    <h3>Recent Bookings</h3>
    <table class="table table-striped mt-3 shadow-sm">
      <thead>
        <tr>
          <th>Booking ID</th>
          <th>User</th>
          <th>Flight</th>
          <th>Date</th>
          <th>Status</th>
          <th>Payment</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>#B1001</td>
          <td>Ahmed Ali</td>
          <td>NYC to LAX</td>
          <td>2025-06-10</td>
          <td><span class="badge bg-success">Confirmed</span></td>
          <td>Paid</td>
        </tr>
        <tr>
          <td>#B1002</td>
          <td>Sarah Mohamed</td>
          <td>LA to Tokyo</td>
          <td>2025-06-09</td>
          <td><span class="badge bg-warning text-dark">Pending</span></td>
          <td>Pending</td>
        </tr>
        <tr>
          <td>#B1003</td>
          <td>Omar Hassan</td>
          <td>Dubai to Paris</td>
          <td>2025-06-08</td>
          <td><span class="badge bg-danger">Cancelled</span></td>
          <td>Refunded</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>