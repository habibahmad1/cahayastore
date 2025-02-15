<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Produk_Variasi;
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
        $produks = Produk::with(['variasi'])->get(); // Pastikan variasi dimuat di sini
        return view('dashboard.barangkeluar.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'produk_id' => 'required|exists:produks,id', // Validasi produk_id
            'variasi_id' => 'nullable|exists:produk_variasis,id', // Validasi variasi_id
            'qty' => 'required|integer|min:1',
            'platform' => 'required|string|max:50',
            'host' => 'required|string|max:255',
            'jamlive' => 'required|string|max:50',
        ]);

        // Mengambil produk berdasarkan produk_id
        $produk = Produk::find($request->produk_id);

        // Jika produk tidak ditemukan, kembalikan error
        if (!$produk) {
            return redirect()->back()->withErrors(['produk_id' => 'Produk tidak ditemukan.'])->withInput();
        }

        // Jika variasi_id dipilih, ambil variasi terkait
        if ($request->variasi_id) {
            $variasi = Produk_Variasi::find($request->variasi_id);

            // Jika variasi tidak ditemukan, kembalikan error
            if (!$variasi) {
                return redirect()->back()->withErrors(['variasi_id' => 'Variasi tidak ditemukan.'])->withInput();
            }

            // Cek apakah jumlah yang dikeluarkan melebihi stok variasi
            if ($variasi->stok < $request->qty) {
                return redirect()->back()->withErrors(['qty' => 'Jumlah barang yang dikeluarkan melebihi stok variasi.'])->withInput();
            }

            // Kurangi stok variasi
            $variasi->stok -= $request->qty;
            $variasi->save();
        } else {
            // Jika tidak ada variasi, kurangi stok produk
            if ($produk->stok < $request->qty) {
                return redirect()->back()->withErrors(['qty' => 'Jumlah barang yang dikeluarkan melebihi stok produk.'])->withInput();
            }

            // Kurangi stok produk
            $produk->stok -= $request->qty;
            $produk->save();
        }

        // Menyimpan data barang keluar dengan user_id secara otomatis
        BarangKeluar::create([
            'tanggal' => $request->tanggal,
            'produk_id' => $request->produk_id,
            'variasi_id' => $request->variasi_id,
            'qty' => $request->qty,
            'platform' => $request->platform,
            'host' => $request->host,
            'jamlive' => $request->jamlive,
            'user_id' => auth()->id(), // Menambahkan user_id secara otomatis
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
        $produks = Produk::with(['variasi'])->get(); // Pastikan variasi dimuat di sini
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

    /**
     * Autocomplete untuk pencarian nama produk.
     */
    public function autocomplete(Request $request)
    {
        $term = $request->get('term');

        if (empty($term)) {
            return response()->json([]);
        }

        // Mengambil produk berdasarkan nama produk yang sesuai dengan term pencarian
        $produks = Produk::where('nama_produk', 'LIKE', '%' . $term . '%')
            ->get(['id', 'nama_produk']);  // Pastikan ID dan nama produk ada

        return response()->json($produks);
    }

    /**
     * Mendapatkan variasi berdasarkan produk ID.
     */
    public function getVariasi($produkId)
    {
        // Mengambil variasi berdasarkan produk_id dan memuat informasi warna dan ukuran
        $variasi = Produk_Variasi::where('produk_id', $produkId)
            ->with(['warna', 'ukuran']) // Pastikan relasi warna dan ukuran dimuat
            ->get();

        // Mengirimkan variasi dengan nama warna dan ukuran
        return response()->json(['variasi' => $variasi]);
    }
}
