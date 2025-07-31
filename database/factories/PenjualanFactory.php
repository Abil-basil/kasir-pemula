<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penjualan>
 */
class PenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'TanggalPenjualan' => fake()->dateTimeBetween('-1 months', 'now'),
            'TotalHarga' => fake()->numberBetween(100000, 200000),
            'PenggunaID' => Pengguna::factory(),
            'PelangganID' => Pelanggan::factory()
        ];
    }
}
