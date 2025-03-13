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
      <button onclick="exportToExcel()" class="btn btn-success d-none" id="exportButton"><i class="bi bi-file-earmark-spreadsheet"></i> Export to Excel</button>
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
    <table class="table table-striped table-hover table-sm" id="dataTable">
      <thead>
        <tr class="table-warning">
          <th scope="col">No.</th>
          <th scope="col">Kode Barang</th>
          <th scope="col">Gambar</th>
          <th scope="col">Nama Barang
            <div class="dropdown d-inline">
              <button class="btn btn-link p-0 dropdown-toggle" type="button" id="sortNamaBarang" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-sort-alpha-down"></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="sortNamaBarang">
                <li><a class="dropdown-item" href="#" onclick="sortTable(3, 'asc')">Sort A-Z</a></li>
                <li><a class="dropdown-item" href="#" onclick="sortTable(3, 'desc')">Sort Z-A</a></li>
              </ul>
            </div>
          </th>
          <th scope="col">Harga
            <div class="dropdown d-inline">
              <button class="btn btn-link p-0 dropdown-toggle" type="button" id="sortHarga" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-sort-numeric-down"></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="sortHarga">
                <li><a class="dropdown-item" href="#" onclick="sortTable(4, 'asc')">Termurah</a></li>
                <li><a class="dropdown-item" href="#" onclick="sortTable(4, 'desc')">Termahal</a></li>
              </ul>
            </div>
          </th>
          <th scope="col">Total Stok
            <div class="dropdown d-inline">
              <button class="btn btn-link p-0 dropdown-toggle" type="button" id="sortTotalStok" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-sort-numeric-down"></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="sortTotalStok">
                <li><a class="dropdown-item" href="#" onclick="sortTable(5, 'asc')">Sedikit</a></li>
                <li><a class="dropdown-item" href="#" onclick="sortTable(5, 'desc')">Banyak</a></li>
              </ul>
            </div>
          </th>
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
                        style="max-height: 70px; max-width: 70px; overflow: hidden; border-radius: 5px; cursor: pointer;"
                        data-bs-toggle="modal" data-bs-target="#imageModal"
                        onclick="showImageModal('{{ asset('storage/' . $p->gambar1) }}')">
                @else
                    <p>No Image</p>
                @endif
            </td>

            <!-- Modal Bootstrap -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">Gambar Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="modalImage" src="" alt="Gambar Produk" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function showImageModal(imageUrl) {
                    document.getElementById('modalImage').src = imageUrl;
                }
            </script>


            <td>{{ $p->nama_produk }}</td>
            <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
            <td>{{ $p->total_stok }}</td>
            <td>
              @if ($p->variasi->count() > 0)
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $p->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                    Lihat Variasi
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $p->id }}">
                    @foreach ($p->variasi as $variasi)
                    @php
                      $stokClass = ($variasi->stok > 5) ? 'bg-success' : 'bg-danger';
                    @endphp
                    <li>
                      <a class="dropdown-item variasi-dropdown-item" href="#">
                        <span class="badge bg-primary">Variasi: {{ $variasi->warna->warna ?? '-' }}</span>
                        <span class="badge bg-warning text-black">Ukuran: {{ $variasi->ukuran->ukuran ?? '-' }}</span>
                        <span class="badge {{ $stokClass }}">Stok: {{ $variasi->stok ?? 0 }}</span>
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="variasi-list d-none">
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
        if (!confirm("Apakah Anda yakin untuk mengekspor data ke Excel?")) {
    return;
  }

      const table = document.getElementById('dataTable');
      const rows = Array.from(table.querySelectorAll('tr'));

      // Hapus kolom aksi sebelum ekspor
      rows.forEach(row => {
        const aksiCell = row.querySelector('.aksi-column');
        if (aksiCell) aksiCell.remove();
      });

      const data = [];
      rows.forEach(row => {
        const cells = Array.from(row.querySelectorAll('th, td'));
        const rowData = cells.map(cell => cell.innerText);

        // Handle variasi column
        const variasiCell = row.querySelector('.variasi-column');
        if (variasiCell && variasiCell.querySelector('.variasi-item')) {
          const variasiItems = variasiCell.querySelectorAll('.variasi-item');
          variasiItems.forEach((item, index) => {
            const itemData = Array.from(cells).map(cell => cell.innerText);
            itemData[6] = item.innerText; // Replace variasi column with item text
            if (index === 0) {
              data.push(itemData);
            } else {
              const emptyRow = new Array(cells.length).fill('');
              emptyRow[6] = item.innerText; // Only fill variasi column
              data.push(emptyRow);
            }
          });
        } else {
          data.push(rowData);
        }
      });

      const ws = XLSX.utils.aoa_to_sheet(data);

      // Set column widths
      const colWidths = data[0].map(() => ({ wpx: 100 }));
      ws['!cols'] = colWidths;

      // Add borders to cells
      const range = XLSX.utils.decode_range(ws['!ref']);
      for (let R = range.s.r; R <= range.e.r; ++R) {
        for (let C = range.s.c; C <= range.e.c; ++C) {
          const cell_address = { c: C, r: R };
          const cell_ref = XLSX.utils.encode_cell(cell_address);
          if (!ws[cell_ref]) continue;
          if (!ws[cell_ref].s) ws[cell_ref].s = {};
          ws[cell_ref].s.border = {
            top: { style: "thin", color: { rgb: "000000" } },
            bottom: { style: "thin", color: { rgb: "000000" } },
            left: { style: "thin", color: { rgb: "000000" } },
            right: { style: "thin", color: { rgb: "000000" } }
          };
        }
      }

      const wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
      XLSX.writeFile(wb, 'Data_stok_barang.xlsx');

      // Reload halaman agar kolom aksi tetap ada
      location.reload();
    }

    function toggleVariasiView() {
      const dropdowns = document.querySelectorAll('.dropdown');
      const lists = document.querySelectorAll('.variasi-list');
      const switchInput = document.getElementById('toggleVariasiSwitch');
      const switchLabel = document.getElementById('toggleVariasiLabel');
      const exportButton = document.getElementById('exportButton');

      dropdowns.forEach(dropdown => dropdown.classList.toggle('d-none'));
      lists.forEach(list => list.classList.toggle('d-none'));

      if (switchInput.checked) {
        switchLabel.innerText = 'On';
        exportButton.classList.remove('d-none');
      } else {
        switchLabel.innerText = 'Off';
        exportButton.classList.add('d-none');
      }
    }

    function sortTable(columnIndex, order) {
  const table = document.getElementById('dataTable');
  const rows = Array.from(table.rows).slice(1); // Exclude header row
  const sortedRows = rows.sort((a, b) => {
    let aText = a.cells[columnIndex].innerText.trim().toLowerCase();
    let bText = b.cells[columnIndex].innerText.trim().toLowerCase();

    // Jika kolom adalah Harga atau Total Stok, parsing sebagai angka
    if (columnIndex === 4 || columnIndex === 5) {
      aText = parseFloat(aText.replace(/[^\d]/g, "")) || 0;
      bText = parseFloat(bText.replace(/[^\d]/g, "")) || 0;
    }

    if (aText < bText) return order === 'asc' ? -1 : 1;
    if (aText > bText) return order === 'asc' ? 1 : -1;
    return 0;
  });

  const tbody = table.querySelector('tbody');
  tbody.innerHTML = '';
  sortedRows.forEach((row, index) => {
    row.cells[0].innerText = index + 1; // Update nomor urut
    tbody.appendChild(row);
  });
}


  </script>

  <style>
    .variasi-item {
      margin-bottom: 2px; /* Mengurangi jarak ke bawah */
    }
    .variasi-dropdown-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 4px 6px; /* Mengurangi padding */
      border-bottom: 1px solid #e9ecef;
      background-color: #f8f9fa;
      border-radius: 5px;
      margin-bottom: 1px; /* Mengurangi jarak ke bawah */
    }
    .variasi-dropdown-item:last-child {
      border-bottom: none;
    }
    .variasi-dropdown-item .badge {
      margin-right: 5px;
    }
    .dropdown-menu {
      background-color: #ffffff;
      border: 1px solid #e9ecef;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .dropdown-menu .dropdown-item:hover {
      background-color: #e9ecef;
    }
  </style>
@endsection
