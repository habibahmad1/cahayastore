<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Kategori $kategori)
    {
        return view('produk', [
            "title" => 'Kategori: ' . ucwords($kategori->nama),
            "posts" => $kategori->produk()->latest()->filter(request(['search']))->paginate(12)->withQueryString(), // Filter produk berdasarkan kategori
            "kategori" => Kategori::all(),
        ]);
    }
}
