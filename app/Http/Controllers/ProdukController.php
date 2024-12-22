<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Produk_Variasi;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk', [
            "title" => "Semua Produk",
            "posts" => Produk::with(['kategori', 'variasi'])->latest()->filter(request(['search', 'kategori']))->paginate(10)->withQueryString(),
            "kategori" => Kategori::all()
        ]);
    }

    public function show(Produk $produkid)
    {

        $produkVariasi = Produk_Variasi::where('produk_id', $produkid->id)
            ->with(['produk', 'warna', 'ukuran', 'gambar']) // Memuat relasi terkait
            ->get();

        return view('detailProduk', [
            "title" => "Detail Produk",
            "post" => $produkid,
            "produk_variasi" => $produkVariasi,
        ]);
    }
}
