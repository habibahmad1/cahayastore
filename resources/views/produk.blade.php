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
          <div class="product-card" data-name="LED Fishing Light 1">
              <img src="img/1.png" alt="LED Fishing Light 1">
              <h2>LED Fishing Light 1</h2>
              <p>Harga mulai: Rp 250,000</p>
              <button class="details-button">Selengkapnya →</button>
          </div>
          <div class="product-card" data-name="LED Fishing Light 2">
              <img src="img/2.png" alt="LED Fishing Light 2">
              <h2>LED Fishing Light 2</h2>
              <p>Harga mulai: Rp 275,000</p>
              <button class="details-button">Selengkapnya →</button>
          </div>
          <div class="product-card" data-name="LED Fishing Light 3">
            <img src="img/3.png" alt="LED Fishing Light 3">
            <h2>LED Fishing Light 3</h2>
            <p>Harga mulai: Rp 275,000</p>
            <button class="details-button">Selengkapnya →</button>
        </div>
        <div class="product-card" data-name="LED Fishing Light 4">
            <img src="img/4.png" alt="LED Fishing Light 4">
            <h2>LED Fishing Light 4</h2>
            <p>Harga mulai: Rp 275,000</p>
            <button class="details-button">Selengkapnya →</button>
        </div>
        <div class="product-card" data-name="LED Fishing Light 5">
            <img src="img/1.png" alt="LED Fishing Light 5">
            <h2>LED Fishing Light 5</h2>
            <p>Harga mulai: Rp 275,000</p>
            <button class="details-button">Selengkapnya →</button>
        </div>
        <div class="product-card" data-name="LED Fishing Light 6">
            <img src="img/1.png" alt="LED Fishing Light 6">
            <h2>LED Fishing Light 6</h2>
            <p>Harga mulai: Rp 250,000</p>
            <button class="details-button">Selengkapnya →</button>
        </div>
        <div class="product-card" data-name="LED Fishing Light 7">
            <img src="img/2.png" alt="LED Fishing Light 7">
            <h2>LED Fishing Light 7</h2>
            <p>Harga mulai: Rp 275,000</p>
            <button class="details-button">Selengkapnya →</button>
        </div>
        <div class="product-card" data-name="LED Fishing Light 8">
          <img src="img/3.png" alt="LED Fishing Light 8">
          <h2>LED Fishing Light 8</h2>
          <p>Harga mulai: Rp 275,000</p>
          <button class="details-button">Selengkapnya →</button>
      </div>
      <div class="product-card" data-name="LED Fishing Light 9">
          <img src="img/4.png" alt="LED Fishing Light 9">
          <h2>LED Fishing Light 9</h2>
          <p>Harga mulai: Rp 275,000</p>
          <button class="details-button">Selengkapnya →</button>
      </div>
      <div class="product-card" data-name="LED Fishing Light 10">
          <img src="img/1.png" alt="LED Fishing Light 10">
          <h2>LED Fishing Light 10</h2>
          <p>Harga mulai: Rp 275,000</p>
          <button class="details-button">Selengkapnya →</button>
      </div>
      </div>

      <!-- Search Bar untuk Kopi Luwak -->
      <div class="search-section hidden" id="kopi-search">
          <input type="text" class="search-input" placeholder="Cari produk di Kopi Luwak...">
      </div>
      <!-- Produk Kopi Luwak -->
      <div class="product-list hidden" id="kopi">
          <div class="product-card" data-name="Kopi Luwak 1">
              <img src="kopi1.jpg" alt="Kopi Luwak 1">
              <h2>Kopi Luwak 1</h2>
              <p>Harga mulai: Rp 350,000</p>
              <button class="details-button">Selengkapnya →</button>
          </div>
          <div class="product-card" data-name="Kopi Luwak 2">
              <img src="kopi2.jpg" alt="Kopi Luwak 2">
              <h2>Kopi Luwak 2</h2>
              <p>Harga mulai: Rp 400,000</p>
              <button class="details-button">Selengkapnya →</button>
          </div>
      </div>

      <!-- Search Bar untuk Sandal -->
      <div class="search-section hidden" id="sandal-search">
          <input type="text" class="search-input" placeholder="Cari produk di Sandal...">
      </div>
      <!-- Produk Sandal -->
      <div class="product-list hidden" id="sandal">
          <div class="product-card" data-name="Sandal 1">
              <img src="sandal1.jpg" alt="Sandal 1">
              <h2>Sandal 1</h2>
              <p>Harga mulai: Rp 75,000</p>
              <button class="details-button">Selengkapnya →</button>
          </div>
          <div class="product-card" data-name="Sandal 2">
              <img src="sandal2.jpg" alt="Sandal 2">
              <h2>Sandal 2</h2>
              <p>Harga mulai: Rp 80,000</p>
              <button class="details-button">Selengkapnya →</button>
          </div>
      </div>
    </section>
    <br>

    <script src="{{ asset('js/produk.js') }}"></script>
@endsection
