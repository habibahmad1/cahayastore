@extends('dashboard.layouts.main')
@section('container')
<div class="detail-product-card" data-name="LED Fishing Light 1">
    <div class="detail-card">
        <div class="img-detail">
            <img src="{{ asset('img/' . $produk->gambar) }}" alt="LED Fishing Light">
        </div>
        <h2><a href="/produk/{{ $produk->slug }}">{{ $produk->nama_produk }}</a></h2>
        <p><b>Kategori</b> : <a href="/kategori/{{ $produk->kategori->slug }}" class="text-decoration-none text-capitalize">{{ $produk->kategori->nama }}</a></p>
        <p><b>Deskripsi</b> : {{ $produk->deskripsi }}</p>
        <p><b>Stok</b> : {{ $produk->stok }}</p>
        <p><b>Berat</b> : {{ $produk->berat }}Kg</p>
        <p><b>Diskon</b> : {{ $produk->diskon }}%</p>
        <h4><b>Harga</b> :Rp {{ $produk->harga }}</h4>
        <a href="/produk/{{ $produk->slug }}" class="text-decoration-none">
            <button class="details-button mt-4">Beli Sekarang</button>
            <a href="/produk" class="kembali-button">Kembali</a>
      </a>
    </div>
</div>
@endsection
