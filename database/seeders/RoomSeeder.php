<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::factory(37)->create();
        // $price = [
        //     440000,
        //     660000,
        //     1980000,
        //     1100000,
        //     825000
        // ];

    }
}
