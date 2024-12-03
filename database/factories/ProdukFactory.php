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
        $nama_produk = fake()->sentence(mt_rand(1, 2));
        return [
            'kategori_id' => fake()->numberBetween(1, 3),
            'nama_produk' => $nama_produk,
            'slug' => $nama_produk . fake()->numberBetween(1, 3),
            'kode_produk' => 1,
            'deskripsi' => fake()->paragraph(mt_rand(2, 4)),
            'harga' => fake()->numberBetween(10000, 100000), // Tanpa desimal
            'stok' => fake()->numberBetween(1, 5),
            'gambar1' => 'gambar/noimg.png',
            'gambar2' => 'gambar/noimg.png',
            'gambar3' => 'gambar/noimg.png',
            'gambar4' => 'gambar/noimg.png',
            'gambar5' => 'gambar/noimg.png',
            'video' => 'video/testimoni.mp4',
            'berat' => 1,
            'dimensi' => 30,
            'diskon' => 50,
            'status' => 'tersedia'
        ];
    }
}
