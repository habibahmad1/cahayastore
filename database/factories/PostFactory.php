<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul = $this->faker->sentence(mt_rand(2, 7));
        $slug = Str::slug($judul);
        // $artikelPost = ; // Menghasilkan beberapa paragraf sebagai satu string

        // Memisahkan teks menjadi paragraf
        // $paragraf = explode("\n\n", $artikelPost);

        // Mengambil dua paragraf pertama
        // $excerpt = implode("\n\n", array_slice($paragraf, 0, 2));

        return [
            "judul" => $judul,
            "slug" => $slug,
            "excerpt" => $this->faker->paragraph(mt_rand(5, 6)),
            "body" => collect($this->faker->paragraphs(mt_rand(10, 20)))
                ->map(fn($p) => "<p>$p</p>")
                ->implode(''), // Menggunakan $artikelPost asli untuk artikel lengkap
            "kategoripost_id" => mt_rand(1, 4),
            "user_id" => mt_rand(1, 6)
        ];
    }
}
