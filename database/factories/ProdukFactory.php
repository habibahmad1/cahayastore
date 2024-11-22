<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori_id' => fake()->numberBetween(1, 3),
            'produk_variasi_id' => 1,
            'nama_produk' => fake()->sentence(mt_rand(1,2)),
            'slug' => fake()->name(),
            'kode_produk' => 1,
            'deskripsi' => fake()->paragraph(mt_rand(2,4)),
            'harga' => fake()->numberBetween(10000, 100000),
            'stok' => fake()->numberBetween(1, 5),
            'gambar' => 'contoh.jpg',
            'berat' => 1,
            'dimensi' => 30,
            'diskon' => 50,
            'status' => 'tersedia'
        ];
    }
}
