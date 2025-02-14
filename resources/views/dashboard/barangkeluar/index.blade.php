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
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" required>
          </div>
          <div class="col-md-3">
            <label for="variasi" class="form-label">Variasi (Opsional)</label>
            <input type="text" class="form-control" name="variasi">
          </div>
          <div class="col-md-2">
            <label for="qty" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="qty" min="1" required>
          </div>
          <div class="col-md-2 mt-3">
            <label for="platform" class="form-label">Platform</label>
            <select class="form-select" name="platform" required>
              <option value="">-- Pilih Platform --</option>
              <option value="Shopee1">Shopee 1</option>
              <option value="Shopee2">Shopee 2</option>
              <option value="Shopee3">Shopee 3</option>
              <option value="Shopee4">Shopee 4</option>
              <option value="Tiktok1">Tiktok 1</option>
              <option value="Tiktok2">Tiktok 2</option>
              <option value="Tiktok3">Tiktok 3</option>
              <option value="Tiktok4">Tiktok 4</option>
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
                <td>{{ $bk->nama_barang }}</td>
                <td>{{ $bk->variasi ?? '-' }}</td>
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
