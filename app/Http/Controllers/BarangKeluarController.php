<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Produk;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::with(['variasi.warna', 'variasi.ukuran'])->get();
        $barangKeluar = BarangKeluar::latest()->get(); // ✅ Hapus with('produk')

        return view('dashboard.barangkeluar.index', compact('barangKeluar', 'produks'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();
        return view('dashboard.barangkeluar.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_produk' => 'required|string|max:255', // Nama barang diketik manual
            'variasi' => 'nullable|string|max:255', // Variasi juga diketik manual
            'qty' => 'required|integer|min:1',
            'platform' => 'required|string|max:50',
            'host' => 'required|string|max:255',
            'jamlive' => 'required|string|max:50',
        ]);

        BarangKeluar::create([
            'tanggal' => $request->tanggal,
            'nama_produk' => $request->nama_produk, // Simpan langsung nama barang
            'variasi' => $request->variasi, // Simpan langsung variasi
            'qty' => $request->qty,
            'platform' => $request->platform,
            'host' => $request->host,
            'jamlive' => $request->jamlive,
        ]);

        return redirect()->route('barang-keluar.index')->with('success', 'Laporan barang keluar berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        return view('dashboard.barangkeluar.show', compact('barangKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        $produks = Produk::all();
        return view('dashboard.barangkeluar.edit', compact('barangKeluar', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'tanggal' => 'required|date',
            'qty' => 'required|integer|min:1',
            'platform' => 'required|string',
            'host' => 'required|string',
            'darijam' => 'required|string',
        ]);

        $barangKeluar->update($request->all());
        return redirect()->route('barang-keluar.index')->with('success', 'Laporan barang keluar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();
        return redirect()->route('barang-keluar.index')->with('success', 'Laporan barang keluar berhasil dihapus.');
    }

    public function getProduk(Request $request)
    {
        $search = $request->get('q'); // Menerima input pencarian
        $produks = Produk::where('nama_produk', 'like', "%$search%")
            ->with('variasi')
            ->get();

        return response()->json($produks);
    }
}
