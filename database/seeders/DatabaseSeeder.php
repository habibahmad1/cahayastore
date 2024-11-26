<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        Produk::factory(50)->create();

        // Kategori::factory(5)->create();

        Kategori::factory()->create([
            'nama' => 'Sandal',
            'slug' => 'sandal',
        ]);
        Kategori::factory()->create([
            'nama' => 'Kopi',
            'slug' => 'kopi',
        ]);
        Kategori::factory()->create([
            'nama' => 'Lampu',
            'slug' => 'lampu',
        ]);

    }
}
