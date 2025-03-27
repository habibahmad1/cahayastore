<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratResi extends Model
{
    /** @use HasFactory<\Database\Factories\SuratResiFactory> */
    use HasFactory;
    protected $guarded = ['id'];
}
