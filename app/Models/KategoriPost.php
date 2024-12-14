<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPost extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriPostFactory> */
    use HasFactory;

    protected $guarded = ["id"];

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
