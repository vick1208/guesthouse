<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(3)->create();
        User::create([
            'name' => 'Superadmin',
            'email'=>'super@gmail.com',
            'password'=>bcrypt('test1234'),
            'role' => 'Super',
        ]);
        User::factory(10)->create();
    }
}
