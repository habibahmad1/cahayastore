@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Barang Masuk</h1>
</div>

{{-- Form Buat Laporan Barang Masuk --}}
@if (session('success'))
    <div class="alert alert-success col-lg-12">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Filter --}}
<form action="{{ route('barang-masuk.index') }}" method="GET" class="my-3">
    <div class="row">
        <!-- Filter Tanggal -->
        <div class="col-md-4">
            <label for="tanggal_mulai">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ request()->tanggal_mulai }}">
        </div>
        <div class="col-md-4">
            <label for="tanggal_selesai">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ request()->tanggal_selesai }}">
        </div>
        <!-- Filter Produk -->
        <div class="col-md-4">
            <label for="produk_id">Produk</label>
            <select name="produk_id" id="produk_id" class="form-control">
                <option value="">Semua Produk</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}" {{ request()->produk_id == $produk->id ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Filter Kategori -->
        <div class="col-md-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filter Limit -->
        <div class="col-md-2">
            <label for="limit" class="form-label">Tampilkan:</label>
            <select name="limit" onchange="this.form.submit()" class="form-control">
                <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                <option value="all" {{ request('limit') == 'all' ? 'selected' : '' }}>Semua</option>
            </select>
        </div>

        <!-- Tombol Filter & Reset -->
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary me-2">Filter</button>
            <a href="{{ route('barang-masuk.index') }}" class="btn btn-danger">Reset</a>
        </div>
    </div>
</form>



