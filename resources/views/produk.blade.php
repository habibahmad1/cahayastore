@extends('layouts.main')

@section('container')


<h1 class="text-center mb-4" style="padding-top: 80px">Semua Produk</h1>

<div class="row justify-content-center px-4">
    <div class="col-lg-8 pencarian">
        <form action="/produk">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Produk.." name="search" value="{{ request('search') }}" id="search-box">
                <button class="btn btn-warning" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="kategori-list">
    @foreach ($kategori as $k)
    <a href="/kategori/{{ $k->slug }}" class="text-capitalize">{{ $k->nama }}</a>
    @endforeach
    <a href="/allkategori">All Kategori</a>
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
                <div class="product-card" data-name="img-produk">
                    <div class="kategori-produk">
                        <p><a href="/kategori/{{ $produk->kategori->slug }}" class="text-decoration-none text-capitalize text-white">{{ $produk->kategori->nama }} <i class="fa-solid fa-tag"></i></a></p>
                    </div>
                    <img src="{{ asset('storage/' . $produk->gambar1) }}" alt="Img-Produk">
                    <div class="produk-info">
                        <h5><a href="/produk/{{ $produk->slug }}" class="nama-produk">{{ $produk->nama_produk }}</a></h5>
                        <p><span class="btn btn-warning text-danger"><i class="fa-solid fa-fire"></i> Diskon : {{ $produk->diskon }}% </span></p>
                        <p><i class="fa-solid fa-truck-fast" style="color: #2fd946"></i> Kab.Tangerang</p>
                        <p><i class="fa-solid fa-store" style="color: #04b4c4"></i> Cahayacenterid</p>
                        <h4><b>Harga : Rp {{ number_format($produk->harga, 0, ',', '.') }}</b></h4>
                    </div>
                    <a href="/produk/{{ $produk->slug }}" class="text-decoration-none">
                        <button class="details-button">Selengkapnya</button>
                    </a>
                </div>
            @endforeach
        @endif

    </div>

    <div class="pagination d-flex justify-content-center my-5">
        {{ $posts->links() }}
    </div>
</section>
<br>

<script src="{{ asset('js/produk.js') }}"></script>
@endsection
