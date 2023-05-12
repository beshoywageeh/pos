<?php

namespace Database\Factories;

use App\Models\salesinv;
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
        $sales_inv = salesinv::all(['id']);
        foreach ($sales_inv as $code) {
            return [
                'salesinv_id' => $code,
                'product_barcode' => fake()->numberBetween('1', '100'),
                'quantity' => fake()->numberBetween('1', '50'),
            ];
        }
    }
}
