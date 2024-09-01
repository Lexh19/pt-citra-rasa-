<?php

use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    $transactions = Transaction::all();
    $customers = Customer::all();
    $vehicles = Vehicle::all();

    return view('welcome', [
        'transactions' => $transactions,
        'customers' => $customers,
        'vehicles' => $vehicles,
    ]);
});

Route::get('/transactions', [TransactionController::class, 'index']);
Route::post('/transactions', [TransactionController::class, 'store']);

