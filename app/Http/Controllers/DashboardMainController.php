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
        // Ambil tanggal dari request, atau pakai default 7 hari terakhir
        $startDate = $request->query('start_date', now()->subDays(6)->toDateString());
        $endDate = $request->query('end_date', now()->toDateString());

        // Ambil data barang keluar untuk grafik
        $dataBarangKeluar = BarangKeluar::select(
            DB::raw('DATE(tanggal) as date'),
            DB::raw('SUM(qty) as total_qty'),
            DB::raw('SUM(qty * produks.harga) as total_harga')
        )
            ->join('produks', 'barang_keluars.produk_id', '=', 'produks.id')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->groupBy(DB::raw('DATE(tanggal)'))
            ->orderBy('tanggal', 'asc')
            ->get();

        // Total barang terjual (qty) selama periode
        $totalTerjual = BarangKeluar::whereBetween('tanggal', [$startDate, $endDate])->sum('qty');

        return view('dashboard.index', [
            "produk" => Produk::all(),
            "kategori" => Kategori::all(),
            "user" => User::all(),
            "artikel" => Artikel::all(),
            "dataBarangKeluar" => $dataBarangKeluar,
            "totalTerjual" => $totalTerjual,
            "startDate" => $startDate,
            "endDate" => $endDate
        ]);
    }
}
