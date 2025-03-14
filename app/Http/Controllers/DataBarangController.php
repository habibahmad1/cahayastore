<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Produk;
use App\Http\Requests\StoreDataBarangRequest;
use App\Http\Requests\UpdateDataBarangRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;


class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Produk::query()
            ->leftJoin('barang_keluars', 'produks.id', '=', 'barang_keluars.produk_id')
            ->selectRaw('
            produks.id, produks.nama_produk, produks.kode_produk,
            produks.slug, produks.kategori_id, produks.harga,
            produks.gambar1, produks.created_at, produks.updated_at,
            COALESCE(SUM(barang_keluars.qty), 0) as total_terjual
        ')
            ->groupBy('produks.id', 'produks.nama_produk', 'produks.kode_produk', 'produks.slug', 'produks.kategori_id', 'produks.harga', 'produks.gambar1', 'produks.created_at', 'produks.updated_at');

        // Jika ada filter pencarian
        if ($request->has('search')) {
            $query->where('produks.nama_produk', 'like', '%' . $request->search . '%');
        }

        // Jika ada filter kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('produks.kategori_id', $request->kategori);
        }

        // Jika ingin mengurutkan berdasarkan produk terlaris
        if ($request->has('sort') && $request->sort === 'terlaris') {
            // Urutkan berdasarkan total_terjual (dari yang terbanyak)
            $query->orderByDesc('total_terjual');
        }

        // Jika ingin mengurutkan berdasarkan yang terlama (created_at)
        elseif ($request->has('sort') && $request->sort === 'terlama') {
            // Urutkan berdasarkan tanggal dibuat yang paling lama
            $query->orderBy('produks.created_at', 'asc');
        } else {
            // Default sorting berdasarkan yang terbaru (created_at)
            $query->orderBy('produks.created_at', 'desc');
        }

        $produk = $query->with('variasi', 'kategori')->get();
        $kategori = Kategori::all();

        return view('dashboard.databarang.index', compact('produk', 'kategori'));
    }



    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataBarangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DataBarang $dataBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataBarang $dataBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataBarangRequest $request, DataBarang $dataBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataBarang $dataBarang)
    {
        //
    }
}
