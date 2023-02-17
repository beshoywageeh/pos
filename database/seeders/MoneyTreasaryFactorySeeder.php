<?php

namespace Database\Seeders;

use App\Models\MoneyTreasary;
use Illuminate\Database\Seeder;

class MoneyTreasaryFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MoneyTreasary::factory()->count(1000)->create();
    }
}
