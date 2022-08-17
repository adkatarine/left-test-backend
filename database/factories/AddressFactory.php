<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => rand(1, 10),
            'cep' => $this->faker->postcode,
            'state' => $this->faker->stateAbbr                           ,
            'city' => $this->faker->city,
            'neighborhood' => $this->faker->state,
            'street' => $this->faker->streetName,
            'number' => $this->faker->numberBetween(0, 50),
            'complement' => $this->faker->text(50),
        ];
    }
}
