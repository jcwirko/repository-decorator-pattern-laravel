<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'patent' => $this->faker->uuid
        ];
    }
}
