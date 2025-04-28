<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Produk_Variasi;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Kategori;


class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BarangMasuk::with('produk'); // Eager Loading Produk

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        // Filter berdasarkan produk_id
        if ($request->filled('produk_id')) {
            $query->where('produk_id', $request->produk_id);
        }

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('id', $request->kategori);
            });
        }

        // Mengambil data barang masuk dengan produk yang sesuai
        $barangMasuk = $query->latest()->get();

        // Mengambil semua produk dengan relasi variasi, warna, dan ukuran
        $produks = Produk::with(['variasi.warna', 'variasi.ukuran'])->get();
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown


        return view('dashboard.barangmasuk.index', compact('barangMasuk', 'produks', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::with(['variasi'])->get(); // Pastikan variasi dimuat di sini
        return view('dashboard.barangmasuk.create', compact('produks'));
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
            'exp' => 'nullable|date', // Validasi exp (expired)
        ]);

        $produk = Produk::find($request->produk_id);

        // Pastikan produk ditemukan
        if (!$produk) {
            return redirect()->back()->withErrors(['produk_id' => 'Produk tidak ditemukan.'])->withInput();
        }

        // Proses variasi jika ada
        if ($request->variasi_id) {
            $variasi = Produk_Variasi::find($request->variasi_id);
            if (!$variasi) {
                return redirect()->back()->withErrors(['variasi_id' => 'Variasi tidak ditemukan.'])->withInput();
            }

            // Tambah stok variasi
            $variasi->stok += $request->qty;
            $variasi->save();
        } else {
            // Tambah stok produk utama
            $produk->stok += $request->qty;
            $produk->save();
        }

        BarangMasuk::create([
            'tanggal' => $request->tanggal,
            'produk_id' => $request->produk_id,
            'variasi_id' => $request->variasi_id,
            'kategori_id' => $produk->kategori_id,
            'qty' => $request->qty,
            'exp' => $request->exp, // Menyimpan data expired jika ada
            // 'user_id' => auth()->id(),
        ]);

        return redirect()->route('barang-masuk.index')->with('success', 'Laporan barang masuk berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        return view('dashboard.barangmasuk.show', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        $produks = Produk::with(['variasi'])->get(); // Pastikan variasi dimuat di sini
        return view('dashboard.barangmasuk.edit', compact('barangMasuk', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'produk_id' => 'required|exists:produks,id',
            'variasi_id' => 'nullable|exists:produk_variasis,id',
            'qty' => 'required|integer|min:1',
            'exp' => 'nullable|date',
        ]);

        // Cek apakah qty baru lebih besar atau lebih kecil dari qty lama
        $selisihQty = $request->qty - $barangMasuk->qty;

        // 1. Kurangkan stok berdasarkan qty lama
        if ($barangMasuk->variasi_id) {
            // Jika barang masuk terkait variasi, kurangi stok variasi
            $variasiLama = Produk_Variasi::find($barangMasuk->variasi_id);
            if ($variasiLama) {
                $variasiLama->stok -= $barangMasuk->qty; // Mengurangi stok sesuai qty lama
                $variasiLama->save();
            }
        } else {
            // Jika tidak ada variasi, kurangi stok produk utama
            $produkLama = Produk::find($barangMasuk->produk_id);
            if ($produkLama) {
                $produkLama->stok -= $barangMasuk->qty; // Mengurangi stok produk utama
                $produkLama->save();
            }
        }

        // 2. Tambah stok sesuai dengan qty baru
        if ($request->variasi_id) {
            // Jika ada variasi baru, tambahkan stok variasi
            $variasiBaru = Produk_Variasi::find($request->variasi_id);
            if ($variasiBaru) {
                $variasiBaru->stok += $request->qty; // Menambah stok variasi sesuai qty baru
                $variasiBaru->save();
            }
        } else {
            // Jika tidak ada variasi, tambahkan stok produk utama
            $produkBaru = Produk::find($request->produk_id);
            if ($produkBaru) {
                $produkBaru->stok += $request->qty; // Menambah stok produk utama sesuai qty baru
                $produkBaru->save();
            }
        }

        // 3. Update data barang masuk
        $barangMasuk->update([
            'tanggal' => $request->tanggal,
            'produk_id' => $request->produk_id,
            'variasi_id' => $request->variasi_id,
            'qty' => $request->qty, // Update qty dengan nilai baru
            'exp' => $request->exp, // Update expired date jika ada
        ]);

        return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        // Kembalikan stok produk dan variasi
        $produk = Produk::find($barangMasuk->produk_id);
        if ($barangMasuk->variasi_id) {
            $variasi = Produk_Variasi::find($barangMasuk->variasi_id);
            if ($variasi) {
                $variasi->stok -= $barangMasuk->qty; // Kurangkan stok variasi
                $variasi->save();
            }
        } else {
            if ($produk) {
                $produk->stok -= $barangMasuk->qty; // Kurangkan stok produk utama
                $produk->save();
            }
        }

        // Hapus laporan barang masuk setelah stok dikembalikan
        $barangMasuk->delete();

        return redirect()->route('barang-masuk.index')->with('success', 'Laporan barang masuk berhasil dihapus dan stok dikembalikan.');
    }

    /**
     * Autocomplete untuk pencarian nama produk.
     */
    // public function autocomplete(Request $request)
    // {
    //     $term = $request->get('term');

    //     if (empty($term)) {
    //         return response()->json([]);
    //     }

    //     // Mengambil produk berdasarkan nama produk yang sesuai dengan term pencarian
    //     $produks = Produk::where('nama_produk', 'LIKE', '%' . $term . '%')
    //         ->get(['id', 'nama_produk']);  // Pastikan ID dan nama produk ada

    //     return response()->json($produks);
    // }

    public function autocomplete(Request $request)
    {
        $term = $request->get('term');

        if (empty($term)) {
            return response()->json([]);
        }

        // Mengambil produk berdasarkan nama produk yang sesuai dengan term pencarian
        $produks = Produk::where('nama_produk', 'LIKE', '%' . $term . '%')
            ->get(['id', 'nama_produk', 'gambar1']);  // Menyertakan kolom 'gambar1' untuk gambar

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
