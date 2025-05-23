@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Barang Keluar</h1>
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

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <strong>Buat Laporan Barang Keluar</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('barang-keluar.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
                <div class="col-md-3">
                    <label for="produk_id" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukan Nama Barang" required>
                    <input type="hidden" name="produk_id" id="produk_id"> <!-- Input tersembunyi untuk produk_id -->
                    <div id="product-image"></div>

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
                    <input type="number" class="form-control" name="qty" min="1" placeholder="Masukan Jumlah" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
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
                <div class="col-md-2">
                    <label for="sumber" class="form-label">Type</label>
                    <select class="form-select" name="sumber" required>
                        <option value="">-- Pilih Type --</option>
                        <option value="Live">Live</option>
                        <option value="Toko">Toko</option>
                        <option value="Luar Toko">Luar Toko</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="host" class="form-label">Nama Host</label>
                    <input type="text" class="form-control" name="host" placeholder="Tulis (-) jika toko" required>
                </div>
                <div class="col-md-2">
                    <label for="jamlive" class="form-label">Jam Live / Toko</label>
                    <input type="text" class="form-control" name="jamlive" placeholder="Tulis (-) jika toko" required>
                </div>
                <div class="col-md-2">
                    <label for="catatan" class="form-label">Catatan</label>
                    <input type="text" class="form-control" name="catatan" placeholder="Catatan jika ada" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100"><i class="bi bi-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Preview Gambar -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imagePreviewModalLabel">Preview Gambar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="" id="modalImage" class="img-fluid" alt="Preview Gambar">
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
                            id: item.id,  // ID produk yang akan digunakan saat memilih
                            gambar1: item.gambar1  // Gambar produk
                        };
                    }));
                }
            });
        },
        minLength: 2,  // Minimal 2 karakter untuk mulai pencarian
        select: function(event, ui) {
        var produkId = ui.item.id;
        $("#produk_id").val(produkId);

        var imageUrl = '/storage/' + ui.item.gambar1; // Pastikan ini sesuai path kamu
        $('#product-image').html(
            '<img src="' + imageUrl + '" alt="' + ui.item.value + '" class="img-fluid preview-image" style="max-width: 200px; margin-top: 10px; cursor: pointer;" />'
        );
        // Saat gambar diklik, tampilkan di modal
        $(document).on('click', '.preview-image', function() {
            var src = $(this).attr('src');
            $('#modalImage').attr('src', src);
            $('#imagePreviewModal').modal('show');
        });


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
@endsection
