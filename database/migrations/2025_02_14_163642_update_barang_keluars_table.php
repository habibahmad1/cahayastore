<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            // Hapus foreign key sebelum menghapus kolom
            $table->dropForeign(['produk_id']);
            $table->dropForeign(['variasi_id']);

            // Hapus kolom produk_id dan variasi_id
            $table->dropColumn(['produk_id', 'variasi_id']);

            // Tambahkan kolom baru untuk nama produk dan variasi manual
            $table->string('nama_produk')->after('tanggal');
            $table->string('variasi')->nullable()->after('nama_produk');
        });
    }

    public function down()
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            // Tambahkan kembali kolom produk_id dan variasi_id
            $table->unsignedBigInteger('produk_id')->after('tanggal');
            $table->unsignedBigInteger('variasi_id')->nullable()->after('produk_id');

            // Tambahkan kembali foreign key constraints
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('variasi_id')->references('id')->on('variasis')->onDelete('cascade');

            // Hapus kolom baru jika rollback
            $table->dropColumn(['nama_produk', 'variasi']);
        });
    }
};
