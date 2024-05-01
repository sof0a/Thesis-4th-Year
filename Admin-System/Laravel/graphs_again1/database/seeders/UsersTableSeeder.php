<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User 0',
            'email' => 'user0@example.com',
            'password' => bcrypt('password'),
        ]);

        // Loop to create 10 users
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'User ' .$i,
                'email' => 'user' .$i .'@example.com',
                'password' => bcrypt('password'.$i),
            ]);
        }
    }
}
