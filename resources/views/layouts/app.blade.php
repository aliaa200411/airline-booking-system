<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Flight Booking System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            @if(request()->routeIs('home'))
            <nav>
                <ul class="flex space-x-10 text-gray-700 items-center">
                    <li>
                        <a href="{{ route('flights.index') }}" class="flex items-center gap-3 text-lg font-semibold hover:text-blue-600">
                            <i class="bi bi-airplane-engines text-3xl"></i>
                            Show Flights
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('flights.create') }}" class="flex items-center gap-3 text-lg font-semibold hover:text-blue-600">
                            <i class="bi bi-plus-circle-fill text-3xl"></i>
                            Create Flights
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('passenger.dashboard') }}" class="flex items-center gap-3 text-lg font-semibold hover:text-blue-600">
                            <i class="bi bi-speedometer2 text-3xl"></i>
                            Dashboard
                        </a>
                    </li>
                </ul>
            </nav>
            @endif
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Flight Booking System. All rights reserved.
        </div>
    </footer>
@stack('scripts')

</body>
</html>
