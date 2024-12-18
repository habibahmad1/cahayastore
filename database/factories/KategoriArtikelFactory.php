<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriArtikel>
 */
class KategoriArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Default definition
            'nama' => $this->faker->word,
            'slug' => $this->faker->slug,
        ];
    }

    // State for Tutorial category
    public function tutorial()
    {
        return $this->state(function (array $attributes) {
            return [
                'nama' => 'Tutorial',
                'slug' => 'tutorial',
            ];
        });
    }

    // State for Informasi category
    public function informasi()
    {
        return $this->state(function (array $attributes) {
            return [
                'nama' => 'Informasi',
                'slug' => 'informasi',
            ];
        });
    }

    // State for Personal category
    public function personal()
    {
        return $this->state(function (array $attributes) {
            return [
                'nama' => 'Personal',
                'slug' => 'personal',
            ];
        });
    }

    // State for Bebas category
    public function random()
    {
        return $this->state(function (array $attributes) {
            return [
                'nama' => 'Random',
                'slug' => 'random',
            ];
        });
    }
}
