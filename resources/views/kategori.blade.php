@extends('layouts.main')
@section('container')
<h1 class="mb-5">Kategori Produk : {{ $kategori }}</h1>
    @foreach ($produk as $produk)
        <h2><a href="/produk/{{ $produk->slug }}">{{ $produk->nama_produk }}</a></h2>
        <p>Kategori : <a href="/kategori/{{ $produk->kategori->slug }}">{{ $produk->kategori->nama }}</a></p>
        <h5>{{ $produk->deskripsi }}</h5>
        <p>{{ $produk->stok }}</p>
        <p>{{ $produk->berat }}</p>
        <p>{{ $produk->diskon }}</p>
        <h3>{{ $produk->harga }}</h3>
    @endforeach
@endsection
