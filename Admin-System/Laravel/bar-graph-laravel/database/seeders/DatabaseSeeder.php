<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DummyData;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Loop to create 10 users
        for ($i = 1; $i <= 10; $i++) {
            DummyData::create([
                'name' => 'User ' . $i,
                'date' => '2024-02-09', 
                'profit' => 50000,
                'status' => 1,
            ]);
        }

        
    }
}
