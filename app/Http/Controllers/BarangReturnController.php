<?php

namespace App\Http\Controllers;

use App\Models\BarangReturn;
use App\Models\Produk;
use App\Models\Produk_Variasi;
use App\Http\Requests\StoreBarangReturnRequest;
use App\Http\Requests\UpdateBarangReturnRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Kategori;


class BarangReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function platformOptions(): array
    {
        return [
            'Tiktok 1',
            'Tiktok 2',
            'Tiktok 3',
            'Tiktok 4',
            'Shopee 1',
            'Shopee 2',
            'Shopee 3',
            'Shopee 4',
            'Tokopedia 1',
            'Tokopedia 2',
            'No Platform',
        ];
    }

    private function ekspedisiOptions(): array
    {
        return [
            'J&T',
            'J&T Cargo',
            'Goto Logistik',
            'SPX',
            'JNE',
            'JNE Cargo',
            'Ninja',
            'Lalamove',
        ];
    }

    public function index(Request $request)
    {
        $query = BarangReturn::query();

        // Filter berdasarkan tanggal retur
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal_retur', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        // Filter berdasarkan produk
        if ($request->filled('produk_id')) {
            $query->where('produk_id', $request->produk_id);
        }

        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->whereHas('produk.kategori', function ($q) use ($request) {
                $q->where('id', $request->kategori);
            });
        }

        // Filter berdasarkan nomor resi
        if ($request->filled('nomor_resi')) {
            $query->where('nomor_resi', 'LIKE', '%' . $request->nomor_resi . '%');
        }

        // Filter berdasarkan Tanggal Resi Keluar (tanggal_keluar)
        if ($request->filled('tanggal_keluar_mulai') && $request->filled('tanggal_keluar_selesai')) {
            $query->whereBetween('tanggal_keluar', [
                $request->tanggal_keluar_mulai,
                $request->tanggal_keluar_selesai
            ]);
        } elseif ($request->filled('tanggal_keluar_mulai')) {
            $query->whereDate('tanggal_keluar', '>=', $request->tanggal_keluar_mulai);
        } elseif ($request->filled('tanggal_keluar_selesai')) {
            $query->whereDate('tanggal_keluar', '<=', $request->tanggal_keluar_selesai);
        }


        // Filter berdasarkan resi keluar
        if ($request->filled('nomor_resi_keluar')) {
            $query->where('nomor_resi_keluar', 'LIKE', '%' . $request->nomor_resi_keluar . '%');
        }


        // Platform tetap berdasarkan data
        if ($request->filled('platform')) {
            $query->where('platform', $request->platform);
        }

        // Filter berdasarkan ekspedisi
        if ($request->filled('ekspedisi')) {
            $query->where('ekspedisi', $request->ekspedisi);
        }


        // Ambil list platform dinamis dari database (distinct)
        $platformList = BarangReturn::select('platform')
            ->distinct()
            ->orderBy('platform')
            ->pluck('platform');


        // Tentukan limit data per halaman
        $limit = $request->input('limit', 50);

        if ($limit === 'all') {
            $returPaket = $query->latest()->get();
        } else {
            $returPaket = $query->latest()->paginate((int) $limit);
            $returPaket->appends($request->query());
        }

        // Ambil data produk dan variasi untuk form/modal
        $produks = Produk::all();
        $variasis = Produk_Variasi::with(['warna', 'ukuran'])->get();

        // Opsi platform
        $platformList = $this->platformOptions();
        $ekspedisiList = $this->ekspedisiOptions();


        // Opsi status
        $statusList = ['diproses', 'ditolak', 'selesai'];

        $kategori = Kategori::all();


        return view('dashboard.return.index', compact(
            'returPaket',
            'platformList',
            'ekspedisiList',
            'statusList',
            'produks',
            'variasis',
            'kategori'
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::with(['variasi.warna', 'variasi.ukuran'])->get(); // Sesuaikan dengan relasi variasi yang kamu pakai
        return view('dashboard.return.create', compact('produks'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_retur' => 'required|date',
            'produk_id' => 'required|exists:produks,id',
            'variasi_id' => 'nullable|exists:produk_variasis,id',
            'platform' => 'required|string',
            'nomor_resi' => 'nullable|string',
            'ekspedisi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'alasan_retur' => 'required|string',
            'alasan_lainnya' => 'nullable|string',
            'foto_bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'catatan' => 'nullable|string',
            'tanggal_keluar' => 'nullable|date',
            'jumlah_keluar' => 'nullable|integer|min:0',
            'nomor_resi_keluar' => 'nullable|string',
        ]);

        $fotoPath = $request->file('foto_bukti')?->store('retur/foto', 'public');
        $videoPath = $request->file('video_bukti')?->store('retur/video', 'public');

        BarangReturn::create([
            'tanggal_retur' => $request->tanggal_retur,
            'produk_id' => $request->produk_id,
            'variasi_id' => $request->variasi_id,
            'nama_produk' => Produk::find($request->produk_id)->nama_produk,
            'platform' => $request->platform,
            'nomor_resi' => $request->nomor_resi,
            'ekspedisi' => $request->ekspedisi,
            'jumlah' => $request->jumlah,
            'alasan_retur' => $request->alasan_retur,
            'alasan_lainnya' => $request->alasan_lainnya,
            'foto_bukti' => $fotoPath,
            'catatan' => $request->catatan,
            'tanggal_keluar' => $request->tanggal_keluar,
            'jumlah_keluar' => $request->jumlah_keluar ?? 0,
            'nomor_resi_keluar' => $request->nomor_resi_keluar,
        ]);

        return redirect()->route('barang-return.index')->with('success', 'Data retur berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(BarangReturn $barangReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangReturn $barangReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangReturn $barangReturn)
    {
        $request->validate([
            'tanggal_retur' => 'required|date',
            'produk_id' => 'required|exists:produks,id',
            'variasi_id' => 'nullable|exists:produk_variasis,id',
            'platform' => 'required|string',
            'nomor_resi' => 'nullable|string',
            'ekspedisi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'alasan_retur' => 'required|string',
            'alasan_lainnya' => 'nullable|string',
            'foto_bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'catatan' => 'nullable|string',
            'tanggal_keluar' => 'nullable|date',
            'jumlah_keluar' => 'nullable|integer|min:0',
            'nomor_resi_keluar' => 'nullable|string',
        ]);

        if ($request->hasFile('foto_bukti')) {
            if ($barangReturn->foto_bukti) {
                Storage::disk('public')->delete($barangReturn->foto_bukti);
            }
            $barangReturn->foto_bukti = $request->file('foto_bukti')->store('retur/foto', 'public');
        }

        $barangReturn->update([
            'tanggal_retur' => $request->tanggal_retur,
            'produk_id' => $request->produk_id,
            'variasi_id' => $request->variasi_id,
            'nama_produk' => Produk::find($request->produk_id)->nama_produk,
            'platform' => $request->platform,
            'nomor_resi' => $request->nomor_resi,
            'ekspedisi' => $request->ekspedisi,
            'jumlah' => $request->jumlah,
            'alasan_retur' => $request->alasan_retur,
            'alasan_lainnya' => $request->alasan_lainnya,
            'catatan' => $request->catatan,
            'tanggal_keluar' => $request->tanggal_keluar,
            'jumlah_keluar' => $request->jumlah_keluar ?? 0,
            'nomor_resi_keluar' => $request->nomor_resi_keluar,
        ]);

        return redirect()->route('barang-return.index')->with('success', 'Data retur berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangReturn $barangReturn)
    {
        // Hapus foto jika ada
        if ($barangReturn->foto_bukti) {
            Storage::disk('public')->delete($barangReturn->foto_bukti);
        }

        // Hapus video jika ada
        // if ($barangReturn->video_bukti) {
        //     Storage::disk('public')->delete($barangReturn->video_bukti);
        // }

        // Hapus data retur dari database
        $barangReturn->delete();

        return redirect()->route('barang-return.index')->with('success', 'Data retur berhasil dihapus.');
    }


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
    // public function getVariasi($produkId)
    // {
    //     // Mengambil variasi berdasarkan produk_id dan memuat informasi warna dan ukuran
    //     $variasi = Produk_Variasi::where('produk_id', $produkId)
    //         ->with(['warna', 'ukuran']) // Pastikan relasi warna dan ukuran dimuat
    //         ->get();

    //     // Mengirimkan variasi dengan nama warna dan ukuran
    //     return response()->json(['variasi' => $variasi]);
    // }


    public function getVariasi($produkId)
    {
        $variasi = Produk_Variasi::with(['warna', 'ukuran', 'gambar'])
            ->where('produk_id', $produkId)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'warna' => $item->warna,
                    'ukuran' => $item->ukuran,
                    'gambar' => $item->gambar ? $item->gambar->gambar : null, // asumsi field 'gambar' di tabel
                ];
            });

        return response()->json(['variasi' => $variasi]);
    }
}
