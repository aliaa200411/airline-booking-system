<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Flight::query();

        if ($request->has('origin') && $request->origin) {
            $query->where('origin', 'like', '%' . $request->origin . '%');
        }

        if ($request->has('destination') && $request->destination) {
            $query->where('destination', 'like', '%' . $request->destination . '%');
        }

        $flights = $query->orderBy('departure_time', 'asc')->get();

        return view('flights.index', compact('flights'));
    }
    public function adminIndex()
{
    $flights = Flight::all();
    return view('admin.flights.index', compact('flights'));
}
    
    public function create()
    {
        return view('flights.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required|string|max:10',
            'origin' => 'required|string|max:100',
            'destination' => 'required|string|max:100',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
        ]);

        Flight::create($request->all());

        return redirect()->route('flights.index')->with('success', 'Flight created successfully.');
    }

    
        public function show($id)
    {
        $flight = Flight::with(['originAirport', 'destinationAirport'])->findOrFail($id);
        return view('flights.show', compact('flight'));
    }

    public function edit(string $id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.edit', compact('flight'));
    }

    
    public function update(Request $request, string $id)
    {
        $flight = Flight::findOrFail($id);

        $request->validate([
            'flight_number' => 'required|string|max:10',
            'origin' => 'required|string|max:100',
            'destination' => 'required|string|max:100',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
        ]);

        $flight->update($request->all());

        return redirect()->route('flights.index')->with('success', 'Flight updated successfully.');
    }

    
    public function destroy(string $id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('flights.index')->with('success', 'Flight deleted successfully.');
    }
}
