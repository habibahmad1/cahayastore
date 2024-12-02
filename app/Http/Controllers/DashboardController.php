<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Produk_Variasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.produk.index', [
            "produk" =>  Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.produk.create', [
            "kategori" => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data produk utama
        $validatedData = $request->validate([
            "kategori_id" => "required",
            "nama_produk" => "required|max:255",
            "slug" => "required|unique:produks",
            "kode_produk" => "nullable|unique:produks,kode_produk",
            "deskripsi" => "required",
            "harga" => "required|numeric|min:0",
            "stok" => "required|integer|min:0",
            "gambar1" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gambar2" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gambar3" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gambar4" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gambar5" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "berat" => "required|numeric|min:0",
            "dimensi" => "nullable",
            "diskon" => "required|numeric|min:0|max:100",
            "status" => "required"
        ]);

        $gambarFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];

        foreach ($gambarFields as $field) {
            if ($request->file($field)) {
                $validatedData[$field] = $request->file($field)->store('gambar');
            }
        }


        Produk::create($validatedData);

        return redirect('/dashboard/produk')->with('success', 'Produk berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('dashboard.produk.show', [
            "produk" => $produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produk.edit', [
            "produk" => $produk,
            "kategori" => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        // Validasi data produk utama
        $rules = [
            "kategori_id" => "required",
            "nama_produk" => "required|max:255",
            "deskripsi" => "required",
            "harga" => "required|numeric|min:0",
            "stok" => "required|integer|min:0",
            "gambar1" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gambar2" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gambar3" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gambar4" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gambar5" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "berat" => "required|numeric|min:0",
            "dimensi" => "nullable",
            "diskon" => "required|numeric|min:0|max:100",
            "status" => "required"
        ];

        // Validasi slug jika diubah
        if ($request->slug !== $produk->slug) {
            $rules['slug'] = "required|unique:produks,slug";
        }

        // Validasi kode_produk jika diubah
        if ($request->kode_produk !== $produk->kode_produk) {
            $rules['kode_produk'] = "nullable|unique:produks,kode_produk";
        }

        $validatedData = $request->validate($rules);

        $gambarFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];

        foreach ($gambarFields as $field) {
            if ($request->file($field)) {
                // Menghapus gambar lama jika ada
                if ($produk->$field) {
                    Storage::delete($produk->$field); // Hapus file gambar lama dari storage
                }
                // Menyimpan gambar baru
                $validatedData[$field] = $request->file($field)->store('gambar');
            }
        }

        // Update data produk
        Produk::where('id', $produk->id)
            ->update($validatedData);

        return redirect('/dashboard/produk')->with('success', 'Produk berhasil diedit!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Daftar gambar yang terkait dengan produk
        $gambarFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];

        // Hapus gambar-gambar yang terkait dengan produk, jika ada
        foreach ($gambarFields as $field) {
            if ($produk->$field) {
                Storage::delete($produk->$field);  // Hapus gambar dari storage
            }
        }

        Produk::destroy($produk->id);

        return redirect('/dashboard/produk')->with('success', 'Produk berhasil dihapus!');
    }
}
