<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientOrder>
 */
class ClientOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => rand(1, 15),
            'product_id' => rand(1, 20),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
