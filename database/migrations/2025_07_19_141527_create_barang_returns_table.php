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
        Schema::create('barang_returns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_produk'); // Untuk display
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->foreignId('variasi_id')->nullable()->constrained('produk_variasis')->onDelete('set null');
            $table->date('tanggal_retur');
            $table->string('platform');
            $table->string('nomor_resi')->nullable();
            $table->string('ekspedisi');
            $table->enum('apakah_cargo', ['Ya', 'Tidak']);
            $table->enum('status_return', ['Selesai', 'Belum Selesai']);
            $table->integer('jumlah');
            $table->string('alasan_retur');
            $table->string('alasan_lainnya')->nullable();
            $table->enum('status_barang', ['Barang Masih Ada', 'Barang Sudah Terpakai']);
            $table->string('foto_bukti')->nullable();
            $table->string('video_bukti')->nullable();
            $table->text('catatan')->nullable(); // dari textarea
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_returns');
    }
};
