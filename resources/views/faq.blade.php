@extends('layouts.main')

@section('container')
<!-- FAQ -->

<div class="faq">
    {{-- <h1>Pilih Kategori</h1> --}}
    <div class="category-container">
        <button class="category-button" onclick="showCategory('led')"><i class="fas fa-lightbulb"></i>LED Fishing Light</button>
        <button class="category-button" onclick="showCategory('coffee')"><i class="fas fa-coffee"></i>Coffee Luwak</button>
        <button class="category-button" onclick="showCategory('sandal')"><i class="fas fa-shoe-prints"></i>Sandal</button>
    </div>

    <div id="led" class="page-content">
        <h2>LED Fishing Light</h2>
        <p>Beberapa Informasi tentang produk LED Fishing Light.</p>

        <section class="faq" id="faq">
            <div class="faq-title">
                {{-- <h1>FAQ LED Fishing Light</h1> --}}
                <div class="card-faq">
                    <h2>Apa itu Lampu LED Fishing Light?</h2>
                <p>
                  Lampu ini digunakan untuk menerangi perairan, memudahkan navigasi,
                  dan membantu menarik ikan saat memancing.
                </p>
              </div>
              <div class="card-faq">
                <h2>Bagaimana cara menggunakan Lampu LED Fishing Light?</h2>
                <p>
                  Pasang lampu LED Fishing Light di sisi kapal menggunakan pengikat
                  atau bracket yang tersedia. Pastikan lampu dipasang dengan kokoh
                  agar tidak mudah lepas saat kapal bergerak.
                </p>
              </div>
              <div class="card-faq">
                <h2>Berapa lama daya tahan baterainya?</h2>
                <p>
                  Rata-rata lampu LED Fishing Light dapat bertahan selama 6-8 jam
                  tergantung pada jenis dan kekuatan baterai yang digunakan.
                </p>
              </div>
              <div class="card-faq">
                <h2>Apakah lampu ini tahan air?</h2>
                <p>
                  Ya, lampu LED Fishing Light dirancang tahan air dan karat untuk
                  aktifitas sekitar perairan .
                </p>
              </div>
            </div>
          </section>
    </div>

    <div id="coffee" class="page-content">
        <h2>Coffee Luwak</h2>
        <p>Informasi tentang Coffee Luwak akan muncul di sini.</p>
    </div>

    <div id="sandal" class="page-content">
        <h2>Sandal</h2>
        <p>Informasi tentang produk sandal akan muncul di sini.</p>
    </div>
</div>

  <script src="js/faq.js"></script>
@endsection
