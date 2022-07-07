<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => 1,
            "nip" => $this->faker->numberBetween(10000000, 20000000),
            "nik" => $this->faker->numberBetween(10000000, 20000000),
            "name" => $this->faker->name(),
            "position" => $this->faker->jobTitle()
        ];
    }
}
