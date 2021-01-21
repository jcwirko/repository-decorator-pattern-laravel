<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Diego',
            'last_name' => 'Perez',
            'email' => 'diegoperez@gmail.com'
        ]);

        User::create([
            'first_name' => 'Alonso',
            'last_name' => 'Diego',
            'email' => 'diegoalonso@gmail.com'
        ]);

        User::factory()->times(10000)->create();
    }
}
