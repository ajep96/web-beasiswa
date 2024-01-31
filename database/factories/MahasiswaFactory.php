<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'     => fake()->name(),
            'nim'      => fake()->unique()->numerify('2010####'),
            'email'    => fake()->unique()->safeEmail(),
            'no_hp'    => fake()->numerify('08##########'),
            'ipk'      => fake()->randomFloat(4, 0, 4),
        ];
    }
}
