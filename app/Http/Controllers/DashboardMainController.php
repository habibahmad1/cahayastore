<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Produk;
use App\Models\Artikel;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


use Illuminate\Http\Request;

class DashboardMainController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        // Cek apakah user pakai filter manual
        if ($startDate && $endDate) {
            $tanggalMulai = $startDate;
            $tanggalAkhir = $endDate;
        } else {
            // Default: 1 bulan terakhir
            $tanggalMulai = now()->subMonth()->toDateString();
            $tanggalAkhir = now()->toDateString();
        }

        $dataBarangKeluar = BarangKeluar::select(
            DB::raw('DATE(tanggal) as date'),
            DB::raw('SUM(qty) as total_qty'),
            DB::raw('SUM(qty * produks.harga) as total_harga')
        )
            ->join('produks', 'barang_keluars.produk_id', '=', 'produks.id')
            ->whereBetween('tanggal', [$tanggalMulai, $tanggalAkhir])
            ->groupBy(DB::raw('DATE(tanggal)'))
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('dashboard.index', [
            "produk" => Produk::all(),
            "kategori" => Kategori::all(),
            "user" => User::all(),
            "artikel" => Artikel::all(),
            "dataBarangKeluar" => $dataBarangKeluar
        ]);
    }
}
