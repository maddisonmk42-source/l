<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProfileController;

use App\Models\Car;
use App\Models\Circuit;
use App\Models\Driver;
use App\Models\Team;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $totalCars = Car::count();
    $totalDrivers = Driver::count();
    $totalTeams = Team::count();
    $totalCircuits = Circuit::count();

    return view('dashboard', compact(
        'totalCars',
        'totalDrivers',
        'totalTeams',
        'totalCircuits'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('cars', CarController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('circuits', CircuitController::class);
    Route::resource('schedules', ScheduleController::class);

});

require __DIR__.'/auth.php';