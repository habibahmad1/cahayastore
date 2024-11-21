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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->string('nama_produk');
            $table->string('slug')->unique();
            $table->string('kode_produk')->nullable();
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->integer('stok')->default(10);
            $table->string('gambar')->nullable();
            $table->float('berat')->nullable();
            $table->string('dimensi')->nullable();
            $table->integer('diskon')->default(0);
            $table->string('status')->default('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
