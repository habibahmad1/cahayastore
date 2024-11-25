@extends('layouts.main')

@section('container')

  <div class="kategori-list">
    <a href="/kategori/sandal">Sandal</a>
    <a href="/kategori/kopi">Kopi</a>
    <a href="/kategori/lampu">Lampu</a>
  </div>

  <!-- Kontainer Produk -->
  <br>
  <section id="product-container">

      <!-- Produk LED Fishing Light -->
      <div class="product-list" id="produk-card">
        @foreach ($posts as $produk)

          <div class="product-card" data-name="LED Fishing Light 1">
              <img src="img/1.png" alt="LED Fishing Light 1">
              <h2><a href="/produk/{{ $produk->slug }}">{{ $produk->nama_produk }}</a></h2>
              <p><b>Kategori</b> : <a href="/kategori/{{ $produk->kategori->slug }}" class="text-decoration-none">{{ $produk->kategori->nama }}</a></p>
              <p><b>Stok</b> : {{ $produk->stok }}</p>
              <p><b>Berat</b> : {{ $produk->berat }}Kg</p>
              <p><b>Diskon</b> : {{ $produk->diskon }}%</p>
              <h4><b>Harga</b> :Rp {{ $produk->harga }}</h4>
              <button class="details-button">Selengkapnya</button>
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
