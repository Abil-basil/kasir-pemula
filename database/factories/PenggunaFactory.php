<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengguna>
 */
class PenggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Username' => fake()->name(),
            'Password' => bcrypt('password'),
            'Email' => fake()->unique()->safeEmail(),
            'Peran' => Arr::random(['Admin', 'Petugas'])
        ];
    }
}
