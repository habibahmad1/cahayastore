@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ ucfirst(auth()->user()->name) }}</h1>
  </div>

  <!-- Form Pilihan Periode -->
<div class="mb-4">
    <a href="{{ route('dashboard.index', ['periode' => '1bulan']) }}" class="btn btn-primary">1 Bulan Terakhir</a>
    <a href="{{ route('dashboard.index', ['periode' => '3bulan']) }}" class="btn btn-primary">3 Bulan Terakhir</a>
</div>

<!-- Grafik -->
<canvas id="myChart" width="400" height="100" class="mb-4"></canvas>

  <div class="row">
    <div class="col-md-3 mb-4 card-anim">
      <a href="/dashboard/produk" class="text-decoration-none">
        <div class="card-dashboard text-center shadow-sm" style="color: black">
          <div class="card-body">
            <h3>Total Produk</h3>
            <hr>
            <h1>{{ $produk->count() }}</h1>
          </div>
        </div>
      </a>
    </div>

    @can('admin')
    <div class="col-md-3 mb-4 card-anim">
      <div class="card-dashboard text-center shadow-sm">
        <div class="card-body">
          <h3>Kategori Produk</h3>
          <hr>
          <h1>{{ $kategori->count() }}</h1>
        </div>
      </div>
    </div>
    @endcan

    @can('admin')
    <div class="col-md-3 mb-4 card-anim">
      <div class="card-dashboard text-center shadow-sm">
        <div class="card-body">
          <h3>Total User</h3>
          <hr>
          <h1>{{ $user->count() }}</h1>
        </div>
      </div>
    </div>
    @endcan

    @can('admin')
    <div class="col-md-3 mb-4 card-anim">
      <div class="card-dashboard text-center shadow-sm">
        <div class="card-body">
          <h3>Total Artikel</h3>
          <hr>
          <h1>{{ $artikel->count() }}</h1>
        </div>
      </div>
    </div>
    @endcan

    <div class="col-md-3 mb-4 card-anim">
      <a href="/dashboard/artikel" class="text-decoration-none">
        <div class="card-dashboard text-center shadow-sm" style="color: black">
          <div class="card-body">
            <h3>Artikel Saya</h3>
            <hr>
            <h1>{{ auth()->user()->artikel->count() }}</h1>
          </div>
        </div>
      </a>
    </div>
  </div>

  <div class="floating-icon">
    <button class="close-icon">&times;</button>
    <img src="img/iconwl/iconminca.png" alt="Help Icon" class="main-icon">
    <img src="img/iconwl/teksminca.png" alt="Hover Icon" class="hover-icon">
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var dataBarangKeluar = @json($dataBarangKeluar);
    var today = new Date().toISOString().split('T')[0];

    var backgroundColors = dataBarangKeluar.map(item => item.date === today ? 'rgba(255, 165, 0, 0.6)' : 'rgba(144, 238, 144, 0.6)');
    var borderColors = dataBarangKeluar.map(item => item.date === today ? 'rgba(255, 140, 0, 1)' : 'rgba(60, 179, 113, 1)');

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataBarangKeluar.map(item => item.date),
            datasets: [{
                label: 'Barang Terjual',
                data: dataBarangKeluar.map(item => item.total_qty),
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var index = tooltipItem.dataIndex;
                            var totalQty = dataBarangKeluar[index]?.total_qty || 0;
                            var totalHarga = dataBarangKeluar[index]?.total_harga || 0;

                            // Format angka dengan titik tiap 3 digit
                            var formattedHarga = new Intl.NumberFormat('id-ID', {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }).format(totalHarga);

                            return `Terjual: ${totalQty} pcs\nTotal Harga: Rp ${formattedHarga}`;
                        }
                    }
                }
            }
        }
    });
</script>

@endsection
