<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Models\Produk;
use App\Models\Variasi_Warna;
use App\Models\Variasi_Ukuran;
use App\Models\Variasi_Stok;
use App\Models\Variasi_Gambar;
use App\Models\Kategori;
use App\Models\Produk_Variasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(request('search'));

        return view('dashboard.produk.index', [
            "produk" =>  Produk::latest()->filter(request(['search', 'kategori']))->paginate(10)->withQueryString(),
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
            "video" => "nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:31230",
            "berat" => "required|numeric|min:0",
            "dimensi" => "nullable",
            "diskon" => "required|numeric|min:0|max:100",
            "status" => "required",
        ]);

        // Menangani unggahan gambar utama
        $gambarFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];
        foreach ($gambarFields as $field) {
            if ($request->file($field)) {
                $validatedData[$field] = $request->file($field)->store('gambar');
            }
        }

        // Menangani unggahan video
        if ($request->file('video')) {
            $validatedData['video'] = $request->file('video')->store('video');
        }

        // Simpan data produk utama
        $produk = Produk::create($validatedData);

        // Validasi dan simpan variasi produk
        $variasiData = $request->input('variasi', []);
        foreach ($variasiData as $index => $variasi) {
            if (!empty($variasi['warna']) || !empty($variasi['ukuran']) || !empty($variasi['stok'])) {
                // Validasi variasi
                $validatedVariasi = $this->validateVariasiData($variasi);

                // Menangani warna dan ukuran (mapping ke ID)
                $validatedVariasi['warna_id'] = Variasi_Warna::firstOrCreate(['warna' => $variasi['warna']])->id;
                $validatedVariasi['ukuran_id'] = Variasi_Ukuran::firstOrCreate(['ukuran' => $variasi['ukuran']])->id;

                // Menangani unggahan gambar untuk variasi
                if ($request->file("variasi.{$index}.gambar")) {
                    $validatedVariasi['gambar_id'] = Variasi_Gambar::create([
                        'gambar' => $request->file("variasi.{$index}.gambar")->store('gambar/variasi'),
                    ])->id;
                }

                // Isi stok_id jika ada data stok
                $validatedVariasi['stok_id'] = $variasi['stok_id'] ?? null;

                // Simpan variasi produk
                $produk->variasi()->create($validatedVariasi);
            }
        }

        return redirect('/dashboard/produk')->with('success', 'Produk berhasil ditambahkan!');
    }


    private function validateVariasiData(array $variasi)
    {
        return validator($variasi, [
            'warna' => 'nullable|string|max:255',
            'ukuran' => 'nullable|string|max:255',
            'stok' => 'nullable|integer|min:0',
        ])->validate();
    }

    /**
     * Validasi data variasi.
     *
     * @param array $variasi
     * @param int $produkId
     * @return array
     */
    private function validateVariasi(array $variasi, int $produkId)
    {
        $rules = [
            'warna' => 'nullable|max:255',
            'ukuran' => 'nullable|max:255',
            'stok' => 'required|integer|min:0',
        ];

        $validated = Validator::make($variasi, $rules)->validate();
        $validated['produk_id'] = $produkId;

        return $validated;
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
            "video" => "nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:31230",
            "berat" => "required|numeric|min:0",
            "dimensi" => "nullable",
            "diskon" => "required|numeric|min:0|max:100",
            "status" => "required"
        ];

        // Validasi kode_produk jika diubah
        if ($request->kode_produk !== $produk->kode_produk) {
            $rules['kode_produk'] = "nullable|unique:produks,kode_produk";
        }

        $validatedData = $request->validate($rules);

        // Menangani unggahan gambar
        $gambarFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];
        foreach ($gambarFields as $field) {
            if ($request->file($field)) {
                // Hapus gambar lama jika ada
                if ($produk->$field) {
                    Storage::delete($produk->$field);
                }
                // Simpan gambar baru
                $validatedData[$field] = $request->file($field)->store('gambar');
            }
        }

        // Menangani unggahan video
        if ($request->file('video')) {
            if ($produk->video) {
                Storage::delete($produk->video);
            }
            $validatedData['video'] = $request->file('video')->store('video');
        }

        // Update data produk, kecuali slug
        $produk->update(collect($validatedData)->except(['slug'])->toArray());

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

        // Hapus video jika ada
        if ($produk->video) {
            Storage::delete($produk->video);  // Hapus video dari storage
        }

        // Hapus produk dari database
        $produk->delete();

        return redirect('/dashboard/produk')->with('success', 'Produk berhasil dihapus!');
    }
}
