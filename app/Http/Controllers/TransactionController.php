<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }


    public function store(Request $request)
{

    $validated = $request->validate([
        'customer_name' => 'required|string',
        'phone_number'  => 'required|string|unique:customers,phone',
        'vehicle_id'    => 'required|exists:vehicles,id',
    ]);

    $customer = Customer::firstOrCreate(
        ['phone' => $validated['phone_number']],
        ['name' => $validated['customer_name']]
    );


    $customer->increment('total_washes');

    $customer->refresh();

    $isFree = $customer->isEligibleForFreeService();

    $vehicle = Vehicle::findOrFail($validated['vehicle_id']);
    $vehicle->price = $isFree ? 0 : $vehicle->price;


    $transaction = Transaction::create([
        'customer_id' => $customer->id,
        'vehicle_id'  => $vehicle->id,
        'price'       => $vehicle->price,
        'is_free'     => $isFree,

    ]);


    $customer->increment('total_washes');


    return redirect()->route('transactions.index')->with([
        'isEligibleForFreeService' => $isFree,
        'message' => $isFree ? 'Selamat! Anda mendapatkan layanan gratis!' : 'Transaksi berhasil disimpan.'
    ]);
}
}
