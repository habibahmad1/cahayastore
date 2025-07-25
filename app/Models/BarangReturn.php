<?php

namespace App\Models;

use App\Models\Produk_Variasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangReturn extends Model
{
    /** @use HasFactory<\Database\Factories\BarangReturnFactory> */
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

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
