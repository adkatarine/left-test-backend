<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['game', 'usage-tips', 'scientific-publication']),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'src' => $this->faker->url(),
        ];
    }
}
