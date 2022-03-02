<?php

namespace Database\Factories;

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
            'nik' => $this->faker->nik(),
            'name' => $this->faker->name(),
            'address'=>$this->faker->address(),
            'telephone'=> $this->faker->phoneNumber(),
            'email'=>$this->faker->freeEmail(),
            'job'=>$this->faker->jobTitle(),
            'user_id'=> 1
        ];
    }
}
