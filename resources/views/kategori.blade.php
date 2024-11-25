@extends('layouts.main')
@section('container')
<div class="product-list my-5" id="produk-card">
        @foreach ($produk as $produk)

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
@endsection
