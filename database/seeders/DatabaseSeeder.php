<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\KategoriArtikel;
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

        // Produk::factory(30)->create();

        // Kategori::factory(5)->create();

        User::factory()->create([
            'name' => 'habibahmad',
            'username' => 'habibahmad213',
            'email' => 'habibahmad2597@gmail.com',
            'password' => 123,
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'maki',
            'username' => 'maki08',
            'email' => 'cadangmaky@gmail.com',
            'password' => 88888888,
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
        Kategori::factory()->create([
            'nama' => 'Playmat',
            'slug' => 'playmat',
        ]);

        KategoriArtikel::factory()->tutorial()->create();
        KategoriArtikel::factory()->informasi()->create();
        KategoriArtikel::factory()->personal()->create();
        KategoriArtikel::factory()->sharing()->create();
        KategoriArtikel::factory()->random()->create();

        Artikel::factory(20)->create();
    }
}
