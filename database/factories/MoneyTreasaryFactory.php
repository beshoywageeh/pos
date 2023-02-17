<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoneyTreasary>
 */
class MoneyTreasaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => fake()->numberBetween('1', '100'),
            'user_id' => '1',
            'num' => fake()->unique()->randomNumber(),
            'type' => fake()->numberBetween('1', '2'),
            'payed_at' => fake()->date('Y-m-d'),
            'debit' => fake()->numberBetween('1000', '9999'),
            'created_at' => \Carbon\Carbon::now(),
        ];
    }
}
