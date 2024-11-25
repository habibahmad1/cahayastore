@extends('layouts.main')

@section('container')

<div class="kategori-list">
    @foreach ($kategori as $k)
    <a href="/kategori/{{ $k->slug }}" class="text-capitalize">{{ $k->nama }}</a>
    @endforeach
    <a href="/allkategori">All Kategori</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-6 pencarian">
        <form action="/produk">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Produk.." name="search" value="{{ request('search') }}">
                <button class="btn btn-warning" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<!-- Kontainer Produk -->
<br>
<section id="product-container">

    <!-- Produk LED Fishing Light -->
    <div class="product-list" id="produk-card">
        @if($posts->isEmpty())
            <p class="text-center fs-4">Tidak ada produk yang ditemukan.</p>
        @else
            @foreach ($posts as $produk)
                <div class="product-card" data-name="LED Fishing Light 1">
                    <img src="img/1.png" alt="LED Fishing Light 1">
                    <h2><a href="/produk/{{ $produk->slug }}" class="nama-produk">{{ $produk->nama_produk }}</a></h2>
                    <p><b>Kategori</b> : <a href="/kategori/{{ $produk->kategori->slug }}" class="text-decoration-none text-capitalize">{{ $produk->kategori->nama }}</a></p>
                    <p><b>Stok</b> : {{ $produk->stok }}</p>
                    <p><b>Berat</b> : {{ $produk->berat }}Kg</p>
                    <p><b>Diskon</b> : {{ $produk->diskon }}%</p>
                    <h4><b>Harga</b> : Rp {{ $produk->harga }}</h4>
                    <a href="/produk/{{ $produk->slug }}" class="text-decoration-none">
                        <button class="details-button">Selengkapnya</button>
                    </a>
                </div>
            @endforeach
        @endif

        {{ $posts->links() }}
    </div>

</section>
<br>

<script src="{{ asset('js/produk.js') }}"></script>
@endsection
