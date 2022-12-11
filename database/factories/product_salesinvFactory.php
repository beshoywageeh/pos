<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product_salesinv>
 */
class product_salesinvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /*            $table->bigInteger('salesinv_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('quantity')->default(1); */
        return [
            'salesinv_id' => fake()->numberBetween('1', '300'),
            'product_id' => fake()->numberBetween('1', '100'),
            'quantity' => fake()->numberBetween('1', '50')
        ];
    }
}
