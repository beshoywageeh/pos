<?php

namespace Database\Seeders;

use App\Models\product_salesinv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSalesSeederFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        product_salesinv::factory()->count(30000)->create();
    }
}
