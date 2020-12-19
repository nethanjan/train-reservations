<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@solomoIt.com',
            'password' => Hash::make('password'),
            'created_at' => '2020-12-19 00:38:41',
            'updated_at' => '2020-12-19 00:38:41',
        ]);
    }
}
