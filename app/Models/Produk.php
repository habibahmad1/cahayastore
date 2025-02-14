<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{
    use Sluggable;

    protected $guarded = ['id'];

    protected $with = ['kategori'];

    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        // Pencarian berdasarkan produk (nama produk, deskripsi)
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('nama_produk', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    // Cari berdasarkan kategori menggunakan relasi
                    ->orWhereHas('kategori', function ($q) use ($search) {
                        $q->where('nama', 'like', '%' . $search . '%');
                    });
            });
        });

        // Pencarian berdasarkan kategori (slug)
        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('slug', $kategori);
            });
        });
    }



    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function variasi()
    {
        return $this->hasMany(Produk_Variasi::class);
    }

    public function getTotalStokAttribute()
    {
        // Jika ada variasi, jumlahkan stok variasi
        if ($this->variasi->count() > 0) {
            return $this->variasi->sum('stok');
        }
        // Jika tidak ada variasi, gunakan stok utama
        return $this->stok;
    }


    public function warna()
    {
        return $this->hasMany(Variasi_Warna::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_produk'
            ]
        ];
    }
}
