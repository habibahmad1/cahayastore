<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use App\Http\Requests\StoreKategoriArtikelRequest;
use App\Http\Requests\UpdateKategoriArtikelRequest;

class KategoriArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategoripost.index', [
            'kategori' => KategoriArtikel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategoripost.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriArtikelRequest $request)
    {
        $validasiData = $request->validate([
            "nama" => "required|unique:kategori_artikels,nama",
            "slug" => "required|unique:kategori_artikels,slug"
        ]);

        KategoriArtikel::create($validasiData);

        return redirect('/dashboard/kategoriartikel')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriArtikel $kategoriArtikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriArtikel $kategoriArtikel)
    {
        return view('dashboard.kategoripost.edit', [
            "kategori" => $kategoriArtikel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriArtikelRequest $request, KategoriArtikel $kategoriArtikel)
    {
        // Validasi data
        $validasiData = $request->validate([
            "nama" => "required",
            "slug" => "required"
        ]);

        // Mengupdate data kategori
        $kategoriArtikel->update($validasiData);

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect('/dashboard/kategoriartikel')->with('success', 'Kategori berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriArtikel $kategoriArtikel)
    {
        // Cek jika kategori masih memiliki artikel yang terkait
        if ($kategoriArtikel->artikel()->count() > 0) {
            return redirect('/dashboard/kategoriartikel')->with('error', 'Kategori tidak dapat dihapus karena masih memiliki artikel terkait.');
        }

        // Jika tidak ada artikel, lakukan penghapusan kategori
        $kategoriArtikel->delete();

        return redirect('/dashboard/kategoriartikel')->with('success', 'Kategori berhasil dihapus!');
    }
}
