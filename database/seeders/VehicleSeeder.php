<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::insert([
            ['type' => 'Motor di bawah 250cc', 'price' => 15000],
            ['type' => 'Motor di atas 250cc', 'price' => 30000],
            ['type' => 'Mobil pribadi', 'price' => 70000],
            ['type' => 'Minibus', 'price' => 150000],
        ]);
    }
}
