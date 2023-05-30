<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ['ar' => fake()->unique()->name(), 'en' => fake()->unique()->name()],
            'phone' => fake()->phoneNumber(),
            'code' => fake()->unique()->randomNumber(),
            'country_id' => fake()->numberBetween('1', '300'),
            'balance' => fake()->numberBetween('1000', '1000000'),
            'address' => fake()->unique()->address(),
        ];
    }
}
