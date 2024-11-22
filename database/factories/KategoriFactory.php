<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama = $this->faker->randomElement(['kopi', 'sandal', 'lampu']); // Pilih nama secara acak

        return [
            'nama' => $nama, // Tetapkan nama
            'slug' => $nama, // Slug mengikuti nama
        ];
    }
}
