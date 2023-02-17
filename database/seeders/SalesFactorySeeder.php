<?php

namespace Database\Seeders;

use App\Models\salesinv;
use Illuminate\Database\Seeder;

class SalesFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        salesinv::factory()->count(300)->create();
    }
}
