<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kategori extends Model
{
    protected $guarded = ['id'];

    use HasFactory;


    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
