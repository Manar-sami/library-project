<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Library;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         'title' => $this->faker->sentence(3),

        'library_id' => Library::inRandomOrder()->first()->id ?? Library::factory(),
        'price' => $this->faker->randomFloat(2, 5, 100),
        'cover_path' => null,
        ];
    }
}
