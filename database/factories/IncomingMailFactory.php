<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IncomingMailFactory extends Factory
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
            "uuid" => $this->faker->uuid(),
            "number" => $this->faker->randomDigit(),
            "regarding" => $this->faker->text(100),
            "date" => $this->faker->dateTime(),
            "agency" => $this->faker->company()
        ];
    }
}
