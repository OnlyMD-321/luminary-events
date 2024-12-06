<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    ClientController,
    EventController,
    EventCategoryController,
    EventReservationController,
    EventTypeController,
    FeedbackController,
    PayementController,
    VenueController,
    FCheckoutController,
    FMailController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', function () {
    return view('welcome');
});
// Route::post('/contact', [MailController::class, 'send'])->name('contact.mail');

// Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Back/dashboard');
    })->name('dashboard');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Clients
    Route::resource('clients', ClientController::class);

    // Events
    Route::resource('events', EventController::class);
    Route::resource('event-categories', EventCategoryController::class);
    Route::resource('event-reservations', EventReservationController::class);
    Route::resource('event-types', EventTypeController::class);

    // Venues
    Route::resource('venues', VenueController::class);

    // Feedback
    Route::resource('feedback', FeedbackController::class);

    // Payments
    Route::resource('payments', PayementController::class);

    // Checkout
    // Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    // Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
}
);
