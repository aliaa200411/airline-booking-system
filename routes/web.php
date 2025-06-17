<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\PassengerDashboardController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\AdminDashboardController;



Route::get('/admin/passengers', [PassengerController::class, 'index'])->name('admin.passengers');
Route::get('/', function () { return view('welcome');});
Route::get('/admin/flights', [FlightController::class, 'adminindex'])->name('admin.flights');
Route::middleware(['auth'])->group(function () {
    Route::get('/passenger/dashboard', [PassengerDashboardController::class, 'showflight'])
        ->name('passenger.dashboard');
});
Route::patch('/tickets/{ticket}/cancel', [\App\Http\Controllers\TicketController::class, 'cancel'])->name('tickets.cancel');
Route::get('/admin/bookings', [PassengerController::class, 'bookings'])->name('admin.bookings');

Route::get('password/email/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.email');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth:passenger')->group(function () {
    Route::get('/passenger/dashboard', function () {
        return view('passenger.dashboard');  
    })->name('passenger.dashboard');
});
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');

Route::middleware(['auth:passenger'])->group(function () {
    Route::get('/passenger/dashboard', [PassengerDashboardController::class, 'index'])->name('passenger.dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/flights/create', [FlightController::class, 'create'])->name('flights.create');
Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');
Route::post('/register', [RegisterController::class, 'registerSubmit'])->name('register.submit');
Route::get('/flights/{flight}', [FlightController::class, 'show'])->name('flights.show');
Route::get('/tickets/create/{flight}', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

Route::get('/payment/{ticket}', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment/{ticket}', [PaymentController::class, 'process'])->name('payment.process');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

