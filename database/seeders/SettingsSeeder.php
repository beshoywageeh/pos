<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('settings')->insert([
            'name'=>'Loop Labs',
            'phone'=>'01201026745',
            'photo'=>'default.png',
            'address'=>'12'
        ]);
    }
}
