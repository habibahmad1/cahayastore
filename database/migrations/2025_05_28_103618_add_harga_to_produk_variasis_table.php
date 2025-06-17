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
        Schema::table('produk_variasis', function (Blueprint $table) {
            // Menambahkan kolom 'harga' bertipe integer dan nullable
            $table->integer('harga')->nullable()->after('stok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk_variasis', function (Blueprint $table) {
            // Menghapus kolom 'harga'
            $table->dropColumn('harga');
        });
    }
};
