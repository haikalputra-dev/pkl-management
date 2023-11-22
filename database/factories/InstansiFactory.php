<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instansi>
 */
class InstansiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_instansi' => fake()->name(),
            'npsn' => fake()->randomDigit(12),
            'jenis_sekolah' => fake()->randomElement(['negeri','swasta']),
            'alamat' => fake()->address(),
            'telepon' => fake()->phoneNumber(10),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
