<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    /** @use HasFactory<\Database\Factories\BarangKeluarFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function variasi()
    {
        return $this->belongsTo(Produk_Variasi::class);
    }

    public function warna()
    {
        return $this->belongsTo(Variasi_Warna::class);
    }

    public function ukuran()
    {
        return $this->belongsTo(Variasi_Ukuran::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
