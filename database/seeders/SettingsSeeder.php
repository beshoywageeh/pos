<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        $data = [
            ['key' => 'name', 'value' => 'Loop Labs'],
            ['key' => 'phone', 'value' => '01201026745'],
            ['key' => 'photo', 'value' => 'default.png'],
            ['key' => 'address', 'value' => '11'],
            ['key' => 'slogan', 'value' => 'LL'],
        ];
        DB::table('settings')->insert($data);
    }
}
