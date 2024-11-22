@extends('layouts.main')

@section('container')
         <!-- Menu Kategori -->
    <br>
    <br>
    <br>
    <br>
    <nav class="category-menu">
      <button class="category-btn active" data-category="led">LED Fishing Light</button>
      <button class="category-btn" data-category="kopi">Kopi Luwak</button>
      <button class="category-btn" data-category="sandal">Sandal</button>
  </nav>

  <!-- Kontainer Produk -->
  <br>
  <section id="product-container">
      <!-- Search Bar untuk LED Fishing Light -->
      <div class="search-section" id="led-search">
          <input type="text" class="search-input" placeholder="Cari produk di LED Fishing Light...">
      </div>
      <!-- Produk LED Fishing Light -->
      <div class="product-list" id="led">
        @foreach ($posts as $produk)

          <div class="product-card" data-name="LED Fishing Light 1">
              <img src="img/1.png" alt="LED Fishing Light 1">
              <h2><a href="/produk/{{ $produk->slug }}">{{ $produk->nama_produk }}</a></h2>
              <p>{{ $produk->deskripsi }}</p>
              <p>Kategori : <a href="/kategori/{{ $produk->kategori->slug }}">{{ $produk->kategori->nama }}</a></p>
              <p>Stok : {{ $produk->stok }}</p>
              <p>Berat : {{ $produk->berat }}</p>
              <p>Diskon : {{ $produk->diskon }}%</p>
              <h3>Harga : {{ $produk->harga }}</h3>
              <button class="details-button">Selengkapnya →</button>
          </div>

          @endforeach
      </div>


      {{-- @foreach ($posts as $produk)
        <h2><a href="/produk/{{ $produk->slug }}">{{ $produk->nama_produk }}</a></h2>
        <p>Kategori : <a href="/kategori/{{ $produk->kategori->slug }}">{{ $produk->kategori->nama }}</a></p>
        <h5>{{ $produk->deskripsi }}</h5>
        <p>{{ $produk->stok }}</p>
        <p>{{ $produk->berat }}</p>
        <p>{{ $produk->diskon }}</p>
        <h3>{{ $produk->harga }}</h3>
      @endforeach --}}
    </section>
    <br>

    <script src="{{ asset('js/produk.js') }}"></script>
@endsection
