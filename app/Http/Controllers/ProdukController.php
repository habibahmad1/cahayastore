<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk', [
            "title" => "Semua Produk",
            "posts" => Produk::latest()->filter(request(['search', 'kategori']))->paginate(10)->withQueryString(),
            "kategori" => Kategori::all()
        ]);
    }

    public function show(Produk $produkid)
    {

        return view('detailProduk', [
            "title" => "Detail Produk",
            "post" => $produkid
        ]);
    }
}
