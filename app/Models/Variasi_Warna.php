<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variasi_Warna extends Model
{
    protected $guarded = ['id'];

    protected $table = 'variasi_warnas';

    public function variasi()
    {
        return $this->hasMany(Produk_Variasi::class);
    }
}
