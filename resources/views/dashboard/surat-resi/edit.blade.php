@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Surat Resi</h1>
  </div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="col-lg-8 mb-5">
    <form action="{{ route('surat-resi.update', $suratResi->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- <div class="mb-3">
            <label for="nomor_resi" class="form-label">Nomor Resi</label>
            <input type="text" class="form-control" id="nomor_resi" name="nomor_resi" value="{{ $suratResi->nomor_resi }}" required>
        </div> --}}

        <div class="mb-3">
            <label for="nama_penerima" class="form-label">Nama Penerima</label>
            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="{{ $suratResi->nama_penerima }}" required>
        </div>

        <div class="mb-3">
            <label for="telepon_penerima" class="form-label">Telepon Penerima</label>
            <input type="text" class="form-control" id="telepon_penerima" name="telepon_penerima" value="{{ $suratResi->telepon_penerima }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
            <input type="text" class="form-control" id="alamat_penerima" name="alamat_penerima" value="{{ $suratResi->alamat_penerima }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
            <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="{{ $suratResi->nama_pengirim }}" required>
        </div>

        <div class="mb-3">
            <label for="telepon_pengirim" class="form-label">Telepon Pengirim</label>
            <input type="text" class="form-control" id="telepon_pengirim" name="telepon_pengirim" value="{{ $suratResi->telepon_pengirim }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
            <input type="text" class="form-control" id="alamat_pengirim" name="alamat_pengirim" value="{{ $suratResi->alamat_pengirim }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
            <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" value="{{ $suratResi->tanggal_pengiriman }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('surat-resi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
