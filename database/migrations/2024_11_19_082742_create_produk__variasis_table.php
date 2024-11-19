<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk__variasis', function (Blueprint $table) {
            $table->id();
            $table->string('ukuran')->nullable(); // Ukuran produk
            $table->string('warna')->nullable(); // Warna produk
            $table->integer('stok')->default(0); // Stok varian
            $table->string('gambar')->nullable(); // Gambar varian
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk__variasis');
    }
};
