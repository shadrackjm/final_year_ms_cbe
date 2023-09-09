<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'regno' => fake()->name(),
          'fname' => fake()->name(),
          'mname' => fake()->name(),
          'lname' => fake()->name(),
          'level' => fake()->name(),
          'email' => fake()->safeEmail(),
          'phone' => fake()->integer(),
        ];
    }
}
