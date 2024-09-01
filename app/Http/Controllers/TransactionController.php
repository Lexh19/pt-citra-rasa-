<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
{
    $customer = Customer::firstOrCreate(['phone' => $request->phone], ['name' => $request->name]);

    $transaction = Transaction::create([
        'customer_id' => $customer->id,
        'vehicle_id' => $request->vehicle_id,
    ]);

    return response()->json(['message' => 'Transaction successful', 'transaction' => $transaction]);
}
 // Method untuk menampilkan daftar transaksi
public function index()
{
    // Mengambil semua transaksi beserta customer dan kendaraan
    $transactions = Transaction::with(['customer', 'vehicle'])->get();

    // Mengirim data transaksi ke view
    return view('transactions.index', compact('transactions'));
}

}
