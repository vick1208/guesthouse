<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $price = array(
            440000,
            660000,
            1980000,
            1100000,
            825000

        );
        static $order = 100;
        return [
            'type_id' => Type::all()->random()->id,
            'room_status_id' => '1',
            'number' => $order++,
            'price' => $this->faker->randomElement($price),
            'view' => $this->faker->paragraph(35)
        ];
    }
}
