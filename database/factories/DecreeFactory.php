<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DecreeFactory extends Factory
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
            "employee_id" => $this->faker->numberBetween(1, 10),
            "uuid" => $this->faker->uuid(),
            "number" => null,
            "regarding" => $this->faker->text(100),
            "disposition" => $this->faker->name() . '|' . $this->faker->jobTitle(),
            "date" => $this->faker->dateTimeBetween('-3 week', 'now'),
            "file" => 'kosong'
        ];
    }
}
