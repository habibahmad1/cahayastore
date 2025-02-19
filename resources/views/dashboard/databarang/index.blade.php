@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Stok Barang</h1>
  </div>

  <div class="col-lg-8 pencarian">
    <form action="/dashboard/databarang" method="GET">
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Cari Produk.." name="search" value="{{ request('search') }}" id="search-box">

            <select class="form-select" name="kategori">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>

            <button class="btn btn-warning" type="submit">Cari</button>
            @if(request('search') || request('kategori'))
                <a href="/dashboard/databarang" class="btn btn-danger">Clear</a>
            @endif
        </div>
    </form>
</div>

  <div class="mb-3 d-flex justify-content-between align-items-center">
    <div>
      <a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Tambah Data</a>
      <button onclick="exportToExcel()" class="btn btn-success d-none" id="exportButton"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</button>
      <button onclick="printTable()" class="btn btn-secondary d-none" id="printButton"><i class="bi bi-printer"></i> Print</button>
    </div>
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="toggleVariasiSwitch" onclick="toggleVariasiView()">
      <label class="form-check-label" for="toggleVariasiSwitch" id="toggleVariasiLabel">Off</label>
    </div>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-7" role="alert">
        {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive small col-lg-12">
    <table class="table table-hover table-sm table-striped" id="dataTable">
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
            <td class="variasi-column">
              @if ($p->variasi->count() > 0)
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $p->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                    Lihat Variasi
                  </button>
                  <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton{{ $p->id }}">
                    <table class="table table-bordered table-sm">
                      <thead>
                        <tr>
                          <th>Variasi</th>
                          <th>Ukuran</th>
                          <th>Stok</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($p->variasi as $variasi)
                        @php
                          $stokClass = ($variasi->stok > 5) ? 'bg-success' : 'bg-danger';
                        @endphp
                        <tr>
                          <td><span class="badge bg-primary">{{ $variasi->warna->warna ?? '-' }}</span></td>
                          <td><span class="badge bg-warning text-black">{{ $variasi->ukuran->ukuran ?? '-' }}</span></td>
                          <td><span class="badge {{ $stokClass }}">{{ $variasi->stok ?? 0 }}</span></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </ul>
                </div>
                <div class="variasi-list d-none">
                  @foreach ($p->variasi as $variasi)
                  @php
                    $stokClass = ($variasi->stok > 5) ? 'bg-success' : 'bg-danger';
                  @endphp
                  <p class="variasi-item">
                    <span class="badge bg-primary">Variasi: {{ $variasi->warna->warna ?? '-' }}</span>
                    <span class="badge bg-warning text-black">Ukuran: {{ $variasi->ukuran->ukuran ?? '-' }}</span>
                    <span class="badge {{ $stokClass }}">Stok: {{ $variasi->stok ?? 0 }}</span>
                  </p>
                  @endforeach
                </div>
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
    if (!confirm("Apakah Anda yakin ingin mengekspor data ke Excel?")) {
        return; // Batalkan ekspor jika pengguna membatalkan konfirmasi
    }

    const table = document.getElementById('dataTable');
    const rows = Array.from(table.querySelectorAll('tr'));

    // Hapus kolom aksi sebelum ekspor
    rows.forEach(row => {
        const aksiCell = row.querySelector('.aksi-column');
        if (aksiCell) aksiCell.remove();
    });

    // Ambil data dari tabel
    let data = rows.map(row => Array.from(row.querySelectorAll('th, td')).map(cell => cell.innerText));

    // Tambahkan total stok di akhir file
    let totalStok = 0;
    for (let i = 1; i < data.length; i++) { // Mulai dari 1 untuk melewati header
        let stok = data[i][5] ? parseInt(data[i][5].replace(/\D/g, '')) || 0 : 0;
 // Ambil kolom stok dan hilangkan karakter selain angka
        totalStok += stok;
    }

    // Tambahkan baris total stok ke dalam data
    data.push(["", "", "", "", "Total Stok Keseluruhan", totalStok]);

    // Buat sheet dan workbook
    const ws = XLSX.utils.aoa_to_sheet(data);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

    // Format nama file dengan tanggal
    const today = new Date().toISOString().split('T')[0]; // Format: YYYY-MM-DD
    const fileName = `stok_barang_${today}.xlsx`;

    // Simpan file
    XLSX.writeFile(wb, fileName);

    // Reload halaman agar kolom aksi tetap ada
    location.reload();
    }

    function toggleVariasiView() {
      const dropdowns = document.querySelectorAll('.dropdown');
      const lists = document.querySelectorAll('.variasi-list');
      const switchInput = document.getElementById('toggleVariasiSwitch');
      const switchLabel = document.getElementById('toggleVariasiLabel');
      const exportButton = document.getElementById('exportButton');
      const printButton = document.getElementById('printButton');

      dropdowns.forEach(dropdown => dropdown.classList.toggle('d-none'));
      lists.forEach(list => list.classList.toggle('d-none'));

      if (switchInput.checked) {
        switchLabel.innerText = 'On';
        exportButton.classList.remove('d-none');
        printButton.classList.remove('d-none');
      } else {
        switchLabel.innerText = 'Off';
        exportButton.classList.add('d-none');
        printButton.classList.add('d-none');
      }
    }
  </script>

  <style>
    .variasi-item {
      margin-bottom: 5px;
    }
  </style>
@endsection
