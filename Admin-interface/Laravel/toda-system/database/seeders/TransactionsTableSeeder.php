<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\Passenger;
use App\Models\Transaction;
use Faker\Factory as Faker;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // List of pickup points
        $pickupPoints = [
            'Gate 1', 'Gate 2', 'White 1', 'White 2', 'White 3', 'White 4', 'White 5',
            'Red 1', 'Red 2', 'Red 3', 'Red 4', 'Red 5', 'Magenta 1', 'Magenta 2', 'Magenta 3',
            'Magenta 4', 'Magenta 5', 'Magenta 6', 'Magenta 7', 'Magenta 8', 'Magenta 9', 'Blue 1',
            'Blue 2', 'Blue 3', 'Blue 4', 'Blue 5', 'Yellow 1', 'Yellow 2', 'Yellow 3', 'Yellow 4',
            'Yellow 5', 'Green 1', 'Green 2', 'Green 3', 'Green 4', 'Green 5', 'Orange 1', 'Orange 2',
            'Orange 3', 'Orange 4', 'Orange 5', 'Orange 6', 'Orange 7', 'Orange 8', 'Orange 9', 'Orange 10',
            'Orange 11', 'Orange 12', 'Orange 13', 'Orange 14', 'Orange 15', 'Orange 16', 'Orange 17',
            'Orange 18', 'Orange 19', 'Orange 20', 'Rainbow 1', 'Rainbow 2', 'Rainbow 3', 'Rainbow 4',
            'Rainbow 5', 'Rainbow 6', 'Rainbow 7', 'Rainbow 8', 'Rainbow 9', 'Rainbow 10', 'Rainbow 11',
            'Rainbow 12', 'Rainbow 13', 'Rainbow 14', 'Rainbow 15', 'Rainbow 16', 'Rainbow 17', 'Rainbow 18',
            'Rainbow 19', 'Rainbow 20', 'Rainbow 21', 'Rainbow 22', 'Rainbow 23', 'Rainbow 24', 'Rainbow 25',
            'Gray 1', 'Gray 2', 'Gray 3', 'Gray 4', 'Gray 5', 'Gray 6', 'Gray 7', 'Gray 8', 'Gray 9',
            'Purple 1', 'Purple 2', 'Purple 3', 'Purple 4', 'Purple 5', 'Purple 6', 'Purple 7', 'Purple 8',
            'Maroon 1', 'Maroon 2', 'Maroon 3', 'Maroon 4', 'Maroon 5', 'Fuschia 1', 'Fuschia 2', 'Fuschia 3',
            'Vermillion 1', 'Vermillion 2', 'Vermillion 3', 'Vermillion 4', 'Vermillion 5', 'Pink 1', 'Pink 2',
            'Pink 3', 'Pink 4'
        ];

        // Get 10 random drivers and passengers
        $drivers = Driver::inRandomOrder()->limit(10)->get();
        $passengers = Passenger::inRandomOrder()->limit(10)->get();

        // Loop to create 10 transactions
        for ($i = 1; $i <= 10; $i++) {
            $driver = $drivers->random();
            $passenger = $passengers->random();

            Transaction::create([
                'driver_id' => $driver->driver_id,
                'passenger_id' => $passenger->passenger_id,
                'date' => '2024-02-09', // Example date
                'fare_amount' => 100, // Example fare amount
                'landmark' => 'Example landmark',
                'notes' => 'Example notes',
                'status' => 'Completed', // Example status
                'pickup_point' => $pickupPoints[array_rand($pickupPoints)],
                'dropoff_point' => $pickupPoints[array_rand($pickupPoints)]
            ]);
        }
    }
}
