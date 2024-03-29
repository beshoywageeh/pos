<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\salesinv>
 */
class salesinvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            //   'id'=>fake()->unique()->numberBetween('1', '300'),
            'serial' => fake()->numberBetween('1', '300'),
            'inv_num' => 'LL-'.fake()->unique()->numberBetween('1', '300'),
            //'inv_manual' => fake()->unique()->numberBetween('1', '300'),
            'inv_date' => fake()->date('Y-m-d'),
            'client_id' => fake()->numberBetween('1', '100'),
            'user_id' => '1',
            'total' => fake()->numberBetween('1000', '9999'),
        ];
    }
}
