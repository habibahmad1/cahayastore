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
            <select class="form-select" name="produk_id" id="produk_id" required>
              <option value="">-- Pilih Produk --</option>
              @foreach ($produks as $produk)
            <option value="{{ $produk->id }}"
                    data-variasi="{{ $produk->variasi->toJson() }}">
                {{ $produk->nama_produk }}
            </option>
            @endforeach

            </select>
          </div>
          <div class="col-md-3">
            <label for="variasi_id" class="form-label">Variasi (Opsional)</label>
            <select class="form-select" name="variasi_id" id="variasi_id">
              <option value="">-- Pilih Variasi --</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="qty" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="qty" min="1" required>
          </div>
          <div class="col-md-2 d-flex align-items-end my-3">
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
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($barangKeluar as $bk)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bk->tanggal }}</td>
                <td>{{ $bk->produk->nama_produk }}</td>
                <td>{{ $bk->variasi->warna->warna ?? '-' }}</td>
                <td>{{ $bk->qty }}</td>
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
                <td colspan="6" class="text-center">Belum ada laporan barang keluar.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
   document.getElementById('produk_id').addEventListener('change', function () {
    let selectedProduct = this.options[this.selectedIndex];
    let variasiDropdown = document.getElementById('variasi_id');
    let variasiData = JSON.parse(selectedProduct.getAttribute('data-variasi') || '[]');

    variasiDropdown.innerHTML = '<option value="">-- Pilih Variasi --</option>';
    variasiData.forEach(variasi => {
        let option = document.createElement('option');
        option.value = variasi.id;
        option.textContent = (variasi.ukuran ? variasi.ukuran.ukuran : 'Tanpa Ukuran') +
                             ' - ' + (variasi.warna ? variasi.warna.warna : 'Tanpa Warna');
        variasiDropdown.appendChild(option);
    });
});

  </script>
@endsection
