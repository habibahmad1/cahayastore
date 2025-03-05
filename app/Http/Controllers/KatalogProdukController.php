<?php

namespace App\Http\Controllers;

use App\Models\KatalogProduk;
use App\Http\Requests\StoreKatalogProdukRequest;
use App\Http\Requests\UpdateKatalogProdukRequest;
use App\Models\Produk;
use App\Models\Produk_Variasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KatalogProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Produk::with(['kategori', 'variasi.warna', 'variasi.ukuran']);

        // Filter kategori jika ada
        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        $produk = $query->get();
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown filter

        return view('dashboard.katalogproduk.index', compact('produk', 'kategori'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKatalogProdukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KatalogProduk $katalogProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KatalogProduk $katalogProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKatalogProdukRequest $request, KatalogProduk $katalogProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KatalogProduk $katalogProduk)
    {
        //
    }
}
