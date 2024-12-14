<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\KategoriPost;
use App\Models\User;
use App\Models\Post;
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

        Produk::factory(20)->create();

        // Kategori::factory(5)->create();

        User::factory()->create([
            'name' => 'habibahmad',
            'username' => 'habibahmad213',
            'email' => 'habibahmad2597@gmail.com',
            'password' => 123,
            'is_admin' => true,
        ]);

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

        KategoriPost::factory()->tutorial()->create();
        KategoriPost::factory()->informasi()->create();
        KategoriPost::factory()->personal()->create();
        KategoriPost::factory()->random()->create();

        Artikel::factory(20)->create();
    }
}
