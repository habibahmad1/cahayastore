<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Produk;
use App\Http\Requests\StoreDataBarangRequest;
use App\Http\Requests\UpdateDataBarangRequest;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua produk beserta variasinya (warna & ukuran)
        $produk = Produk::with(['variasi.warna', 'variasi.ukuran'])->get();

        // Mengirim data ke view
        return view('dashboard.databarang.index', compact('produk'));
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
