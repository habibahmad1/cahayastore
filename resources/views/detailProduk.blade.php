@extends('layouts.main')
@section('container')
    <h2 class="mt-5">{{ $post->nama_produk }}</h2>
    <h5>{{ $post->deskripsi }}</h5>
        <p>{{ $post->stok }}</p>
        <p>{{ $post->berat }}</p>
        <p>{{ $post->diskon }}</p>
        <h3>{{ $post->harga }}</h3>
    <a href="/produk">Back</a>
@endsection
