@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Stok Barang</h1>
  </div>

  <div class="col-lg-8 pencarian">
    <form action="/dashboard/databarang" method="GET">
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Cari Produk.." name="search" value="{{ request('search') }}">

            <select class="form-select" name="kategori">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>

            <select class="form-select" name="sort">
                <option value="">-- Urutkan --</option>
                <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                <option value="terlaris" {{ request('sort') == 'terlaris' ? 'selected' : '' }}>Terlaris</option>
            </select>

            <button class="btn btn-warning" type="submit">Cari</button>
            @if(request('search') || request('kategori') || request('sort'))
                <a href="/dashboard/databarang" class="btn btn-danger">Clear</a>
            @endif
        </div>
    </form>

</div>

<div class="mb-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
      <!-- Kiri: Tombol aksi -->
      <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('produk.create') }}" class="btn btn-primary">
          <i class="bi bi-file-earmark-plus"></i> Tambah Data
        </a>
        <button onclick="exportToExcel()" class="btn btn-success d-none" id="exportButton">
          <i class="bi bi-file-earmark-spreadsheet"></i> Export to Excel
        </button>
        <button onclick="captureTable()" class="btn btn-primary">
          <i class="bi bi-camera"></i> Screenshot
        </button>
      </div>

      <!-- Kanan: Toggle variasi -->
      <div class="form-check form-switch d-flex align-items-center">
        <input class="form-check-input me-2" type="checkbox" id="toggleVariasiSwitch" onclick="toggleVariasiView()">
        <label class="form-check-label" for="toggleVariasiSwitch" id="toggleVariasiLabel">Off</label>
      </div>
    </div>

    <!-- Baris baru: Kolom toggle -->
    <div class="mt-3">
      <strong class="d-block mb-2">Tampilkan Kolom:</strong>
      <div class="d-flex flex-wrap gap-3">
        <div class="form-check form-check-inline">
          <input class="form-check-input column-toggle" type="checkbox" data-column="2" id="colKode">
          <label class="form-check-label" for="colKode">Kode Barang</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input column-toggle" type="checkbox" checked data-column="3" id="colGambar">
          <label class="form-check-label" for="colGambar">Gambar</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input column-toggle" type="checkbox" checked data-column="4" id="colNama">
          <label class="form-check-label" for="colNama">Nama Barang</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input column-toggle" type="checkbox" data-column="5" id="colHarga">
          <label class="form-check-label" for="colHarga">Harga</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input column-toggle" type="checkbox" data-column="6" id="colStok">
          <label class="form-check-label" for="colStok">Total Stok</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input column-toggle" type="checkbox" data-column="7" id="colTerjual">
          <label class="form-check-label" for="colTerjual">Terjual</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input column-toggle" type="checkbox" checked data-column="8" id="colVariasi">
          <label class="form-check-label" for="colVariasi">Variasi</label>
        </div>
      </div>
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
          <th scope="col" style="width: 10%">Kode Barang</th>
          <th scope="col" style="width: 10%">Gambar</th>
          <th scope="col" style="width: 10%">Nama Barang
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
          <th scope="col">Terjual
            <div class="dropdown d-inline">
                <button class="btn btn-link p-0 dropdown-toggle" type="button" id="sortTerjual" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-sort-numeric-down"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortTerjual">
                    <li><a class="dropdown-item" href="#" onclick="sortTable(6, 'asc')">Sedikit</a></li>
                    <li><a class="dropdown-item" href="#" onclick="sortTable(6, 'desc')">Banyak</a></li>
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

            <script>
                function showImageModal(imageUrl) {
                    document.getElementById('modalImage').src = imageUrl;
                }
            </script>


            <td>{{ $p->nama_produk }}</td>
            <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
            <td>{{ $p->total_stok }}</td>
            <td>{{ $p->total_terjual }} Terjual</td>
            <td>
              @if ($p->variasi->count() > 0)
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $p->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                    Lihat Variasi
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $p->id }}">
                    @foreach ($p->variasi as $variasi)
                    @php
                      $stokClass = ($variasi->stok >= 1) ? 'bg-success' : 'bg-danger';
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

      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.0/dist/xlsx.full.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll('.column-toggle');
    const table = document.querySelector('table');

    // Setel default status kolom yang ingin disembunyikan (kolom kode barang, harga, total stok)
    const defaultStatus = {
        2: false,  // Kode Barang
        5: false,  // Harga
        6: false,  // Total Stok
        7: true,   // Terjual
        3: true,   // Gambar
        4: true,   // Nama Barang
        8: true    // Variasi
    };

    // Cek status checkbox yang tersimpan di localStorage dan setel status checkbox
    checkboxes.forEach(function(checkbox) {
        const columnIndex = parseInt(checkbox.dataset.column);
        const storedStatus = localStorage.getItem('column_' + columnIndex);

        // Tentukan status berdasarkan localStorage atau defaultStatus
        const isChecked = storedStatus === 'true' ? true : defaultStatus[columnIndex] !== undefined ? defaultStatus[columnIndex] : false;

        // Set checkbox sesuai status yang disimpan atau default
        checkbox.checked = isChecked;

        // Atur kolom yang sesuai untuk ditampilkan atau disembunyikan
        toggleColumn(columnIndex, isChecked);

        // Tambahkan event listener untuk menyimpan status ketika diubah
        checkbox.addEventListener('change', function() {
        // Simpan status checkbox ke localStorage
        localStorage.setItem('column_' + columnIndex, this.checked);

        // Toggle visibilitas kolom sesuai status checkbox
        toggleColumn(columnIndex, this.checked);
        });
    });

    // Fungsi untuk toggle kolom
    function toggleColumn(columnIndex, show) {
        const ths = table.querySelectorAll('thead th');
        const rows = table.querySelectorAll('tbody tr');

        if (columnIndex === 1) { // Kolom "No" selalu terlihat
        return;
        }

        if (ths[columnIndex - 1]) {
        ths[columnIndex - 1].style.display = show ? '' : 'none';
        }

        rows.forEach(function(row) {
        const cells = row.querySelectorAll('td');
        if (cells[columnIndex - 1]) {
            cells[columnIndex - 1].style.display = show ? '' : 'none';
        }
        });
    }

    // Fungsi untuk toggle variasi view (tetap di localStorage jika diubah)
    function toggleVariasiView() {
        const label = document.getElementById('toggleVariasiLabel');
        const switchInput = document.getElementById('toggleVariasiSwitch');
        label.textContent = switchInput.checked ? 'On' : 'Off';
        localStorage.setItem('variasi_switch', switchInput.checked);
    }

    // Setel status switch variasi jika ada di localStorage
    const switchVariasi = localStorage.getItem('variasi_switch') === 'true';
    document.getElementById('toggleVariasiSwitch').checked = switchVariasi;
    document.getElementById('toggleVariasiLabel').textContent = switchVariasi ? 'On' : 'Off';
    });

    </script>


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

    // Jika kolom adalah Harga, Total Stok, atau Terjual, parsing sebagai angka
    if (columnIndex === 4 || columnIndex === 5 || columnIndex === 6) {
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

  {{-- Screenshot --}}
  <script>
    function captureTable() {
  const confirmed = confirm("Apakah Anda yakin ingin mendownload screenshot?");
  if (!confirmed) return;

  const table = document.getElementById('dataTable');

  // Sembunyikan kolom "Aksi"
  const aksiColumns = document.querySelectorAll('.aksi-column');
  aksiColumns.forEach(col => col.style.display = 'none');

  // Tambahkan judul sementara
  const title = document.createElement('h2');
  title.innerText = 'Variasi Stok Barang';
  title.style.textAlign = 'center';
  title.style.backgroundColor = '#343a40';
  title.style.color = 'white';
  title.style.padding = '10px';
  title.style.marginBottom = '0px';
  table.parentElement.insertBefore(title, table);

  // Gunakan html2canvas (atau cara kamu sendiri untuk screenshot)
  html2canvas(table.parentElement).then(canvas => {
    const link = document.createElement('a');
    link.href = canvas.toDataURL('image/png');
    link.download = 'screenshot_stok_barang.png';
    link.click();

    // Hapus elemen tambahan & tampilkan kolom kembali
    title.remove();
    aksiColumns.forEach(col => col.style.display = '');
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
