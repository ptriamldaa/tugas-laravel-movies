<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/*
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileFactory extends Factory
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
            'biodata' => $this->faker->paragraph(),
            'age' => $this->faker->numberBetween(5, 90),
            'address' => $this->faker->address(),
            'avatar' => $this->faker->imageUrl(100, 100, 'people'),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
