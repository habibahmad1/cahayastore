<?php

namespace App\Http\Controllers;

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
            "nama" => "required|max:255",
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

        // Menyimpan produk utama
        $produk = new Produk;
        $produk->kategori_id = $validatedData['kategori_id'];
        $produk->nama = $validatedData['nama'];
        $produk->slug = $validatedData['slug'];
        $produk->kode_produk = $validatedData['kode_produk'] ?? null;
        $produk->deskripsi = $validatedData['deskripsi'];
        $produk->harga = $validatedData['harga'];
        $produk->stok = $validatedData['stok'];
        $produk->berat = $validatedData['berat'];
        $produk->dimensi = $validatedData['dimensi'];
        $produk->diskon = $validatedData['diskon'];
        $produk->status = $validatedData['status'];

        // Menyimpan gambar produk (gambar utama)
        if ($request->hasFile('gambar1')) {
            $produk->gambar1 = $request->file('gambar1')->store('images', 'public');
        }
        if ($request->hasFile('gambar2')) {
            $produk->gambar2 = $request->file('gambar2')->store('images', 'public');
        }
        if ($request->hasFile('gambar3')) {
            $produk->gambar3 = $request->file('gambar3')->store('images', 'public');
        }
        if ($request->hasFile('gambar4')) {
            $produk->gambar4 = $request->file('gambar4')->store('images', 'public');
        }
        if ($request->hasFile('gambar5')) {
            $produk->gambar5 = $request->file('gambar5')->store('images', 'public');
        }

        // Menyimpan produk utama
        $produk->save();

        // Menyimpan variasi produk
        $variasiData = $request->input('variasi');

        foreach ($variasiData as $key => $variasi) {
            // Validasi variasi
            $request->validate([
                "variasi.{$key}.warna" => "required|max:255",
                "variasi.{$key}.ukuran" => "required|max:255",
                "variasi.{$key}.stok" => "required|integer|min:0",
                "variasi.{$key}.gambar" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            ]);

            // Menyimpan variasi produk
            $produkVariasi = new Produk_Variasi;
            $produkVariasi->produk_id = $produk->id;
            $produkVariasi->save();  // Menyimpan record variasi produk

            // Menyimpan variasi warna, ukuran, stok, dan gambar
            $produkVariasi->warna()->create([
                'warna' => $variasi['warna'],
            ]);

            $produkVariasi->ukuran()->create([
                'ukuran' => $variasi['ukuran'],
            ]);

            $produkVariasi->stok()->create([
                'stok' => $variasi['stok'],
            ]);

            // Menyimpan gambar variasi
            if (isset($variasi['gambar'])) {
                $gambarPath = $variasi['gambar']->store('images/variasi', 'public');
                $produkVariasi->gambar()->create([
                    'gambar_path' => $gambarPath,
                ]);
            }
        }

        return redirect('/dashboard/produk')->with('success', 'Produk dan variasi berhasil ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
