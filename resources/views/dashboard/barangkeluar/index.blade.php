@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Barang Keluar</h1>
  </div>

  {{-- Form Buat Laporan Barang Keluar --}}
  <div class="card mb-4">
    <div class="card-header bg-primary text-white">
      <strong>Buat Laporan Barang Keluar</strong>
    </div>
    <div class="card-body">
      <form action="{{ route('barang-keluar.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" required>
          </div>
          <div class="col-md-3">
            <label for="produk_id" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
          </div>
          <div class="col-md-3">
            <label for="variasi_id" class="form-label">Variasi (Opsional)</label>
            <select name="variasi_id" class="form-select" id="variasi_id">
              <option value="">-- Pilih Variasi --</option>
              <!-- Variasi akan dimuat disini setelah produk dipilih -->
            </select>
          </div>

          <div class="col-md-2">
            <label for="qty" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="qty" min="1" required>
          </div>
          <div class="col-md-2 mt-3">
            <label for="platform" class="form-label">Platform</label>
            <select class="form-select" name="platform" required>
              <option value="">-- Pilih Platform --</option>
              <option value="Shopee 1">Shopee 1</option>
              <option value="Shopee 2">Shopee 2</option>
              <option value="Shopee 3">Shopee 3</option>
              <option value="Shopee 4">Shopee 4</option>
              <option value="Tiktok 1">Tiktok 1</option>
              <option value="Tiktok 2">Tiktok 2</option>
              <option value="Tiktok 3">Tiktok 3</option>
              <option value="Tiktok 4">Tiktok 4</option>
              <option value="Tokopedia 1">Tokopedia 1</option>
              <option value="Tokopedia 2">Tokopedia 2</option>
              <option value="Tokopedia 3">Tokopedia 3</option>
            </select>
          </div>
          <div class="col-md-2 mt-3">
            <label for="host" class="form-label">Host</label>
            <input type="text" class="form-control" name="host" required>
          </div>
          <div class="col-md-2 mt-3">
            <label for="jamlive" class="form-label">Jam Live / Toko</label>
            <input type="text" class="form-control" name="jamlive" required>
          </div>
          <div class="col-md-2 d-flex align-items-end mt-3">
            <button type="submit" class="btn btn-success w-100"><i class="bi bi-save"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  {{-- Tabel Riwayat Barang Keluar --}}
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <strong>Riwayat Barang Keluar</strong>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Nama Barang</th>
              <th>Variasi</th>
              <th>Jumlah</th>
              <th>Platform</th>
              <th>Host</th>
              <th>Jam Live/Toko</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($barangKeluar as $bk)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bk->tanggal }}</td>
                <td>{{ $bk->produk->nama_produk }}</td> <!-- Ganti sesuai relasi dengan model -->
                <td>{{ $bk->variasi ? $bk->variasi->warna->warna . ' - ' . $bk->variasi->ukuran->ukuran : '-' }}</td>
                <td>{{ $bk->qty }}</td>
                <td>{{ $bk->platform }}</td>
                <td>{{ $bk->host }}</td>
                <td>{{ $bk->jamlive }}</td>
                <td>
                  <form action="{{ route('barang-keluar.destroy', $bk->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                      <i class="bi bi-trash"></i> Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center">Belum ada laporan barang keluar.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <!-- Muat jQuery terlebih dahulu -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Setelah itu muat jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Pastikan untuk memuat CSS jQuery UI agar tampilan autocomplete muncul dengan benar -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <script>
    $(document).ready(function() {
    // Autocomplete untuk nama produk
    $("input[name='nama_produk']").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('barang-keluar.autocomplete') }}",
                data: { term: request.term },
                success: function(data) {
                    console.log(data);  // Cek data yang diterima

                    response($.map(data, function(item) {
                        return {
                            label: item.nama_produk,  // Nama produk ditampilkan
                            value: item.nama_produk,  // Nilai yang akan diisi di input
                            id: item.id  // ID produk yang akan digunakan saat memilih
                        };
                    }));
                }
            });
        },
        minLength: 2,  // Minimal 2 karakter untuk mulai pencarian
        select: function(event, ui) {
            var produkId = ui.item.id;
            console.log('Produk ID yang dipilih: ' + produkId);

            // Kirim permintaan untuk mendapatkan variasi produk berdasarkan ID produk
            $.ajax({
                url: '/barang-keluar/' + produkId + '/variasi',  // Sesuaikan route untuk mendapatkan variasi produk
                type: 'GET',
                success: function(data) {
                    var variasiSelect = $("select[name='variasi_id']");
                    variasiSelect.empty();  // Hapus pilihan yang ada sebelumnya

                    if (data.variasi.length > 0) {
                        variasiSelect.append('<option value="">Pilih Variasi</option>');
                        data.variasi.forEach(function(variasi) {
                            var warna = variasi.warna ? variasi.warna.warna : '-';
                            var ukuran = variasi.ukuran ? variasi.ukuran.ukuran : '-';
                            variasiSelect.append('<option value="' + variasi.id + '">' + warna + ' - ' + ukuran + '</option>');
                        });
                    } else {
                        variasiSelect.append('<option value="">Tidak ada variasi</option>');
                    }
                }
            });
        }
    });
});
  </script>
@endsection
