<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt(12345678),
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
        ];
    }
}
