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
            $table->integer('harga');
            $table->integer('stok')->default(10);
            $table->string('gambar1');
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->string('gambar4')->nullable();
            $table->string('gambar5')->nullable();
            $table->string('video')->nullable();
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
