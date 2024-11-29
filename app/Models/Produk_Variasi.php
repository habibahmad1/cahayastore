<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_Variasi extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    // Relasi dengan ukuran
    public function ukuran()
    {
        return $this->hasMany(Variasi_Ukuran::class);
    }

    // Relasi dengan warna
    public function warna()
    {
        return $this->hasMany(Variasi_Warna::class);
    }

    // Relasi dengan stok
    public function stok()
    {
        return $this->hasMany(Variasi_Stok::class);
    }

    // Relasi dengan gambar
    public function gambar()
    {
        return $this->hasMany(Variasi_Gambar::class);
    }
}
