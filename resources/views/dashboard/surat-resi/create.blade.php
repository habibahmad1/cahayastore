@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Surat Resi Create</h1>
  </div>

  <form action="{{ route('surat-resi.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-3">
            <label for="nama_penerima" class="col-form-label">Nama Penerima</label>
            <input type="text" name="nama_penerima" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label for="telepon_penerima" class="col-form-label">No.Telp Penerima</label>
            <input type="number" name="telepon_penerima" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="alamat_penerima" class="col-form-label">Alamat Penerima</label>
            <input type="text" name="alamat_penerima" class="form-control" required>
        </div>
    </div>

    <hr class="col-md-6">

    <div class="row">
        <div class="col-md-3">
            <label for="nama_pengirim" class="col-form-label">Nama Pengirim</label>
            <input type="text" name="nama_pengirim" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label for="telepon_pengirim" class="col-form-label">No.Telp Pengirim</label>
            <input type="number" name="telepon_pengirim" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="alamat_pengirim" class="col-form-label">Alamat Pengirim</label>
            <input type="text" name="alamat_pengirim" class="form-control" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label for="tanggal_pengiriman" class="col-form-label">Tanggal Kirim</label>
            <input type="date" name="tanggal_pengiriman" class="form-control" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
