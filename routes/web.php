<?php

use App\Models\Vehicle;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {

    $vehicles = Vehicle::all();

    return view('welcome', [
        'vehicles'=> $vehicles
    ]);
});

// Route untuk CustomerController

Route::resource('transactions', TransactionController::class);




