@extends('dashboard.layouts.main')
@section('container')
<div class="detail-product-card" data-name="LED Fishing Light 1">
    <div class="detail-card">
        <div class="img-detail">
            <img src="{{ asset('img/' . $produk->gambar1) }}" alt="LED Fishing Light">
        </div>
        <div class="detail-info">
            <div class="edit-produk">
                <a href="/produk" class="badge bg-warning text-decoration-none my-3"><i class="bi bi-pencil-square"></i> Edit Produk</a>
                <form action="/dashboard/produk/{{ $produk->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus Produk?')"><span><i class="bi bi-trash"></i></span>Hapus Produk</button>
                </form>
            </div>
            <h2><a href="/produk/{{ $produk->slug }}" class="text-decoration-none">{{ $produk->nama_produk }}</a></h2>
            <p><b>Kategori</b> : <a href="/kategori/{{ $produk->kategori->slug }}" class="text-decoration-none text-capitalize">{{ $produk->kategori->nama }}</a></p>
            <p><b>Deskripsi</b> : {{ $produk->deskripsi }}</p>
            <p><b>Stok</b> : {{ $produk->stok }}</p>
            <p><b>Berat</b> : {{ $produk->berat }}Kg</p>
            <p><b>Diskon</b> : {{ $produk->diskon }}%</p>
            <h4><b>Harga</b> :Rp {{ $produk->harga }}</h4>
            <div class="button">
                <a href="/dashboard/produk" class="kembali-button">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
