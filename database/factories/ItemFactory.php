<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'price' => fake()->randomNumber(),
            'description' => fake()->paragraph(),
            'category_id' => "1",
            'owner_id' => "1",
            'photo' => "item.jpg",
        ];
    }
}
