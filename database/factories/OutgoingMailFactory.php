<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OutgoingMailFactory extends Factory
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
            "code" => $this->faker->numberBetween(1000, 9999),
            "regarding" => $this->faker->text(100),
            "date" => $this->faker->dateTimeBetween('-3 week', 'now'),
            "agency" => $this->faker->company(),
            "file" => 'kosong'
        ];
    }
}
