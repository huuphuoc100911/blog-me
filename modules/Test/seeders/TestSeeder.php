<?php

namespace Modules\Test\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('vi_VN');

        for ($i = 1; $i <= 2; $i++) {
            DB::table('test_seeders')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber(),
                'city' => $faker->city,
            ]);
        }
    }
}
