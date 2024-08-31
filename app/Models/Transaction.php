<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    protected $fillable = ['customer_id', 'vehicle_id', 'price'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $transactionCount = Transaction::where('customer_id', $transaction->customer_id)->count();

            if (($transactionCount + 1) % 5 == 0) {
                $transaction->price = 0; // Gratis cuci untuk transaksi ke-5
            } else {
                $transaction->price = Vehicle::find($transaction->vehicle_id)->price;
            }
        });
    }
}
