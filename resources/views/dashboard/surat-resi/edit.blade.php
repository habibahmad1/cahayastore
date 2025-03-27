@extends('dashboard.layouts.main')

@section('container')
<a href="{{ route('surat-resi.create') }}" class="btn btn-primary mb-3">Tambah Surat Resi</a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-lg-8">
        <form action="{{ route('surat-resi.update', $suratResi->id) }}" method="POST">
            @csrf
            @method('PUT')

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
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $suratResi->nama_barang }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ $suratResi->jumlah_barang }}" required>
            </div>

            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="{{ $suratResi->harga_barang }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="lunas" {{ $suratResi->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="belum_lunas" {{ $suratResi->status == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
                    <option value="cod" {{ $suratResi->status == 'cod' ? 'selected' : '' }}>COD</option>
                </select>
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
