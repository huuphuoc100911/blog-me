<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            [
                'name' => 'Staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('123456'),
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
            ]
        ]);
    }
}
