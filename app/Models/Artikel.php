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
        return $this->belongsTo(KategoriArtikel::class, 'kategoripost_id');
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


    public function scopeFilter($query, array $filters)
    {
        // Pencarian berdasarkan kolom artikel (judul, excerpt, body, user_id)
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    ->orWhere('user_id', 'like', '%' . $search . '%')
                    // Cari berdasarkan nama pengguna melalui relasi
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhere('kategoripost_id', 'like', '%' . $search . '%');
            });
        });

        // Cari berdasarkan kategori menggunakan relasi
        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('slug', $kategori);
            });
        });
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
