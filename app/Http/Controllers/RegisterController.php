<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Passenger;

class RegisterController extends Controller
{
    public function registerSubmit(Request $request)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string|max:20',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|in:male,female,other',
        'passport_number' => 'nullable|string|max:50',
        'password' => 'required|confirmed|min:6',
    ]);

    $user = User::create([
        'name' => $request->full_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

     $passenger = Passenger::create([
        'user_id' => $user->id,
        'full_name' => $request->full_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'date_of_birth' => $request->date_of_birth ? date('Y-m-d', strtotime($request->date_of_birth)) : null,
        'gender' => $request->gender,
        'passport_number' => $request->passport_number,
        'password' => Hash::make($request->password),

    ]);

Auth::guard('passenger')->login($passenger);
return redirect()->route('passenger.dashboard')->with('success', 'Welcome! Account created and logged in.');
}

}
