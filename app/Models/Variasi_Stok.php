<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variasi_Stok extends Model
{
    protected $guarded = ['id'];

    protected $table = 'variasi_stoks';

    public function variasi()
    {
        return $this->hasMany(Produk_Variasi::class);
    }
}
