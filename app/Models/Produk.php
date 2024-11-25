<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produk extends Model
{
    protected $guarded = ['id'];

    protected $with = ['kategori'];

    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
