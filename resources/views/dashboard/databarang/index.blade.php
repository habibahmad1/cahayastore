@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Stok Barang</h1>
  </div>

  <div class="col-lg-8 pencarian">
    <form action="/dashboard/databarang" method="GET">
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Cari Produk.." name="search" value="{{ request('search') }}" id="search-box">
            <button class="btn btn-warning" type="submit">Cari</button>
            @if(request('search'))
                <a href="/dashboard/databarang" class="btn btn-danger">Clear</a>
            @endif
        </div>
    </form>
</div>


  <div class="mb-3">
    <a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Tambah Data</a>
    <button onclick="exportToExcel()" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet"></i> Export to Excel</button>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-7" role="alert">
        {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive small col-lg-12">
    <table class="table table-hover table-sm" id="dataTable">
      <thead>
        <tr class="table-warning">
          <th scope="col">No.</th>
          <th scope="col">Kode Barang</th>
          <th scope="col">Gambar</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga</th>
          <th scope="col">Total Stok</th>
          <th scope="col">Variasi</th>
          <th scope="col" class="aksi-column">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produk as $p)
        <tr class="table-primary">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->kode_produk }}</td>
            <td>
                @if ($p->gambar1)
                  <img src="{{ asset('storage/' . $p->gambar1) }}" alt="Gambar Produk"
                  style="max-height: 70px; max-width: 70px; overflow: hidden; border-radius: 5px;">
                @else
                  <p>No Image</p>
                @endif
            </td>
            <td>{{ $p->nama_produk }}</td>
            <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
            <td>{{ $p->total_stok }}</td>
            <td>
              @if ($p->variasi->count() > 0)
                <ul>
                  @foreach ($p->variasi as $variasi)
                  @php
                    $stokClass = ($variasi->stok > 5) ? 'bg-success' : 'bg-danger';
                  @endphp
                    <li style="list-style-type: number">
                      <span class="badge bg-primary">Variasi: {{ $variasi->warna->warna ?? '-' }}</span>
                      <span class="badge bg-warning text-black">Ukuran: {{ $variasi->ukuran->ukuran ?? '-' }}</span>
                      <span class="badge {{ $stokClass }}">Stok: {{ $variasi->stok ?? 0 }}</span>
                    </li>
                  @endforeach
                </ul>
              @else
                <p>-</p>
              @endif
            </td>
            <td class="aksi-column">
              <a href="{{ route('produk.show', $p->slug) }}" class="badge bg-info">
                <i class="bi bi-eye-fill"></i>
              </a>
              <a href="{{ route('produk.edit', $p->slug) }}" class="badge bg-warning">
                <i class="bi bi-pencil-square"></i>
              </a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.0/dist/xlsx.full.min.js"></script>
  <script>
    function printTable() {
      // Sembunyikan kolom aksi sebelum print
      document.querySelectorAll('.aksi-column').forEach(el => el.style.display = 'none');

      window.print();

      // Kembalikan kolom aksi setelah print
      document.querySelectorAll('.aksi-column').forEach(el => el.style.display = '');
    }

    function exportToExcel() {
      const table = document.getElementById('dataTable');
      const rows = Array.from(table.querySelectorAll('tr'));

      // Hapus kolom aksi sebelum ekspor
      rows.forEach(row => {
        const aksiCell = row.querySelector('.aksi-column');
        if (aksiCell) aksiCell.remove();
      });

      const data = rows.map(row => Array.from(row.querySelectorAll('th, td')).map(cell => cell.innerText));
      const ws = XLSX.utils.aoa_to_sheet(data);
      const wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
      XLSX.writeFile(wb, 'Data_stok_barang.xlsx');

      // Reload halaman agar kolom aksi tetap ada
      location.reload();
    }
  </script>
@endsection
