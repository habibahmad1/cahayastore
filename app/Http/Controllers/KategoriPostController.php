<?php

namespace App\Http\Controllers;

use App\Models\KategoriPost;
use App\Http\Requests\StoreKategoriPostRequest;
use App\Http\Requests\UpdateKategoriPostRequest;
use Illuminate\Support\Facades\Gate;


class KategoriPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategoripost.index', [
            'kategori' => KategoriPost::all()
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
    /**
     * Simpan kategori baru ke database
     */
    public function store(StoreKategoriPostRequest $request)
    {
        // Validasi data yang diterima
        $validasiData = $request->validate([
            "nama" => "required|string|max:255",
            "slug" => "required|unique:kategori_posts,slug|string|max:255" // Pastikan slug unik di tabel kategori_posts
        ]);

        // Simpan data ke dalam database
        KategoriPost::create($validasiData);

        // Redirect ke halaman kategori post dengan pesan sukses
        return redirect('/dashboard/kategoripost')->with('success', 'Kategori berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(KategoriPost $kategoriPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriPost $kategoriPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriPostRequest $request, KategoriPost $kategoriPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriPost $kategoriPost)
    {
        //
    }
}
