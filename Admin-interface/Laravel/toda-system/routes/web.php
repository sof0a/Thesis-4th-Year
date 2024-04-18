<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AnalyticsController;
use App\Models\Admin;
use App\Models\Transaction;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/analytics', function () {
//     return view('layouts.analytics');
// });

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});


Route::get('/analytics', [AnalyticsController::class, 'analytics'])->name('layouts.analytics');
Route::get('/analytics/passengers-per-day', [AnalyticsController::class, 'passengersPerDay'])->name('analytics.passengers_per_day');
Route::get('/analytics/toda_profit_per_day', [AnalyticsController::class, 'dailyTODAProfit'])->name('analytics.toda_profit_per_day');

Route::get('/analytics/passenger_graph', [TransactionController::class, 'index'])->name('analytics.passenger_graph');
// Route::get('/analytics/passenger_graph/count', [TransactionController::class, 'countTransactions'])->name('analytics.passenger_graph');
// Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
// 'name of route',   [className, functionName]










// 'name of route',   [className, functionName]
// Using Array with Class and Method:
// Route::get('/dashboard', [AdminController::class, 'index'])->name('users.index');

// Using Controller Action String:
// Route::get('/admins', 'AdminController@index')->name('admins.index');


// Admin Routes
// Route::get('/admins', 'AdminController@index')->name('admins.index');
// Route::get('/admins/create', 'AdminController@create')->name('admins.create');
// Route::post('/admins', 'AdminController@store')->name('admins.store');
// Route::get('/admins/{id}', 'AdminController@show')->name('admins.show');
// Route::get('/admins/{id}/edit', 'AdminController@edit')->name('admins.edit');
// Route::put('/admins/{id}', 'AdminController@update')->name('admins.update');
// Route::delete('/admins/{id}', 'AdminController@destroy')->name('admins.destroy');

// // Driver Routes
// Route::get('/drivers', 'DriverController@index')->name('drivers.index');
// Route::get('/drivers/create', 'DriverController@create')->name('drivers.create');
// Route::post('/drivers', 'DriverController@store')->name('drivers.store');
// Route::get('/drivers/{id}', 'DriverController@show')->name('drivers.show');
// Route::get('/drivers/{id}/edit', 'DriverController@edit')->name('drivers.edit');
// Route::put('/drivers/{id}', 'DriverController@update')->name('drivers.update');
// Route::delete('/drivers/{id}', 'DriverController@destroy')->name('drivers.destroy');

// // Tricycle Routes
// Route::get('/tricycles', 'TricycleController@index')->name('tricycles.index');
// Route::get('/tricycles/create', 'TricycleController@create')->name('tricycles.create');
// Route::post('/tricycles', 'TricycleController@store')->name('tricycles.store');
// Route::get('/tricycles/{id}', 'TricycleController@show')->name('tricycles.show');
// Route::get('/tricycles/{id}/edit', 'TricycleController@edit')->name('tricycles.edit');
// Route::put('/tricycles/{id}', 'TricycleController@update')->name('tricycles.update');
// Route::delete('/tricycles/{id}', 'TricycleController@destroy')->name('tricycles.destroy');

// // Transaction Routes
// Route::get('/transactions', 'TransactionController@index')->name('transactions.index');
// Route::get('/transactions/create', 'TransactionController@create')->name('transactions.create');
// Route::post('/transactions', 'TransactionController@store')->name('transactions.store');
// Route::get('/transactions/{id}', 'TransactionController@show')->name('transactions.show');
// Route::get('/transactions/{id}/edit', 'TransactionController@edit')->name('transactions.edit');
// Route::put('/transactions/{id}', 'TransactionController@update')->name('transactions.update');
// Route::delete('/transactions/{id}', 'TransactionController@destroy')->name('transactions.destroy');

// // Passenger Routes
// Route::get('/passengers', 'PassengerController@index')->name('passengers.index');
// Route::get('/passengers/create', 'PassengerController@create')->name('passengers.create');
// Route::post('/passengers', 'PassengerController@store')->name('passengers.store');
// Route::get('/passengers/{id}', 'PassengerController@show')->name('passengers.show');
// Route::get('/passengers/{id}/edit', 'PassengerController@edit')->name('passengers.edit');
// Route::put('/passengers/{id}', 'PassengerController@update')->name('passengers.update');
// Route::delete('/passengers/{id}', 'PassengerController@destroy')->name('passengers.destroy');






// // Admin Routes
// Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
// Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
// Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
// Route::get('/admins/{id}', [AdminController::class, 'show'])->name('admins.show');
// Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
// Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admins.update');
// Route::delete('/admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');

// // Driver Routes
// Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
// Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
// Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');
// Route::get('/drivers/{id}', [DriverController::class, 'show'])->name('drivers.show');
// Route::get('/drivers/{id}/edit', [DriverController::class, 'edit'])->name('drivers.edit');
// Route::put('/drivers/{id}', [DriverController::class, 'update'])->name('drivers.update');
// Route::delete('/drivers/{id}', [DriverController::class, 'destroy'])->name('drivers.destroy');

// // Tricycle Routes
// Route::get('/tricycles', [TricycleController::class, 'index'])->name('tricycles.index');
// Route::get('/tricycles/create', [TricycleController::class, 'create'])->name('tricycles.create');
// Route::post('/tricycles', [TricycleController::class, 'store'])->name('tricycles.store');
// Route::get('/tricycles/{id}', [TricycleController::class, 'show'])->name('tricycles.show');
// Route::get('/tricycles/{id}/edit', [TricycleController::class, 'edit'])->name('tricycles.edit');
// Route::put('/tricycles/{id}', [TricycleController::class, 'update'])->name('tricycles.update');
// Route::delete('/tricycles/{id}', [TricycleController::class, 'destroy'])->name('tricycles.destroy');

// // Transaction Routes
// Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
// Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
// Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
// Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
// Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
// Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
// Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

// // Passenger Routes
// Route::get('/passengers', [PassengerController::class, 'index'])->name('passengers.index');
// Route::get('/passengers/create', [PassengerController::class, 'create'])->name('passengers.create');
// Route::post('/passengers', [PassengerController::class, 'store'])->name('passengers.store');
// Route::get('/passengers/{id}', [PassengerController::class, 'show'])->name('passengers.show');
// Route::get('/passengers/{id}/edit', [PassengerController::class, 'edit'])->name('passengers.edit');
// Route::put('/passengers/{id}', [PassengerController::class, 'update'])->name('passengers.update');
// Route::delete('/passengers/{id}', [PassengerController::class, 'destroy'])->name('passengers.destroy');








?>
