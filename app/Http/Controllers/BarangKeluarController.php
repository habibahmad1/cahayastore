<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Produk_Variasi;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BarangKeluar::with('produk'); // Eager Loading Produk

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        // Filter berdasarkan produk
        if ($request->filled('produk_id')) {
            $query->where('produk_id', $request->produk_id);
        }

        // Filter berdasarkan platform (hanya jika dipilih)
        if ($request->filled('platform')) {
            $query->where('platform', $request->platform);
        }

        // Filter berdasarkan sumber (hanya jika dipilih)
        if ($request->filled('sumber')) {
            $query->where('sumber', $request->sumber);
        }

        // Filter berdasarkan host (pencarian sebagian)
        if ($request->filled('host')) {
            $query->where('host', 'LIKE', '%' . $request->host . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('id', $request->kategori);
            });
        }

        // Urutkan berdasarkan tanggal terbaru menggunakan latest()
        $query->latest('tanggal');

        // Menangani pilihan "Semua Data"
        $limit = $request->input('limit', 50); // Default 50 jika tidak ada filter
        if ($limit == 'all') {
            $barangKeluar = $query->get(); // Ambil semua data (tanpa paginasi)
            $isPaginated = false; // Tambahkan variabel flag
        } else {
            $barangKeluar = $query->paginate($limit); // Gunakan paginasi
            $isPaginated = true;
        }

        $produks = Produk::with(['variasi.warna', 'variasi.ukuran'])->get();
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown

        return view('dashboard.barangkeluar.index', compact('barangKeluar', 'produks', 'kategori', 'isPaginated'));
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
            'catatan' => 'nullable|string',
            'sumber' => 'required|string',
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

            // Cek stok variasi
            if ($variasi->stok < $request->qty) {
                return redirect()->back()->withErrors(['qty' => 'Jumlah barang yang dikeluarkan melebihi stok variasi.'])->withInput();
            }

            $variasi->stok -= $request->qty;
            $variasi->save();
        } else {
            if ($produk->stok < $request->qty) {
                return redirect()->back()->withErrors(['qty' => 'Jumlah barang yang dikeluarkan melebihi stok produk.'])->withInput();
            }

            $produk->stok -= $request->qty;
            $produk->save();
        }

        BarangKeluar::create([
            'tanggal' => $request->tanggal,
            'produk_id' => $request->produk_id,  // Menggunakan produk_id
            'variasi_id' => $request->variasi_id, // Variasi jika ada
            'kategori_id' => $produk->kategori_id,
            'qty' => $request->qty,
            'platform' => $request->platform,
            'host' => $request->host,
            'jamlive' => $request->jamlive,
            'catatan' => $request->catatan,
            'sumber' => $request->sumber,
            // 'user_id' => auth()->id(),
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'produk_id' => 'required|exists:produks,id',
            'variasi_id' => 'nullable|exists:produk_variasis,id',
            'qty' => 'required|integer|min:1',
            'platform' => 'required|string',
            'host' => 'required|string',
            'jamlive' => 'required|string',
            'catatan' => 'nullable|string',
            'sumber' => 'required|string',
        ]);

        // Ambil data barang keluar yang akan diupdate
        $barangKeluar = BarangKeluar::findOrFail($id);

        // Cek apakah produk yang baru berbeda dengan produk sebelumnya
        if ($barangKeluar->produk_id != $request->produk_id) {
            // Kembalikan stok produk lama
            $produkLama = Produk::find($barangKeluar->produk_id);
            if ($produkLama) {
                $produkLama->stok += $barangKeluar->qty;
                $produkLama->save();
            }

            // Kurangi stok produk baru
            $produkBaru = Produk::find($request->produk_id);
            if ($produkBaru) {
                $produkBaru->stok -= $request->qty;
                $produkBaru->save();
            }
        } else {
            // Jika produk sama, update stok produk tanpa mengurangi lagi
            $produk = Produk::find($request->produk_id);
            if ($produk) {
                $produk->stok = $produk->stok + $barangKeluar->qty - $request->qty;
                $produk->save();
            }
        }

        // Cek apakah variasi yang baru berbeda dengan variasi sebelumnya
        if ($barangKeluar->variasi_id != $request->variasi_id) {
            // Kembalikan stok variasi lama
            if ($barangKeluar->variasi_id) {
                $variasiLama = Produk_Variasi::find($barangKeluar->variasi_id);
                if ($variasiLama) {
                    $variasiLama->stok += $barangKeluar->qty;
                    $variasiLama->save();
                }
            }

            // Kurangi stok variasi baru
            if ($request->variasi_id) {
                $variasiBaru = Produk_Variasi::find($request->variasi_id);
                if ($variasiBaru) {
                    $variasiBaru->stok -= $request->qty;
                    $variasiBaru->save();
                }
            }
        } else {
            // Jika variasi sama, update stok tanpa mengurangi lagi
            if ($request->variasi_id) {
                $variasi = Produk_Variasi::find($request->variasi_id);
                if ($variasi) {
                    $variasi->stok = $variasi->stok + $barangKeluar->qty - $request->qty;
                    $variasi->save();
                }
            }
        }

        // Update data barang keluar dengan data baru
        $barangKeluar->update([
            'produk_id' => $request->produk_id,
            'variasi_id' => $request->variasi_id,
            'qty' => $request->qty,
            'platform' => $request->platform,
            'host' => $request->host,
            'jamlive' => $request->jamlive,
            'catatan' => $request->catatan,
            'sumber' => $request->sumber,

        ]);

        return redirect()->route('barang-keluar.index')->with('success', 'Data barang keluar berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        // Ambil informasi produk dan variasi
        $produk = Produk::find($barangKeluar->produk_id);

        if ($barangKeluar->variasi_id) {
            $variasi = Produk_Variasi::find($barangKeluar->variasi_id);
            if ($variasi) {
                $variasi->stok += $barangKeluar->qty; // Tambahkan kembali stok variasi
                $variasi->save();
            }
        } else {
            if ($produk) {
                $produk->stok += $barangKeluar->qty; // Tambahkan kembali stok produk utama
                $produk->save();
            }
        }

        // Hapus laporan barang keluar setelah stok dikembalikan
        $barangKeluar->delete();

        return redirect()->route('barang-keluar.index')->with('success', 'Laporan barang keluar berhasil dihapus dan stok dikembalikan.');
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
