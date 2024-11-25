<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index(){

        return view('produk',[
            "title" => "Produk",
            "posts" => Produk::latest()->get(),
            "kategori" => Kategori::all()
        ]);
    }

    public function show(Produk $produkid){

        return view('detailProduk',[
            "title" => "Detail Produk",
            "post" => $produkid
        ]);
    }
}