{{-- Tabel Riwayat Barang Masuk --}}
<div class="card">
    <div class="card-header bg-secondary text-white">
        <strong>Data Barang Masuk</strong>
    </div>


    <div class="col-md-3 m-1">
        <button onclick="confirmExport()" class="btn btn-success m-2"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</button>
        <button onclick="captureTable()" class="btn btn-primary m-2"><i class="bi bi-camera"></i> Screenshot</button>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm" id="myTable">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th style="width: 45%;">Nama Barang</th>
                        <th>Variasi</th>
                        <th>Jumlah</th>
                        <th>Expired</th>
                        <th class="aksi" style="width: 12%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalQty = 0;
                    @endphp
                    @forelse ($barangMasuk as $bm)
                        @php
                            $totalQty += $bm->qty;
                        @endphp
                        <tr>
                            <td>{{ $barangMasuk->firstItem() + $loop->index }}</td>
                            <td>{{ $bm->tanggal }}</td>
                            <td>{{ $bm->produk->nama_produk }}</td>
                            <td>{{ $bm->variasi ? $bm->variasi->warna->warna . ' - ' . $bm->variasi->ukuran->ukuran : '-' }}</td>
                            <td>{{ $bm->qty }}</td>
                            <td>{{ $bm->exp }}</td>
                            <td class="aksi">
                                <button class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $bm->id }}"
                                        data-produk-id="{{ $bm->produk->id }}"
                                        data-variasi-id="{{ $bm->variasi_id }}">
                                        <i class="bi bi-pencil"></i> Edit
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('barang-masuk.destroy', $bm->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editModal{{ $bm->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $bm->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $bm->id }}">Edit Barang Masuk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('barang-masuk.update', $bm->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            {{-- Hidden input for id_produk --}}
                                            <input type="hidden" name="produk_id" value="{{ $bm->produk->id }}">

                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $bm->tanggal }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="produk" class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" id="produk" name="produk" value="{{ $bm->produk->nama_produk }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit-variasi_id{{ $bm->id }}" class="form-label">Variasi</label>
                                                <select name="variasi_id" class="form-control" id="edit-variasi_id{{ $bm->id }}">
                                                    <option value="">-- Pilih Variasi --</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="qty" class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" id="qty" name="qty" value="{{ $bm->qty }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exp" class="form-label">Expired</label>
                                                <input type="date" class="form-control" id="exp" name="exp" value="{{ $bm->exp }}">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada laporan barang masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total Barang Masuk:</strong></td>
                        <td><strong>{{ $totalQty }}</strong></td>
                        <td colspan="2"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center pt-3">
    @if ($barangMasuk instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $barangMasuk->links('vendor.pagination.default') }}
    @endif
  </div>

@endsection

@section('scripts')
<!-- jQuery, jQuery UI, and other required libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- Export to Excel -->
<script>
    function confirmExport() {
        if (confirm("Mengekspor data ke Excel?")) {
            exportToExcel();
        }
    }

    function exportToExcel() {
        const table = document.getElementById('myTable');
        const rows = Array.from(table.querySelectorAll('tr'));

        // Ambil data dari tabel, kecuali kolom aksi
        const data = rows.map(row => {
            const cells = Array.from(row.querySelectorAll('th, td')).map(cell => cell.innerText);

            // Menghapus kolom aksi
            cells.pop(); // Menghapus kolom terakhir (aksi)

            return cells;
        });

        // Membuat worksheet dari data yang sudah diproses
        const ws = XLSX.utils.aoa_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
        const today = new Date();
        const formattedDate = today.toISOString().split('T')[0];

        // Nama file dengan tanggal hari ini
        const filename = `laporan-masuk-${formattedDate}.xlsx`;

        // Menyimpan file
        XLSX.writeFile(wb, filename);

        // Alert setelah ekspor berhasil
        alert('Data berhasil diekspor sebagai ' + filename);
    }
</script>

<!-- Screenshot -->
<script>
    function captureTable() {
        // Konfirmasi sebelum mengambil screenshot
        const confirmed = confirm("Apakah Anda yakin ingin mendownload screenshot laporan?");
        if (!confirmed) {
            return; // Batalkan jika pengguna menolak
        }

        const table = document.getElementById('myTable');

        // Sembunyikan kolom "Aksi"
        const aksiColumns = document.querySelectorAll('.aksi');
        aksiColumns.forEach(col => col.style.display = 'none');

        // Tambahkan judul sementara
        const title = document.createElement('h2');
        title.innerText = 'Laporan Barang Masuk';
        title.style.textAlign = 'center';
        title.style.backgroundColor = '#343a40'; // Warna latar belakang
        title.style.color = 'white'; // Warna teks
        title.style.padding = '10px'; // Padding
        title.style.marginBottom = '0px'; // Margin bawah
        table.parentElement.insertBefore(title, table);

        html2canvas(table.parentElement).then(canvas => {
            // Tampilkan kembali kolom "Aksi"
            aksiColumns.forEach(col => col.style.display = '');

            // Hapus judul sementara
            title.remove();

            // Link download
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'screenshot-laporan.png';
            link.click();

            // Pesan sukses
            alert("Screenshot berhasil diunduh!");
        });
    }
</script>

<script>
$(document).ready(function () {
    function loadVariasi(produkId, variasiSelect, selectedVariasiId = null) {
        $.ajax({
            url: `/barang-masuk/${produkId}/variasi`, // Pastikan endpoint benar
            type: 'GET',
            success: function (data) {
                console.log("Variasi yang diterima:", data); // Debugging: Cek apakah variasi berhasil dimuat

                variasiSelect.empty(); // Kosongkan select sebelum menambahkan opsi

                if (data.variasi.length > 0) {
                    variasiSelect.append('<option value="">Pilih Variasi</option>');
                    data.variasi.forEach(function (variasi) {
                        let warna = variasi.warna ? variasi.warna.warna : '-';
                        let ukuran = variasi.ukuran ? variasi.ukuran.ukuran : '';
                        let option = `<option value="${variasi.id}" ${variasi.id == selectedVariasiId ? 'selected' : ''}>${warna} - ${ukuran}</option>`;

                        variasiSelect.append(option);
                    });
                } else {
                    variasiSelect.append('<option value="">Tidak ada variasi</option>');
                }

                // Pastikan nilai yang benar dipilih setelah opsi ditambahkan
                if (selectedVariasiId) {
                    variasiSelect.val(selectedVariasiId).change(); // Gunakan .change() untuk memastikan perubahan diterapkan
                }

                console.log("Variasi yang dipilih:", variasiSelect.val()); // Debugging: Cek apakah variasi benar-benar terpilih
            },
            error: function (xhr, status, error) {
                console.error("Error loading variasi:", error);
            }
        });
    }

    // Saat modal edit ditampilkan
    $('[id^=editModal]').on('shown.bs.modal', function (e) {
        let modal = $(this);
        let produkId = modal.find('input[name="produk_id"]').val();
        let variasiSelect = modal.find('select[name="variasi_id"]');
        let variasiId = $(e.relatedTarget).data('variasi-id');  // Ambil variasi sebelumnya

        console.log(`Modal dibuka untuk produk ${produkId}, variasi sebelumnya ${variasiId}`); // Debugging

        loadVariasi(produkId, variasiSelect, variasiId);
    });

    // Jika produk diubah dalam modal, muat ulang variasi
    $('[id^=edit-produk_id]').change(function () {
        let modal = $(this).closest('.modal');
        let produkId = $(this).val();
        let variasiSelect = modal.find('select[name="variasi_id"]');

        loadVariasi(produkId, variasiSelect);
    });
});


</script>

<style>
    /* Tambahkan padding pada elemen tabel */
    #myTable th, #myTable td {
      padding: 5px; /* Atur padding untuk memberi jarak */
      text-align: center; /* Teks di tengah secara horizontal */
      vertical-align: middle; /* Teks di tengah secara vertikal */
    }

    /* Khusus untuk kolom Nama Barang, teks rata kiri */
    #myTable td:nth-child(3), #myTable th:nth-child(3) {
    padding: 5px; /* Atur padding untuk memberi jarak */
    text-align: left; /* Teks rata kiri */
    vertical-align: middle; /* Teks di tengah secara vertikal */
    padding-left: 10px; /* Tambahkan spasi kiri untuk semua baris */
    padding-right: 10px; /* Tambahkan spasi kiri untuk semua baris */
    }

    /* Khusus untuk kolom Variasi, teks rata kiri */
    #myTable td:nth-child(4), #myTable th:nth-child(4) {
      padding: 2px;
      text-align: left;
      vertical-align: middle;
      text-indent: 10px; /* Tambahkan spasi 1x di sisi kiri */
    }

    /* Tambahkan border pada tabel */
    #myTable {
        border-collapse: collapse;
        width: 100%;
    }

    #myTable th, #myTable td {
        border: 1px solid #ddd;
    }

    /* Warna latar belakang untuk header tabel */
    #myTable thead {
        background-color: #343a40;
        color: white;
    }
</style>
@endsection
