<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    /** @use HasFactory<\Database\Factories\ArtikelFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ["user", "kategoripost"];


    public function kategoripost()
    {
        return $this->belongsTo(KategoriArtikel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFiltercoy($query)
    {
        if (request('search')) {
            return $query->where('judul', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
