<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
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
            'name' => ['ar' => fake()->unique()->name(), 'en' => fake()->unique()->name()],
            'barcode' => fake()->unique()->randomNumber(),
            'opening_balance' => fake()->numberBetween('1', '100'),
            'purchase_price' => fake()->numberBetween('100', '1000'),
            'sales_price' => fake()->numberBetween('1000', '2000'),
            'sales_unit' => fake()->name(),
            'purchase_unit' => fake()->name(),
            'category_id' => fake()->numberBetween('1', '10'),
        ];
    }
}
