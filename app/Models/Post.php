<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ["user", "kategoripost"];


    public function kategoripost()
    {
        return $this->belongsTo(KategoriPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFiltercoy($query)
    {
        if (request('search')) {
            return $query->where('judul', 'like', '%' . request('search') . '%')
                ->orWhere('artikelPost', 'like', '%' . request('search') . '%');
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
