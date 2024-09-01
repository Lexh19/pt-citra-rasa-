<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone_number', 'total_washes'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Cek apakah customer berhak mendapatkan layanan gratis
    public function isEligibleForFreeService()
    {
        return $this->total_washes > 0 && $this->total_washes % 5 == 0;
    }
}
