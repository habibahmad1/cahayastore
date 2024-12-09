<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variasi_Gambar extends Model
{
    protected $guarded = ['id'];

    protected $table = 'variasi_gambars';

    public function variasi()
    {
        return $this->hasMany(Produk_Variasi::class);
    }
}
