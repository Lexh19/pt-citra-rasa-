<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'price'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

