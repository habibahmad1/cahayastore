<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variasi_Stok extends Model
{
    protected $guarded = ['id'];

    public function variasi()
    {
        return $this->hasMany(Produk_Variasi::class);
    }
}
