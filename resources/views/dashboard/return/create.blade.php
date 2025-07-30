@extends('dashboard.layouts.main')



@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input Return Paket</h1>
</div>

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
        <strong>Input Return Paket</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('barang-return.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-4">
                    <label for="tanggal_retur" class="form-label">Tanggal Return</label>
                    <input type="date" class="form-control" name="tanggal_retur" required>
                </div>

           <div class="col-md-4">
                <label for="nama_produk" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                <input type="hidden" name="produk_id" id="produk_id">
                <div id="product-image" class="mt-2"></div>
            </div>

            <div class="col-md-4">
                <label for="variasi_id" class="form-label">Variasi</label>
                <select name="variasi_id" id="variasi_id" class="form-select">
                    <option value="">-- Pilih Variasi --</option>
                </select>
            </div>

                <div class="col-md-2 mt-3">
                    <label for="platform" class="form-label">Platform</label>
                    <select name="platform" class="form-select" required>
                        <option value="">-- Pilih Platform --</option>
                        <option value="Tiktok 1">Tiktok 1</option>
                        <option value="Tiktok 2">Tiktok 2</option>
                        <option value="Tiktok 3">Tiktok 3</option>
                        <option value="Tiktok 4">Tiktok 4</option>
                        <option value="Shopee 1">Shopee 1</option>
                        <option value="Shopee 2">Shopee 2</option>
                        <option value="Shopee 3">Shopee 3</option>
                        <option value="Shopee 4">Shopee 4</option>
                        <option value="Tokopedia 1">Tokopedia 1</option>
                        <option value="Tokopedia 2">Tokopedia 2</option>
                        <option value="No Platform">No Platform</option>
                    </select>
                </div>

                <div class="col-md-2 mt-3">
                    <label for="nomor_resi" class="form-label">Nomor Resi</label>
                    <input type="text" class="form-control" name="nomor_resi">
                </div>

                <div class="col-md-2 mt-3">
                    <label for="ekspedisi" class="form-label">Ekspedisi</label>
                    <select name="ekspedisi" class="form-select" required>
                        <option value="">-- Pilih Ekspedisi --</option>
                        <option value="J&T">J&T</option>
                        <option value="J&T Cargo">J&T Cargo</option>
                        <option value="Goto Logistik">Goto Logistik</option>
                        <option value="SPX">SPX</option>
                        <option value="JNE">JNE</option>
                        <option value="JNE Cargo">JNE Cargo</option>
                        <option value="Ninja">Ninja</option>
                        <option value="Lalamove">Lalamove</option>
                    </select>
                </div>

                <div class="col-md-2 mt-3">
                    <label for="jumlah" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" name="jumlah" min="1" required>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="alasan_retur" class="form-label">Alasan Return</label>
                    <select id="alasan_retur" name="alasan_retur" class="form-select" onchange="cekAlasan(this)" required>
                        <option value="">-- Pilih Alasan --</option>
                        <option value="Barang Rusak">Barang Rusak</option>
                        <option value="Gagal Kirim ke Pembeli">Gagal Kirim ke Pembeli</option>
                        <option value="Tidak Sesuai Pesanan">Tidak Sesuai Pesanan</option>
                        <option value="Melebihi Volume">Melebihi Volume</option>
                        <option value="Sudah Tidak Perlu">Sudah Tidak Perlu</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" id="alasan_lainnya" name="alasan_lainnya" class="form-control mt-2" placeholder="Masukkan alasan lainnya" style="display:none;" />
                </div>

                <div class="col-md-3 mt-3">
                    <label for="foto_bukti" class="form-label">Foto Bukti (opsional)</label>
                    <input type="file" class="form-control" name="foto_bukti" accept="image/*">
                </div>

                <div class="col-md-3 mt-3">
                    <label for="floatingTextarea2">Catatan</label>
                    <div class="form-floating">
                    <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                </div>

                <div class="col-md-2 mt-3">
                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar <span class="text-secondary">(Kosongkan Jika belum keluar)</span></label>
                    <input type="date" class="form-control" name="tanggal_keluar">
                </div>

                <div class="col-md-2 mt-3">
                    <label for="jumlah_keluar" class="form-label">Jumlah Barang Keluar <span class="text-secondary">(Kosongkan Jika belum keluar)</span></label>
                    <input type="number" class="form-control" name="jumlah_keluar" min="1" >
                </div>

                <div class="col-md-2 mt-3">
                    <label for="nomor_resi_keluar" class="form-label">Resi Barang Keluar <span class="text-secondary">(Kosongkan Jika belum keluar)</span></label>
                    <input type="text" class="form-control" name="nomor_resi_keluar" min="1">
                </div>

                <div class="col-md-12 mt-4 text-end">
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk preview gambar -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview Gambar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" class="img-fluid" alt="Preview Gambar">
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
function cekAlasan(select) {
    const inputLain = document.getElementById('alasan_lainnya');
    if (select.value === 'Lainnya') {
        inputLain.style.display = 'block';
        inputLain.required = true;
    } else {
        inputLain.style.display = 'none';
        inputLain.required = false;
    }
}
</script>


<script>
$(document).ready(function() {
    $("input[name='nama_produk']").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('barang-masuk.autocomplete') }}",
                data: { term: request.term },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.nama_produk,
                            value: item.nama_produk,
                            id: item.id,
                            gambar1: item.gambar1 // Pastikan gambar1 diambil juga
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            var produkId = ui.item.id;
            $("#produk_id").val(produkId);

            // Tampilkan gambar preview
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

            // Update variasi setelah produk dipilih
            $.ajax({
                url: '/barang-masuk/' + produkId + '/variasi',
                type: 'GET',
                success: function(data) {
                    var variasiSelect = $("select[name='variasi_id']");
                    variasiSelect.empty();
                    if (data.variasi.length > 0) {
                        variasiSelect.append('<option value="">Pilih Variasi</option>');
                        data.variasi.forEach(function(variasi) {
                            var variasiText = variasi.warna ? variasi.warna.warna : '-';
                            if (variasi.ukuran) {
                                variasiText += ' - ' + variasi.ukuran.ukuran;
                            }

                            // Menyisipkan data-gambar untuk gambar variasi (jika ada)
                            var gambar = variasi.gambar ? variasi.gambar : '';
                            variasiSelect.append(
                                '<option value="' + variasi.id + '" data-gambar="' + gambar + '">' + variasiText + '</option>'
                            );
                        });

                    } else {
                        variasiSelect.append('<option value="">Tidak ada variasi</option>');
                    }
                }
            });
        }
    });

    // Event klik gambar kecil untuk membuka modal dan tampilkan gambar besar
    $(document).on('click', '#product-image img', function() {
        $('#modalImage').attr('src', $(this).attr('src'));
    });

});
</script>
@endsection


