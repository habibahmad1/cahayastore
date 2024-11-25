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
        $nama_produk = fake()->sentence(mt_rand(1,2));
        return [
            'kategori_id' => fake()->numberBetween(1, 3),
            'produk_variasi_id' => 1,
            'nama_produk' => $nama_produk,
            'slug' => $nama_produk.fake()->numberBetween(1, 3),
            'kode_produk' => 1,
            'deskripsi' => fake()->paragraph(mt_rand(2,4)),
            'harga' => fake()->numberBetween(10000, 100000),
            'stok' => fake()->numberBetween(1, 5),
            'gambar' => '1.png',
            'berat' => 1,
            'dimensi' => 30,
            'diskon' => 50,
            'status' => 'tersedia'
        ];
    }
}
