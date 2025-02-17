@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Barang Masuk</h1>
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

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <strong>Buat Laporan Barang Masuk</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('barang-masuk.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
                <div class="col-md-3">
                    <label for="produk_id" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                    <input type="hidden" name="produk_id" id="produk_id">
                </div>
                <div class="col-md-3">
                    <label for="variasi_id" class="form-label">Variasi (Opsional)</label>
                    <select name="variasi_id" class="form-select" id="variasi_id">
                        <option value="">-- Pilih Variasi --</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <label for="qty" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="qty" min="1" required>
                </div>
                <div class="col-md-2">
                    <label for="exp" class="form-label">Expired</label>
                    <input type="date" class="form-control" name="exp">
                </div>
                <div class="col-md-2 d-flex align-items-end mt-3">
                    <button type="submit" class="btn btn-success w-100"><i class="bi bi-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
$(document).ready(function() {
    $("input[name='nama_produk']").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('barang-masuk.autocomplete') }}",
                data: { term: request.term },
                success: function(data) {
                    response($.map(data, function(item) {
                        return { label: item.nama_produk, value: item.nama_produk, id: item.id };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            var produkId = ui.item.id;
            $("#produk_id").val(produkId);
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
                            variasiSelect.append('<option value="' + variasi.id + '">' + variasiText + '</option>');
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
