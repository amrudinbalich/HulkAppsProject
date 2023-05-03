<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movies;
use Database\Factories\MoviesFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seeding the Users table with two users
     */
    public function run(): void
    {
        // inserting two unique users
        User::create([
            'username' => 'HulkApps',
            'email' => 'hulkapps@gmail.com',
            'password' => Hash::make('hulkie')
        ]);

        User::create([
            'username' => 'James',
            'email' => 'james12@gmail.com',
            'password' => Hash::make('lebron')
        ]);
        // running faker function to populate movies
        Movies::factory()->count(10)->create();


    }
}
