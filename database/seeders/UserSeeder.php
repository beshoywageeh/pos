<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
           'name'=>'Admin',
           'email'=>'admin@admin.com',
           'password'=>Hash::make('123456'),
        ]);
    }
}
