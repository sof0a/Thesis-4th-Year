<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Passenger;

class PassengersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 10 passengers
        for ($i = 1; $i <= 10; $i++) {
            Passenger::create([
                'name' => 'Passenger ' . $i,
                'contact_number' => '+63998765432' . $i,
            ]);
        }
    }
}
