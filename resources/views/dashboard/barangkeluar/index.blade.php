@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Barang Keluar</h1>
  </div>

   {{-- Form Buat Laporan Barang Keluar --}}
     <!-- Menampilkan pesan sukses jika ada -->
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

    <form action="{{ route('barang-keluar.index') }}" method="GET" class="my-3">
        <div class="row align-items-end">
            <!-- Filter Tanggal Mulai -->
            <div class="col-md-2">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
            </div>

            <!-- Filter Tanggal Selesai -->
            <div class="col-md-2">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}">
            </div>

            <!-- Filter Produk -->
            <div class="col-md-3">
                <label for="produk_id" class="form-label">Produk</label>
                <select name="produk_id" id="produk_id" class="form-control">
                    <option value="">Semua Produk</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" {{ request()->produk_id == $produk->id ? 'selected' : '' }}>
                            {{ $produk->nama_produk }}
                        </option>
                    @endforeach
                </select>
            </div>

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

            <!-- Filter Platform -->
            <div class="col-md-2">
                <label for="platform" class="form-label">Platform</label>
                <select class="form-control" name="platform">
                    <option value="">-- Pilih Platform --</option>
                    <option value="Shopee 1" {{ request('platform') == 'Shopee 1' ? 'selected' : '' }}>Shopee 1</option>
                    <option value="Shopee 2" {{ request('platform') == 'Shopee 2' ? 'selected' : '' }}>Shopee 2</option>
                    <option value="Shopee 3" {{ request('platform') == 'Shopee 3' ? 'selected' : '' }}>Shopee 3</option>
                    <option value="Shopee 4" {{ request('platform') == 'Shopee 4' ? 'selected' : '' }}>Shopee 4</option>
                    <option value="Tiktok 1" {{ request('platform') == 'Tiktok 1' ? 'selected' : '' }}>Tiktok 1</option>
                    <option value="Tiktok 2" {{ request('platform') == 'Tiktok 2' ? 'selected' : '' }}>Tiktok 2</option>
                    <option value="Tiktok 3" {{ request('platform') == 'Tiktok 3' ? 'selected' : '' }}>Tiktok 3</option>
                    <option value="Tiktok 4" {{ request('platform') == 'Tiktok 4' ? 'selected' : '' }}>Tiktok 4</option>
                    <option value="Tokopedia 1" {{ request('platform') == 'Tokopedia 1' ? 'selected' : '' }}>Tokopedia 1</option>
                    <option value="Tokopedia 2" {{ request('platform') == 'Tokopedia 2' ? 'selected' : '' }}>Tokopedia 2</option>
                    <option value="Tokopedia 3" {{ request('platform') == 'Tokopedia 3' ? 'selected' : '' }}>Tokopedia 3</option>
                </select>
            </div>

            <!-- Filter Sumber -->
            <div class="col-md-2">
                <label for="sumber" class="form-label">Type</label>
                <select class="form-control" name="sumber">
                    <option value="">-- Pilih Type --</option>
                    <option value="Live" {{ request('sumber') == 'Live' ? 'selected' : '' }}>Live</option>
                    <option value="Toko" {{ request('sumber') == 'Toko' ? 'selected' : '' }}>Toko</option>
                </select>
            </div>

            <div class="col-md-2">
                <form method="GET" action="{{ route('barang-keluar.index') }}">
                    <label for="limit" class="form-label">Tampilkan:</label>
                    <select name="limit" onchange="this.form.submit()" class="form-control">
                        <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                        <option value="all" {{ request('limit') == 'all' ? 'selected' : '' }}>Semua</option>
                    </select>
                </form>
            </div>

            <!-- Filter Host -->
            <div class="col-md-2">
                <label for="host" class="form-label">Host</label>
                <input type="text" class="form-control" name="host" placeholder="Cari host..." value="{{ request('host') }}">
            </div>

            <!-- Tombol Filter dan Reset -->
            <div class="col-md-3 mt-3">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('barang-keluar.index') }}" class="btn btn-danger ms-2">Reset</a>
            </div>
        </div>
    </form>



  {{-- Tabel Riwayat Barang Keluar --}}
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <strong>Data Barang Keluar</strong>
    </div>

    @auth
    <div class="col-md-3 m-1">
        <button onclick="confirmExport()" class="btn btn-success m-2"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</button>
        <button onclick="captureTable()" class="btn btn-primary m-2"><i class="bi bi-camera"></i> Screenshot</button>
    </div>
    @endauth

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Nama Barang</th>
              <th>Variasi</th>
              <th>Jumlah</th>
              <th>Platform</th>
              <th>Host/Toko</th>
              <th>Jam Live/Toko</th>
              <th>Catatan</th>
              <th>Type</th>
              @auth
                <th class="aksi">Aksi</th>
              @endauth
            </tr>
          </thead>
          <tbody>
            @php
              $totalQty = 0;
              $offset = $isPaginated ? ($barangKeluar->currentPage() - 1) * $barangKeluar->perPage() : 0; // Menghitung offset jika dipaginasi
            @endphp

            @foreach ($barangKeluar as $bk)
              @php
                $totalQty += $bk->qty;
              @endphp
              <tr>
                <td>{{ $offset + $loop->iteration }}</td> <!-- Menampilkan urutan berdasarkan halaman -->
                <td>{{ $bk->tanggal }}</td>
                <td>{{ $bk->produk->nama_produk }}</td>
                <td>{{ $bk->variasi ? $bk->variasi->warna->warna . ' - ' . $bk->variasi->ukuran->ukuran : '-' }}</td>
                <td>{{ $bk->qty }}</td>
                <td>{{ $bk->platform }}</td>
                <td>{{ ucwords(strtoupper($bk->host)) }}</td>
                <td>{{ $bk->jamlive }}</td>
                <td>{{ $bk->catatan }}</td>
                <td>{{ $bk->sumber }}</td>
                @auth

                <td class="aksi">
                  <form action="{{ route('barang-keluar.destroy', $bk->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm m-2" onclick="return confirm('Hapus data ini?')">
                      <i class="bi bi-trash"></i> Hapus
                    </button>
                  </form>

                  <button type="button" class="btn btn-warning btn-sm edit-btn m-2"
                    data-bs-toggle="modal" data-bs-target="#editModal"
                    data-id="{{ $bk->id }}"
                    data-tanggal="{{ $bk->tanggal }}"
                    data-produk="{{ $bk->produk->id }}"
                    data-produk-nama="{{ $bk->produk->nama_produk }}"
                    data-variasi="{{ $bk->variasi_id }}"
                    data-qty="{{ $bk->qty }}"
                    data-platform="{{ $bk->platform }}"
                    data-host="{{ $bk->host }}"
                    data-jamlive="{{ $bk->jamlive }}" data-catatan="{{ $bk->catatan }}" data-sumber="{{ $bk->sumber }}">
                    <i class="bi bi-pencil"></i> Edit
                  </button>
                </td>
                @endauth

              </tr>
            @endforeach

            <tr>
              <td colspan="4" class="text-end"><strong>Total Barang Keluar:</strong></td>
              <td><strong>{{ $totalQty }}</strong></td>
              <td colspan="6"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center pt-3">
    @if ($barangKeluar instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $barangKeluar->links() }}
    @endif
