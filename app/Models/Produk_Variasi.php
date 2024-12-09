<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_Variasi extends Model
{
    protected $guarded = ['id'];

    protected $table = 'produk_variasis';

    use HasFactory;

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function warna()
    {
        return $this->belongsTo(Variasi_Warna::class);
    }

    public function ukuran()
    {
        return $this->belongsTo(Variasi_Ukuran::class);
    }

    public function stok()
    {
        return $this->belongsTo(Variasi_Stok::class);
    }

    public function gambar()
    {
        return $this->belongsTo(Variasi_Gambar::class);
    }
}
