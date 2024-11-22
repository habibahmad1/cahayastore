<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variasi_Gambar extends Model
{
    protected $guarded = ['id'];

    public function produkVariasi()
    {
        return $this->belongsTo(Produk_Variasi::class);
    }
}
