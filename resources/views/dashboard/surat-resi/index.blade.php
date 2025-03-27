@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Surat Resi</h1>
  </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('surat-resi.create') }}" class="btn btn-primary mb-3">Tambah Surat Resi</a>

    <div class="row">
        @foreach($suratResis as $suratResi)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="card-text">
                        <strong>Penerima:</strong> {{ $suratResi->nama_penerima }} <br>
                        <strong>Alamat Penerima:</strong> {{ $suratResi->alamat_penerima }} <br>
                        <strong>Telepon Penerima:</strong> {{ $suratResi->telepon_penerima }} <br>
                        <hr>
                        <strong>Pengirim:</strong> {{ $suratResi->nama_pengirim }} <br>
                        <strong>Alamat Pengirim:</strong> {{ $suratResi->alamat_pengirim }} <br>
                        <strong>Telepon Pengirim:</strong> {{ $suratResi->telepon_pengirim }} <br>
                        <hr>
                        <strong>Pembayaran:</strong> {{ $suratResi->pembayaran }} <br>
                        <strong>Barang:</strong> {{ $suratResi->nama_barang }} <br>
                        <strong>Jumlah:</strong> {{ $suratResi->jumlah_barang }} <br>
                        <strong>Harga:</strong> Rp{{ number_format($suratResi->harga_barang, 0, ',', '.') }} <br>
                        <strong>Total</strong> Rp{{ number_format($suratResi->harga_barang * $suratResi->jumlah_barang, 0, ',', '.') }}
                        <hr>
                        <strong>Status:</strong>
                        <span class="badge
                            {{ $suratResi->status == 'lunas' ? 'bg-success' : ($suratResi->status == 'belum_lunas' ? 'bg-warning' : 'bg-secondary') }}">
                            {{ ucfirst(str_replace('_', ' ', $suratResi->status)) }}
                        </span>
                    </p>
                    <a href="{{ route('surat-resi.edit', $suratResi->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('surat-resi.destroy', $suratResi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
