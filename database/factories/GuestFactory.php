<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'nationality' => $this->faker->country,
            'gender' => $this->faker->randomElement(['Pria', 'Wanita']),
            'job' => $this->faker->jobTitle,
            'birthdate' => $this->faker->date()
        ];
    }
}
