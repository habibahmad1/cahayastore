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
        Schema::table('artikels', function (Blueprint $table) {
            $table->string('gambar2')->nullable()->after('image');
            $table->string('gambar3')->nullable()->after('gambar2');
            $table->string('gambar4')->nullable()->after('gambar3');
            $table->string('gambar5')->nullable()->after('gambar4');
            $table->string('video')->nullable()->after('gambar5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            // Hapus field yang ditambahkan
            $table->dropColumn(['gambar2', 'gambar3', 'gambar4', 'gambar5', 'video']);
        });
    }
};
