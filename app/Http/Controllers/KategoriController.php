<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Kategori $kategori)
    {
        return view('kategori',[
            "title" => 'Kategori: ' .ucwords($kategori->nama),
            "produk" => $kategori->produk,
            "kategori" => $kategori->nama
        ]);
    }
}
