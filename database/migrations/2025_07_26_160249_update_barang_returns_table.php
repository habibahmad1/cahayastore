<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang_returns', function (Blueprint $table) {
            // Hapus kolom
            $table->dropColumn([
                'video_bukti',
                'apakah_cargo',
                'status_return',
                'status_barang'
            ]);

            // Tambah kolom
            $table->integer('jumlah_keluar')->nullable();
            $table->string('nomor_resi_keluar')->nullable();
            $table->date('tanggal_keluar')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('barang_returns', function (Blueprint $table) {
            // Kembalikan kolom yang dihapus
            $table->string('video_bukti')->nullable();
            $table->enum('apakah_cargo', ['Ya', 'Tidak'])->nullable();
            $table->enum('status_return', ['Selesai', 'Belum Selesai'])->nullable();
            $table->enum('status_barang', ['Barang Masih Ada', 'Barang Sudah Terpakai'])->nullable();

            // Hapus kolom yang baru ditambahkan
            $table->dropColumn(['jumlah_keluar', 'nomor_resi_keluar', 'tanggal_keluar']);
        });
    }
};
