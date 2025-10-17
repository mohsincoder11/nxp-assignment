<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProviderFactory extends Factory
{
    protected $model = \App\Models\Provider::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->companyEmail,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
   
}
