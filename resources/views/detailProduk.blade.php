@extends('layouts.main')
@section('container')
<div class="detail-product-card" data-name="LED Fishing Light 1">
    <div class="detail-card">
        <div class="img-detail">
            <img src="{{ asset('img/' . $post->gambar) }}" alt="LED Fishing Light">
        </div>
        <h2><a href="/produk/{{ $post->slug }}">{{ $post->nama_produk }}</a></h2>
        <p><b>Kategori</b> : <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none text-capitalize">{{ $post->kategori->nama }}</a></p>
        <p><b>Deskripsi</b> : {{ $post->deskripsi }}</p>
        <p><b>Stok</b> : {{ $post->stok }}</p>
        <p><b>Berat</b> : {{ $post->berat }}Kg</p>
        <p><b>Diskon</b> : {{ $post->diskon }}%</p>
        <h4><b>Harga</b> :Rp {{ $post->harga }}</h4>
        <a href="/produk/{{ $post->slug }}" class="text-decoration-none">
            <button class="details-button mt-4">Beli Sekarang</button>
            <a href="/produk" class="kembali-button">Kembali</a>
      </a>
    </div>
</div>

@endsection
