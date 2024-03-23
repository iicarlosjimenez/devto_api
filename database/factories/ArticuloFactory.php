<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::get()->pluck('id');
        return [
            'user_id' => fake()->randomElement($users->toArray()),
            'title' => fake()->sentence,
            'content' => fake()->paragraph,
            'comments_count' => fake()->numberBetween(0, 100),
            'reactions_count' => fake()->numberBetween(0, 100),
            'reading_time_minutes' => fake()->numberBetween(1, 30)
        ];
    }
}
