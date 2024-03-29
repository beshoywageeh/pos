<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([UserSeeder::class, SettingsSeeder::class, CountrySeeder::class, CategoryFactorySeeder::class,
            ProductFactorySeeder::class,
            ClientFactorySeeder::class,
            SalesFactorySeeder::class,
            ProductsSalesSeederFactory::class,
            MoneyTreasaryFactorySeeder::class,
            /*
            5- product in sales
            */
        ]);
    }
}
