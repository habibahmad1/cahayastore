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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->foreignId('variasi_id')->nullable()->constrained('produk_variasis')->onDelete('set null');
            $table->string('platform');
            $table->integer('qty');
            $table->string('host');
            $table->string('jamlive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};
