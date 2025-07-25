<?php

namespace App\Http\Controllers;

use App\Models\BarangReturn;
use App\Models\Produk;
use App\Models\Produk_Variasi;
use App\Http\Requests\StoreBarangReturnRequest;
use App\Http\Requests\UpdateBarangReturnRequest;
use Illuminate\Http\Request;

class BarangReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = BarangReturn::query();

        // Filter berdasarkan tanggal retur
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal_retur', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        // Filter berdasarkan platform
        if ($request->filled('platform')) {
            $query->where('platform', $request->platform);
        }

        // Filter berdasarkan status retur
        if ($request->filled('status_retur')) {
            $query->where('status_retur', $request->status_retur);
        }

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
        $platformList = ['Tiktok_1', 'Tiktok_2', 'Tiktok_3', 'Tiktok_4', 'Shopee', 'Tokopedia'];

        // Opsi status
        $statusList = ['diproses', 'ditolak', 'selesai'];

        return view('dashboard.return.index', compact(
            'returPaket',
            'platformList',
            'statusList',
            'produks',
            'variasis'
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
            'apakah_cargo' => 'required|in:Ya,Tidak',
            'status_return' => 'required|in:Selesai,Belum Selesai',
            'jumlah' => 'required|integer|min:1',
            'alasan_retur' => 'required|string',
            'alasan_lainnya' => 'nullable|string',
            'status_barang' => 'required|in:Barang Masih Ada,Barang Sudah Terpakai',
            'foto_bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_bukti' => 'nullable|mimetypes:video/mp4,video/quicktime|max:10000',
            'catatan' => 'nullable|string',
        ]);

        $fotoPath = null;
        $videoPath = null;

        if ($request->hasFile('foto_bukti')) {
            $fotoPath = $request->file('foto_bukti')->store('retur/foto', 'public');
        }

        if ($request->hasFile('video_bukti')) {
            $videoPath = $request->file('video_bukti')->store('retur/video', 'public');
        }

        BarangReturn::create([
            'tanggal_retur' => $request->tanggal_retur,
            'produk_id' => $request->produk_id,
            'variasi_id' => $request->variasi_id,
            'nama_produk' => Produk::find($request->produk_id)->nama_produk, // Simpan nama produk
            'platform' => $request->platform,
            'nomor_resi' => $request->nomor_resi,
            'ekspedisi' => $request->ekspedisi,
            'apakah_cargo' => $request->apakah_cargo,
            'status_return' => $request->status_return,
            'jumlah' => $request->jumlah,
            'alasan_retur' => $request->alasan_retur,
            'alasan_lainnya' => $request->alasan_lainnya,
            'status_barang' => $request->status_barang,
            'foto_bukti' => $fotoPath,
            'video_bukti' => $videoPath,
            'catatan' => $request->catatan,
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
    public function update(UpdateBarangReturnRequest $request, BarangReturn $barangReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangReturn $barangReturn)
    {
        //
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
