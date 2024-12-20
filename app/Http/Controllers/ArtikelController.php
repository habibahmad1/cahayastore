<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use App\Models\KategoriArtikel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.artikel.index', [
            'dataArtikel' => Artikel::where('user_id', auth()->user()->id)
                ->latest()
                ->paginate(10)
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artikel.create', [
            'data' => KategoriArtikel::all()  // Mengambil semua kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:artikels',  // Menggunakan nama tabel yang benar
            'image' => 'image|file|max:2048',
            'kategoripost_id' => 'required',
            'body' => 'required'
        ]);

        // Proses upload gambar jika ada
        if ($request->file('image')) {
            $validasiData['image'] = $request->file('image')->store('artikel-image');
        }

        // Menambahkan user_id dan excerpt
        $validasiData['user_id'] = auth()->user()->id;
        $validasiData['excerpt'] = Str::limit(strip_tags($request->body), 120);

        // Menyimpan artikel baru
        Artikel::create($validasiData);

        return redirect('/dashboard/artikel')->with('success', 'Berhasil Menambahkan Artikel');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        return view('dashboard.artikel.detail', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        return view('dashboard.artikel.edit', [
            'artikel' => $artikel,
            'data' => KategoriArtikel::all()  // Mengambil semua kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $rules = [
            'judul' => 'required|max:255',
            'kategoripost_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        // Hanya validasi slug jika slug berubah
        if ($request->slug != $artikel->slug) {
            $rules['slug'] = 'required|unique:artikels';
        }

        $validasiData = $request->validate($rules);

        // Cek jika ada file gambar baru
        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if ($artikel->image) {
                Storage::delete($artikel->image);
            }
            // Simpan gambar baru dan masukkan ke validasi data
            $validasiData['image'] = $request->file('image')->store('artikel-image');
        }

        if ($artikel->user_id == auth()->user()->id) {
            $validasiData['user_id'] = auth()->user()->id; // Set user_id hanya jika yang mengedit adalah pemilik artikel
        }

        $validasiData['excerpt'] = Str::limit(strip_tags($request->body), 120);

        // Update artikel dengan data yang telah divalidasi
        $artikel->update($validasiData);

        return redirect('/dashboard/artikel')->with('success', 'Berhasil Edit Artikel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        // Hapus artikel
        Artikel::destroy($artikel->id);

        // Hapus gambar jika ada
        if ($artikel->image) {
            Storage::delete($artikel->image);
        }

        return back()->with('success', 'Artikel Berhasil dihapus');
    }

    public function allartikel()
    {
        return view('dashboard.artikel.allartikel', [
            'dataArtikel' => Artikel::latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }
}
