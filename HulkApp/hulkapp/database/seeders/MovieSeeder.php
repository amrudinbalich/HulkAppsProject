<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movies;
use Database\Factories\MoviesFactory;

class MovieSeeder extends Seeder
{
    /**
     * Used Faker Function to populate movies table so I can show the content
     */
    public function run(): void
    {
        Movies::factory()->count(10)->create();
    }
}
