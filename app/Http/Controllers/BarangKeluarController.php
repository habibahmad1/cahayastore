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
        $barangKeluar = BarangKeluar::with('produk')->latest()->get();

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
            'produk_id' => 'required|exists:produks,id',
            'tanggal' => 'required|date',
            'qty' => 'required|integer|min:1',
            'platform' => 'required|string',
            'host' => 'required|string',
            'darijam' => 'required|string',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        if ($produk->stok < $request->qty) {
            return back()->withErrors(['qty' => 'Stok tidak mencukupi!']);
        }

        // Kurangi stok produk
        $produk->stok -= $request->qty;
        $produk->save();

        // Simpan laporan barang keluar
        BarangKeluar::create($request->all());

        return redirect()->route('barang-keluar.index')->with('success', 'Laporan barang keluar berhasil dibuat.');
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
