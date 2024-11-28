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
        <p>Beberapa Informasi tentang produk LED Fishing Light Kami.</p>

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
        <p>Beberapa informasi tentang Coffee Luwak Authentic Kami.</p>

        <section class="faq" id="faq">
            <div class="faq-title">
                {{-- <h1>FAQ LED Fishing Light</h1> --}}
                <div class="card-faq">
                    <h2>Apa itu kopi luwak?</h2>
                <p>
                    Kopi luwak adalah kopi yang dihasilkan dari biji kopi yang telah dimakan dan dicerna sebagian oleh luwak (sejenis musang). Proses fermentasi alami dalam saluran pencernaan luwak memberikan cita rasa unik pada kopi ini.
                </p>
              </div>
              <div class="card-faq">
                <h2>Mengapa kopi luwak istimewa?</h2>
                <p>
                    Kopi luwak dianggap istimewa karena Proses fermentasi alami dalam tubuh luwak menciptakan rasa yang lebih lembut, dengan tingkat keasaman rendah. juga
                    Kopi ini sering dianggap sebagai salah satu kopi termahal di dunia karena produksinya yang terbatas dan unik.
                </p>
              </div>
              <div class="card-faq">
                <h2>Bagaimana cara memproduksi kopi luwak?</h2>
                <p>
                    Luwak memakan buah kopi yang matang.
                    Biji kopi yang tidak tercerna dikeluarkan bersama kotoran luwak.
                    Biji kopi dikumpulkan, dicuci bersih, kemudian dikeringkan, disangrai, dan digiling menjadi bubuk kopi.
                </p>
              </div>
              <div class="card-faq">
                <h2>Apakah kopi luwak aman untuk dikonsumsi?</h2>
                <p>
                    Ya, kopi luwak aman dikonsumsi karena melalui proses pembersihan menyeluruh dan pemanasan saat pengolahan. Proses ini membunuh bakteri yang mungkin ada.
                </p>
              </div>
              <div class="card-faq">
                <h2>Berapa harga kopi luwak?</h2>
                <p>
                    Harga kopi luwak bervariasi tergantung kualitas dan asalnya. Kopi luwak asli bisa dihargai mulai dari ratusan ribu hingga jutaan rupiah per kilogram.
                </p>
              </div>
              <div class="card-faq">
                <h2>Apakah kopi luwak ramah lingkungan?</h2>
                <p>
                    Ada dua jenis produksi kopi luwak:
                    1. Alami: Luwak liar mencari buah kopi sendiri di alam.
                    2. Ternak: Luwak dipelihara dalam kandang dan diberi makan buah kopi.
                    Produksi yang melibatkan luwak liar lebih ramah lingkungan, tetapi yang berbasis ternak sering menuai kritik karena melibatkan praktik tidak etis terhadap hewan.
                </p>
              </div>
              <div class="card-faq">
                <h2>Apa rasa khas dari kopi luwak?</h2>
                <p>
                    Rasa kopi luwak cenderung lebih lembut, dengan aroma khas, rasa cokelat atau karamel, dan sedikit asam. Cita rasa ini bervariasi tergantung pada jenis kopi yang dikonsumsi oleh luwak.
                </p>
              </div>
            </div>
          </section>
    </div>

    <div id="sandal" class="page-content">
        <h2>Sandal</h2>
        <p>Beberapa informasi tentang produk sandal kami.</p>

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
</div>

  <script src="js/faq.js"></script>
@endsection
