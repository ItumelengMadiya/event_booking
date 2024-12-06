<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\OrganizerEventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');


    Route::resource('users', AdminUserController::class);

    Route::resource('events', AdminEventController::class);
});
Route::middleware(['role:user'])->group(function () {

    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');


    Route::match(['get', 'post'], '/events/{event}/book', [BookingController::class, 'store'])
        ->name('booking.store')
        ->where('event', '[0-9]+');


    Route::get('/user/bookings', [BookingController::class, 'history'])->name('user.bookings');


    Route::match(['get', 'post'], '/bookings/{booking}/cancel', [BookingController::class, 'cancel'])
        ->name('booking.cancel')
        ->where('booking', '[0-9]+');


    Route::get('/payment/{booking}/create', [PaymentController::class, 'createPaymentIntent'])
        ->name('payment.create')
        ->where('booking', '[0-9]+');

    Route::match(['get', 'post'], '/payment/success', [PaymentController::class, 'paymentSuccess'])
        ->name('payment.success');

    Route::match(['get', 'post'], '/payment/failure', [PaymentController::class, 'paymentFailure'])
        ->name('payment.failure');
});


Route::middleware(['role:organizer'])->group(function () {
    Route::get('/organizer/dashboard', [OrganizerController::class, 'index'])->name('organizer.dashboard');
    Route::get('/organizer/events', [OrganizerEventController::class, 'index'])->name('organizer.events.index');
    Route::get('/organizer/events/create', [OrganizerEventController::class, 'create'])->name('organizer.events.create');
    Route::post('/organizer/events', [OrganizerEventController::class, 'store'])->name('organizer.events.store');
    Route::get('/organizer/events/{event}/edit', [OrganizerEventController::class, 'edit'])
        ->name('organizer.events.edit')
        ->where('event', '[0-9]+');

    Route::put('/organizer/events/{event}', [OrganizerEventController::class, 'update'])
        ->name('organizer.events.update')
        ->where('event', '[0-9]+');

    Route::delete('/organizer/events/{event}', [OrganizerEventController::class, 'destroy'])
        ->name('organizer.events.destroy')
        ->where('event', '[0-9]+');
});



