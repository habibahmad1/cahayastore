@extends('layouts.main')

@section('container')
<h1 class="mb-5">Kategori Produk</h1>

    @if($kategori->isEmpty())
        <p>Tidak ada kategori yang tersedia.</p>
    @else
        <div class="kategori-container">
            @foreach($kategori as $kategoriproduk)
            <img src="https://picsum.photos/seed/{{ $kategoriproduk->nama }}/300/300" alt="Gambar Alam">
            <a href="/kategori/{{ $kategoriproduk->slug }}" class="card-all-kategori">
                <h2>{{ $kategoriproduk->nama }}</h2>
            </a>
            @endforeach
        </div>
    @endif
@endsection
