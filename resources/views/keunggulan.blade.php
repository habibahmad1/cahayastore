@extends('layouts.main')

@section('container')

<div class="categories">
    <button class="category-button" onclick="showCategory('led-light')">
        <i class="fas fa-lightbulb"></i> <!-- Ikon LED -->
        LED Fishing Light
    </button>
    <button class="category-button" onclick="showCategory('coffee-luwak')">
        <i class="fas fa-coffee"></i> <!-- Ikon Kopi -->
        Coffee Luwak
    </button>
    <button class="category-button" onclick="showCategory('sandal')">
        <i class="fas fa-shoe-prints"></i> <!-- Ikon Sandal -->
        Sandal
    </button>
</div>

<div id="led-light" class="category-description" style="display: none;">
    <h2>LED Fishing Light</h2>
    <p>Lampu berkualitas tinggi untuk membantu memancing di malam hari. Hemat energi dan tahan lama.</p>


    <br>
    <br>
    <div class="card-orange">
        <div class="card">
          <!-- <img src="img/garansi.png" alt="Deskripsi Gambar 1" /> -->

          <i class="fa-regular fa-lightbulb"></i>
          <p>Penerangan Terang</p>
        </div>
        <div class="card">
          <!-- <img src="img/garansi.png" alt="Deskripsi Gambar 1" /> -->
          <i class="fa-solid fa-droplet"></i>
          <p>Anti Air dan Karat</p>
        </div>
        <div class="card">
          <!-- <img src="img/garansi.png" alt="Deskripsi Gambar 1" /> -->
          <i class="fa-solid fa-shield-halved"></i>
          <p>2 Tahun Garansi</p>
        </div>
      </div>

    <br>
    <br>
      <section class="keunggulan" id="features">
        <div class="slogan">
          <p>
            Terangi Perairan, Tingkatkan Hasil Tangkap: Lampu Pancing Tangguh
            untuk Visibilitas Optimal di Setiap Petualangan Laut.
          </p>
        </div>

        <div class="card-keunggulan">
          <div class="list-keunggulan">
            <i class="fa-solid fa-leaf icon"></i>
            <h3>Daya Tahan Tinggi</h3>
            <p>
              Dirancang untuk tahan terhadap kondisi perairan dan cuaca ekstrem,
              sehingga awet dan andal digunakan di laut.
            </p>
          </div>
          <div class="list-keunggulan">
            <i class="fa-regular fa-lightbulb icon"></i>
            <h3>Pencahayaan Optimal</h3>
            <p>
              Memberikan visibilitas tinggi dengan cahaya terang, sehingga
              memaksimalkan area penerangan untuk aktivitas memancing.
            </p>
          </div>
          <div class="list-keunggulan">
            <i class="fa-solid fa-bolt icon"></i>
            <h3>Efisiensi Energi</h3>
            <p>
              Konsumsi daya rendah, sehingga lebih hemat energi dan dapat
              digunakan dalam jangka waktu yang lebih lama tanpa cepat habis.
            </p>
          </div>
          <div class="list-keunggulan">
            <i class="fa-solid fa-droplet icon"></i>
            <h3>Desain Tahan Air (Waterproof)</h3>
            <p>
              Dengan fitur tahan air, lampu ini aman digunakan di dermaga,
              kapal, atau bahkan terendam sebagian.
            </p>
          </div>
          <div class="list-keunggulan">
            <i class="fa-solid fa-hammer icon"></i>
            <h3>Pemasangan Mudah</h3>
            <p>
              Desain praktis yang memudahkan pemasangan dan penyesuaian sesuai
              kebutuhan di berbagai tempat di sekitar kapal atau dermaga.
            </p>
          </div>
          <div class="list-keunggulan">
            <i class="fa-solid fa-water icon"></i>
            <h3>Cocok untuk Semua Kondisi Perairan</h3>
            <p>
              Efektif di berbagai kondisi perairan (termasuk air asin),
              membuatnya ideal untuk memancing di laut atau danau.
            </p>
          </div>
        </div>
      </section>
</div>

<div id="coffee-luwak" class="category-description" style="display: none;">
    <h2>Coffee Luwak</h2>
    <p>Kopi terbaik dengan cita rasa unik, langsung dari perkebunan pilihan.</p>
</div>

<div id="sandal" class="category-description" style="display: none;">
    <h2>Sandal</h2>
    <p>Sandal nyaman dan stylish untuk segala suasana.</p>
</div>

  <script src="js/keunggulan.js"></script>
@endsection
