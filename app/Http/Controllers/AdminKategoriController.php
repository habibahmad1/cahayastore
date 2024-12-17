<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.kategori.index', [
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            "nama" => "required",
            "slug" => "required|unique:kategoris,nama"
        ]);

        Kategori::create($validasiData);

        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', [
            "kategori" => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        // Validasi data
        $validasiData = $request->validate([
            "nama" => "required",
            "slug" => "required"
        ]);

        // Mengupdate data kategori
        $kategori->update($validasiData);

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil diedit!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
