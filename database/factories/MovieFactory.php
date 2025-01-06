<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/*
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'title' => $this->faker->sentence(),
            'synopsis' => $this->faker->paragraph(),
            'poster' => $this->faker->imageUrl(100, 200, 'Movies'),
            'year' => $this->faker->year(),
            'available' => $this->faker->boolean(),
            'genre_id' => Genre::inRandomOrder()->first()->id,
        ];
    }
}
