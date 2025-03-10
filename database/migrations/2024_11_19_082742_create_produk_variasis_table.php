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
        Schema::create('produk_variasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->nullable();
            $table->foreignId('warna_id')->nullable();
            $table->foreignId('ukuran_id')->nullable();
            $table->foreignId('gambar_id')->nullable();
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_variasis');
    }
};
