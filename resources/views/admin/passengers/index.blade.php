@extends('layouts.app')

@section('content')
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
        font-weight: 600;
        color: #2c2c2c;
        font-size: 0.95rem;
    }

    thead {
        background-color: #343a40;
        color: #fff;
        font-weight: 700;
    }

    tbody tr:hover {
        background-color: #e9ecef;
    }

    .btn-outline-secondary {
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        display: block;
        max-width: 200px;
        margin: 30px auto 0;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }
</style>

<div class="container mt-4">
    <h2>Passengers List</h2>
    <table class="table table-bordered table-striped shadow-sm align-middle text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($passengers as $passenger)
            <tr>
                <td>{{ $passenger->id }}</td>
                <td>{{ $passenger->full_name }}</td>
                <td>{{ $passenger->email }}</td>
                <td>{{ $passenger->phone }}</td>
                <td>{{ $passenger->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        ← Back to Dashboard
    </a>
</div>
@endsection