</div>



  {{-- Modal Edit --}}
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Barang Keluar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="edit-id">

            <div class="mb-3">
              <label for="edit-tanggal" class="form-label">Tanggal</label>
              <input type="date" class="form-control" name="tanggal" id="edit-tanggal" required>
            </div>

            {{-- <div class="mb-3">
              <label for="edit-produk_id" class="form-label">Nama Barang</label>
              <select name="produk_id" class="form-control" id="edit-produk_id" required>
                @foreach ($produks sebagai $produk)
                  <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                @endforeach
              </select>
            </div> --}}

            <div class="mb-3">
                <label for="edit-produk_nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="edit-produk_nama" readonly>
                <input type="hidden" name="produk_id" id="edit-produk_id">
              </div>


            <div class="mb-3">
              <label for="edit-variasi_id" class="form-label">Variasi</label>
              <select name="variasi_id" class="form-control" id="edit-variasi_id">
                <option value="">-- Pilih Variasi --</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="edit-qty" class="form-label">Jumlah</label>
              <input type="number" class="form-control" name="qty" id="edit-qty" min="1" required>
            </div>

            <div class="mb-3">
                <label for="edit-platform" class="form-label">Platform</label>
                <select class="form-control" name="platform" id="edit-platform" required>
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


            <div class="mb-3">
              <label for="edit-host" class="form-label">Host/Toko</label>
              <input type="text" class="form-control" name="host" id="edit-host" required>
            </div>

            <div class="mb-3">
                <label for="edit-jamlive" class="form-label">Jam Live / Toko</label>
                <input type="text" class="form-control" name="jamlive" id="edit-jamlive" required>
            </div>

            <div class="mb-3">
                <label for="edit-catatan" class="form-label">Catatan</label>
                <input type="text" class="form-control" name="catatan" id="edit-catatan"></input>
            </div>

            <div class="mb-3">
                <label for="edit-sumber" class="form-label">Type</label>
                <select class="form-control" name="sumber" id="edit-sumber" required>
                  <option value="Live">Live</option>
                  <option value="Toko">Toko</option>
                </select>
              </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
          </form>
        </div>
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

      // Menyimpan produk_id yang dipilih ke dalam input tersembunyi
      $("#produk_id").val(produkId);

      // Kirim permintaan untuk mendapatkan variasi produk berdasarkan ID produk
      $.ajax({
        url: '/barang-keluar/' + produkId + '/variasi',  // Sesuaikan route untuk mendapatkan variasi produk
        type: 'GET',
        success: function(data) {
          var variasiSelect = $("select[name='variasi_id']");
          variasiSelect.empty();  // Hapus pilihan yang ada sebelumnya

          if (data.variasi.length > 0) {
            variasiSelect.append('<option value="">Pilih Variasi</option>');  // Pilihan default

            data.variasi.forEach(function(variasi) {
              var warna = variasi.warna ? variasi.warna.warna : '-';
              var ukuran = variasi.ukuran && variasi.ukuran.ukuran ? variasi.ukuran.ukuran : '';  // Mengecek jika ukuran ada

              // Menampilkan variasi dan warna, jika ukuran tidak ada, jangan ditulis "null"
              if (ukuran) {
                variasiSelect.append('<option value="' + variasi.id + '">' + warna + ' - ' + ukuran + '</option>');
              } else {
                variasiSelect.append('<option value="' + variasi.id + '">' + warna + ' - ' + '</option>');
              }
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

<script>
    $(document).ready(function() {
  $(".edit-btn").click(function() {
    let id = $(this).data("id");
    let tanggal = $(this).data("tanggal");
    let produkNama = $(this).data("produk-nama");  // Ambil nama produk
    let produkId = $(this).data("produk");
    let variasiId = $(this).data("variasi");
    let qty = $(this).data("qty");
    let platform = $(this).data("platform");
    let host = $(this).data("host");
    let jamlive = $(this).data("jamlive");
    let catatan = $(this).data("catatan");
    let sumber = $(this).data("sumber");

    $("#edit-id").val(id);
    $("#edit-tanggal").val(tanggal);
    $("#edit-produk_nama").val(produkNama);  // Isi input readonly
    $("#edit-produk_id").val(produkId);  // Simpan ID produk
    $("#edit-qty").val(qty);
    $("#edit-platform").val(platform);
    $("#edit-host").val(host);
    $("#edit-jamlive").val(jamlive);
    $("#edit-catatan").val(catatan);
    $("#edit-sumber").val(sumber);

    // Memuat variasi berdasarkan produk yang dipilih
    $.ajax({
      url: '/barang-keluar/' + produkId + '/variasi',
      type: 'GET',
      success: function(data) {
        let variasiSelect = $("#edit-variasi_id");
        variasiSelect.empty();  // Hapus pilihan sebelumnya

        if (data.variasi.length > 0) {
          variasiSelect.append('<option value="">Pilih Variasi</option>');

          data.variasi.forEach(function(variasi) {
            let warna = variasi.warna ? variasi.warna.warna : '-';
            let ukuran = variasi.ukuran && variasi.ukuran.ukuran ? variasi.ukuran.ukuran : '';
            let selected = variasi.id == variasiId ? 'selected' : '';

            variasiSelect.append(`<option value="${variasi.id}" ${selected}>${warna} - ${ukuran}</option>`);
          });
        } else {
          variasiSelect.append('<option value="">Tidak ada variasi</option>');
        }
      }
    });

    // Update action form dengan ID
    $("#editForm").attr("action", "/dashboard/barang-keluar/" + id);
  });
});


  </script>

{{-- To Excel --}}
<script>
    function confirmExport() {
      if (confirm("Mengekspor data ke Excel?")) {
        exportToExcel();
      }
    }

    function exportToExcel() {
      const table = document.getElementById('myTable');
      const rows = Array.from(table.querySelectorAll('tr'));

      // Ambil data dari tabel, kecuali kolom aksi (misalnya kolom terakhir)
      const data = rows.map(row => {
        const cells = Array.from(row.querySelectorAll('th, td')).map(cell => cell.innerText);

        // Menghapus kolom aksi (misalnya kolom terakhir) sebelum diekspor
        cells.pop(); // Menghapus kolom terakhir (aksi)

        return cells;
      });

      // Membuat worksheet dari data yang sudah diproses
      const ws = XLSX.utils.aoa_to_sheet(data);
      const wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

      // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
      const today = new Date();
      const formattedDate = today.toISOString().split('T')[0];  // Menghasilkan format: YYYY-MM-DD

      // Membuat nama file dengan tanggal hari ini dan "laporan keluar"
      const filename = `laporan-keluar-${formattedDate}.xlsx`;

      // Menyimpan file dengan nama yang sesuai
      XLSX.writeFile(wb, filename);

      // Menampilkan alert setelah ekspor berhasil
      alert('Data berhasil diekspor sebagai ' + filename);
    }
  </script>


  {{-- Screenshot --}}
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
        title.innerText = 'Laporan Barang Keluar';
        title.style.textAlign = 'center';
        title.style.border = '1px solid #000'; // Menambahkan border
        title.style.padding = '10px'; // Menambahkan padding
        title.style.marginBottom = '0px'; // Mengurangi margin bawah
        title.style.marginTop = '15px'; // Menambahkan margin atas
        title.style.backgroundColor = '#343a40'; // Menambahkan warna latar belakang yang sama dengan tabel
        title.style.color = '#fff'; // Menambahkan warna teks putih
        title.style.width = table.offsetWidth + 'px'; // Menyamakan lebar judul dengan tabel
        title.style.marginLeft = 'auto'; // Menambahkan margin kiri otomatis
        title.style.marginRight = 'auto'; // Menambahkan margin kanan otomatis
        table.parentElement.insertBefore(title, table);

        // Tambahkan border tebal pada tabel
        table.style.border = '1px solid #000';
        table.style.borderCollapse = 'collapse';
        const cells = table.querySelectorAll('th, td');
        cells.forEach(cell => {
            cell.style.border = '1px solid #000';
        });

        html2canvas(table.parentElement).then(canvas => {
            // Tampilkan kembali kolom "Aksi" setelah screenshot
            aksiColumns.forEach(col => col.style.display = '');

            // Hapus judul sementara
            title.remove();

            // Kembalikan border tabel ke semula
            table.style.border = '';
            cells.forEach(cell => {
                cell.style.border = '';
            });

            // Membuat link download
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'screenshot-laporan.png';
            link.click();

            // Tampilkan pesan sukses
            alert("Screenshot berhasil diunduh!");
        });
    }
</script>

@endsection
