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
        Schema::create('surat_resis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->string('alamat_penerima');
            $table->string('telepon_penerima');
            $table->string('nama_pengirim');
            $table->string('alamat_pengirim');
            $table->string('telepon_pengirim');
            $table->date('tanggal_pengiriman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_resis');
    }
};
