@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ ucfirst(auth()->user()->name) }}</h1>
  </div>

<!-- Form Filter Berdasarkan Tanggal -->
<div class="row">
    <div class="col-12">
        <form action="{{ route('dashboard.index') }}" method="GET" class="d-flex align-items-end flex-wrap gap-2 mb-4">
            <div>
                <label for="start_date" class="form-label mb-0">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date', $startDate) }}">
            </div>

            <div>
                <label for="end_date" class="form-label mb-0">Tanggal Akhir</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date', $endDate) }}">
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>

            <div>
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Reset</a>
            </div>
        </form>
    </div>
</div>


{{-- <!-- Tombol Filter Periode Cepat -->
<div class="mb-4">
    <a href="{{ route('dashboard.index', ['periode' => '1bulan']) }}" class="btn btn-primary">1 Bulan Terakhir</a>
    <a href="{{ route('dashboard.index', ['periode' => '3bulan']) }}" class="btn btn-primary">3 Bulan Terakhir</a>
</div> --}}

<h3>Total Terjual
  <small class="d-block" style="font-size: 12px;">
    ({{ $startDate }} s/d {{ $endDate }})
  </small>
</h3>
<h1>{{ $totalTerjual }} pcs</h1>

<!-- Grafik -->
<div class="table-responsive">
    <div style="min-width: 600px;">
      <canvas id="myChart" height="400" class="mb-4 w-100"></canvas>
    </div>
  </div>

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




  <!-- Floating Icon -->
  <div class="floating-icon">
    <button class="close-icon">&times;</button>
    <img src="img/iconwl/iconminca.png" alt="Help Icon" class="main-icon">
    <img src="img/iconwl/teksminca.png" alt="Hover Icon" class="hover-icon">
  </div>

  <!-- Chat Window -->
  <div class="chat-window" id="chatWindow">
    <div class="chat-header">
      <h4>Group Chat</h4>
      <button class="close-chat">&times;</button>
    </div>
    <div class="chat-body">
      <!-- Chat content goes here -->
    </div>
    <div class="chat-footer">
      <input type="text" id="chatMessage" placeholder="Type a message...">
      <button id="sendMessageButton">Send</button>
    </div>
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


<style>
  .floating-icon {
    position: fixed;
    bottom: 20px;
    right: 20px;
    cursor: pointer;
  }

  .chat-window {
    display: none;
    position: fixed;
    bottom: 80px;
    right: 20px;
    width: 300px;
    background: white;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .chat-window.show {
    display: block;
  }

  .chat-header, .chat-footer {
    padding: 10px;
    background: #f1f1f1;
    border-bottom: 1px solid #ccc;
  }

  .chat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .chat-body {
    padding: 10px;
    height: 200px;
    overflow-y: auto;
  }

  .chat-footer input {
    width: calc(100% - 60px);
    padding: 5px;
  }

  .chat-footer button {
    padding: 5px 10px;
  }

  .close-chat {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
  }
</style>

@endsection
