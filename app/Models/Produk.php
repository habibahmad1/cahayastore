<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produk extends Model
{
    protected $guarded = ['id'];

    protected $with = ['kategori'];

    use HasFactory;

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query,$search){
            return $query->where('nama_produk', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });

        $query->when($filters['kategori'] ?? false, function($query,$kategori){
            return $query->whereHas('kategori', function($query) use ($kategori){
                $query->where('slug',$kategori);
            });
        });
    }


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
