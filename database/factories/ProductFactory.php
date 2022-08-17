<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->url(),
            'category_id' => rand(1, 10),
            'quantity_stock' => $this->faker->numberBetween(0, 50),
            'price' => $this->faker->numberBetween($min = 10, $max = 300),
        ];
    }
}
