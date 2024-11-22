<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variasi_Ukuran extends Model
{
    protected $guarded = ['id'];

   // Relasi dengan produk variasi
   public function produkVariasi()
   {
       return $this->belongsTo(Produk_Variasi::class);
   }
}
