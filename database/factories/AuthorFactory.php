<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

        'code' => $this->faker->unique()->bothify('AUTH###'),
            
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'country' => $this->faker->country(),
        'password' => Hash::make('password'), 
        'books_count' => 0,
        ];
    }
}
