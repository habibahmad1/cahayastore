<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriArtikelFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'kategoripost_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
