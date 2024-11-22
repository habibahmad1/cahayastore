<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produk extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
