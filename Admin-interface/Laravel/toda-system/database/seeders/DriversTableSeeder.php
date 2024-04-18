<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 10 drivers
        for ($i = 1; $i <= 10; $i++) {
            Driver::create([
                'name' => 'Driver ' . $i,
                'license_number' => 'DL' . $i,
                'contact_number' => '+63912345678' . $i,
                'plate_number' => 'TN' . $i,
                'model' => 'Model ' . $i,
            ]);
        }
    }
}
