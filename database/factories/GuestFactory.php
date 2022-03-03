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
            'nik' => $this->faker->unique()->nik(),
            'name' => $this->faker->name(),
            'address'=>$this->faker->address(),
            'telephone'=> $this->faker->phoneNumber(),
            'email'=>$this->faker->unique()->freeEmail(),
            'job'=>$this->faker->jobTitle(),
            'user_id'=> mt_rand(1,3)
        ];
    }
}
