<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// include models

use App\Models\Movies;

class MoviesFactory extends Factory
{
    
    protected $model = Movies::class;

    public function definition(): array
    {
         return [
            'name' => $this->faker->sentence(),
            'genre' => $this->faker->word(),
            'created_in' => $this->faker->year(),
        ];
    }
}
