@extends('layouts.main')

@section('container')
<div class="marquee-container">
    <div class="marquee">
        Promo Spesial Hari Ini: Diskon Hingga 50%! Jangan Lewatkan Kesempatan Emas <a href="/produk">Ini!</a> 🤗🎉
    </div>
</div>

    <div class="slider">
    @if (session()->has('failed'))
    <div class="alert alert-danger text-center m-0" role="alert">
        {{ session('failed') }}
      </div>
    @endif
    @if (session()->has('success'))
    <div class="alert alert-success text-center m-0" role="alert">
        {{ session('success') }}
      </div>
    @endif
    @if(session('status'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('status') }}
            </div>
    @endif

        <div class="slides">
            <div class="slide"
                style="background-image: url('https://cdn.pixabay.com/photo/2012/03/03/23/54/animal-21668_1280.jpg');">
                <div class="content">
                    <h1>PT. CAHAYA SETIA INDONESIA</h1>
                    <p>"Cahaya Tepat untuk Tangkap yang Hebat, Terangi Laut, Raih Hasil yang Maksimal"</p>
                    <a href="/kategori/lampu" class="btn-banner">Jelajahi Produk</a>
                </div>
            </div>
            <div class="slide"
                style="background-image: url('https://cdn.pixabay.com/photo/2014/12/11/02/56/coffee-563797_1280.jpg');">
                <div class="content">
                    <h1>PT. CAHAYA SETIA INDONESIA</h1>
                    <p>"Nikmati Keaslian, Hirup Kenikmatan Bersama Luwak Coffee Authentic"</p>
                    <a href="/kategori/kopi" class="btn-banner">Jelajahi Produk</a>
                </div>
            </div>
            <div class="slide"
                style="background-image: url('https://cdn.pixabay.com/photo/2018/08/18/14/26/feet-3614862_1280.jpg');">
                <div class="content">
                    <h1>PT. CAHAYA SETIA INDONESIA</h1>
                    <p>"Sandal Praktis untuk Gaya Dinamis, Setiap Langkah Bersama Kenyamanan"</p>
                    <a href="/kategori/sandal" class="btn-banner">Jelajahi Produk</a>
                </div>
            </div>
            <div class="slide"
                style="background-image: url('https://static.mooimom.id/media/mamapedia/d6fIluYI--main-image.webp');">
                <div class="content">
                    <h1>PT. CAHAYA SETIA INDONESIA</h1>
                    <p>"Teman Bermain yang Aman, Nyaman dan seru untuk Si Kecil dengan Playmat!"</p>
                    <a href="/kategori/playmat" class="btn-banner">Jelajahi Produk</a>
                </div>
            </div>
        </div>
        <div class="navigation">
            <span class="nav-dot" onclick="changeSlide(0)"></span>
            <span class="nav-dot" onclick="changeSlide(1)"></span>
            <span class="nav-dot" onclick="changeSlide(2)"></span>
            <span class="nav-dot" onclick="changeSlide(3)"></span>
        </div>
    </div>

    <div class="about-company">
        <div class="about-wrapper">
            <div class="about-icon">
                <i class="fas fa-building"></i>
            </div>
            <div class="about-content">
                <h2 class="about-title">Tentang CSI</h2>
                <p class="about-description">
                    CSI atau Cahaya Setia Indonesia adalah perusahaan inovatif yang berkomitmen untuk memberikan solusi terbaik bagi klien kami. Dengan
                    tim yang berdedikasi dan pengalaman bertahun-tahun, kami selalu menghadirkan layanan yang berkualitas
                    tinggi.
                </p>

                <div class="services-section">
                    <div class="services-wrapper">
                        <h2 class="services-title">Layanan Kami</h2>
                        <div class="services-row">
                            <div class="service-card">
                                <i class="fas fa-lightbulb"></i>
                                <h3>Produk Berkualitas</h3>
                                <p>Menjual produk lampu, coffee, sandal dan Playmat dengan kualitas terbaik.</p>
                            </div>
                            <div class="service-card">
                                <i class="fas fa-certificate"></i>
                                <h3>Kualitas Terjamin</h3>
                                <p>Setiap produk telah melalui uji kualitas yang ketat.</p>
                            </div>
                            <div class="service-card">
                                <i class="fas fa-tags"></i>
                                <h3>Harga Terjangkau</h3>
                                <p>Dapatkan harga lebih murah tanpa mengurangi kualitas.</p>
                            </div>
                            <div class="service-card">
                                <i class="fas fa-shield-alt"></i>
                                <h3>Penuh Garansi</h3>
                                <p>Setiap pembelian dilengkapi dengan garansi resmi.</p>
                            </div>
                            <div class="service-card">
                                <i class="fas fa-gift"></i>
                                <h3>Banyak Bonus</h3>
                                <p>Berbagai bonus menarik setiap kali bertransaksi.</p>
                            </div>
                            <div class="service-card">
                                <i class="fas fa-handshake"></i>
                                <h3>Kerjasama</h3>
                                <p>Kami terbuka untuk berbagai bentuk kerjasama yang saling menguntungkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="story-and-experience">
        <div class="left-content">
            <h2 class="story-title"><i class="fa-solid fa-book-open"></i> Cerita Kami</h2>
            <p class="story-subtitle">PT. Cahaya Setia Indonesia, kami percaya bahwa setiap langkah kecil menuju inovasi
                adalah langkah besar menuju masa depan yang lebih baik. Sejak didirikan pada 2024, kami telah berkomitmen
                untuk menyediakan solusi yang tidak hanya memenuhi kebutuhan pasar, tetapi juga melampaui ekspektasi
                pelanggan kami.</p>
            <a href="/tentang" class="story-btn">Baca Selengkapnya</a>
        </div>
        <div class="right-content">
            <h2 class="experience-title"><i class="fa-solid fa-star"></i> Pengalaman Kami</h2>
            <div class="experience-item" data-target="97%">
                <span class="experience-subtitle">Kepercayaan Pelanggan</span>
                <div class="progress-bar">
                    <div class="progress" data-progress="97" style="width: 97%;">
                        <span class="data-target-text">97%</span>
                    </div>
                </div>
            </div>
            <div class="experience-item" data-target="90%">
                <span class="experience-subtitle">Kepuasan Pelanggan</span>
                <div class="progress-bar">
                    <div class="progress" data-progress="90" style="width:90%;">
                        <span class="data-target-text">90%</span>
                    </div>
                </div>
            </div>
            <div class="experience-item" data-target="95%">
                <span class="experience-subtitle">Rekomendasi Pelanggan</span>
                <div class="progress-bar">
                    <div class="progress" data-progress="95" style="width: 95%;">
                        <span class="data-target-text">95%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="facts-and-achievements">
        <div class="image-slider-facts">
            <div class="slide-facts"
                style="background-image: url('https://cdn.pixabay.com/photo/2019/10/06/10/03/team-4529717_1280.jpg');">
            </div>
            <div class="slide-facts"
                style="background-image: url('https://cdn.pixabay.com/photo/2017/06/02/17/47/friendship-2366955_1280.jpg');">
            </div>
            <div class="slide-facts"
                style="background-image: url('https://cdn.pixabay.com/photo/2019/09/25/09/36/team-4503157_1280.jpg');">
            </div>
        </div>
        <div class="facts-header">
            <h1 class="facts-title">Beberapa Fakta Menarik Tentang Kami</h1>
            <h2 class="facts-subtitle">Menjadi yang terbaik bukanlah kebetulan</h2>
        </div>
        <div class="facts-items">
            <div class="fact-item">
                <h3 class="fact-number" data-target="1200">0</h3>
                <p>Produk Terjual</p>
            </div>
            <div class="fact-item">
                <h3 class="fact-number" data-target="820">0</h3>
                <p>Ulasan Positif</p>
            </div>
            <div class="fact-item">
                <h3 class="fact-number" data-target="350">0</h3>
                <p>Pengiriman Setiap Bulan </p>
            </div>
            <div class="fact-item">
                <h3 class="fact-number" data-target="100">0</h3>
                <p>Produk Terlengkap</p>
            </div>
        </div>
    </section>

    <section class="testimoni" id="testimoni">
        <div class="text-testimoni">
            <h1>Apa Kata Customer Kami?</h1>
            <div class="next-text">
                <button class="button prev" onclick="showPrev()">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="button next" onclick="showNext()">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <div class="testi-slider">

            <!-- Card Testimoni 1 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    "Layanan dari tim ini sangat memuaskan! Mereka cepat, profesional,
                    dan benar-benar memahami apa yang saya butuhkan. Masalah listrik
                    saya selesai dalam waktu singkat. Sangat direkomendasikan!"
                </p>
                <div class="profil-testi">
                    <img src="img/profil.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Rina Pratiwi</h3>
                        <small>Pengusaha</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 2 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    "Pelayanan yang luar biasa! Saya menggunakan jasa mereka untuk
                    perbaikan rumah dan hasilnya sangat memuaskan. Pekerjaannya rapi
                    dan selesai tepat waktu. Saya sangat senang dengan hasilnya!"
                </p>
                <div class="profil-testi">
                    <img src="img/profil2.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Doni Wahyudi</h3>
                        <small>Wirausaha</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 3 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    "Mereka sangat profesional dan komunikatif. Tim ini bekerja dengan
                    sangat baik dan hasilnya bahkan melebihi ekspektasi saya.
                    Pekerjaan dilakukan dengan teliti dan hasil akhirnya sangat bagus"
                </p>
                <div class="profil-testi">
                    <img src="img/profil3.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Lina Suliati</h3>
                        <small>Manajer Proyek</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 4 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    "Pekerjaan yang dilakukan benar-benar berkualitas tinggi! Tim ini
                    tahu apa yang mereka lakukan dan memberikan saran yang sangat
                    membantu. Sangat puas dengan layanan ini"
                </p>
                <div class="profil-testi">
                    <img src="img/profil4.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Rendi Kurniawan</h3>
                        <small>Manajer Bisnis</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 5 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    "LED Fishing Light ini luar biasa! Sangat terang dan efisien, membantu saya memancing lebih efektif.
                    Baterainya tahan lama dan desainnya yang tahan air sangat praktis. Sangat direkomendasikan!"
                </p>
                <div class="profil-testi">
                    <img src="img/profil5.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Sinta Mega Santaksa</h3>
                        <small>Manajer PT. Unggul</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 6 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    "Pengalaman menikmati kopi luwak ini luar biasa! Rasa dan aromanya sangat khas dan mewah. Setiap cangkir
                    memberikan sensasi yang unik dan nikmat. Sangat direkomendasikan untuk pecinta kopi sejati"
                </p>
                <div class="profil-testi">
                    <img src="img/profil6.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Apfareta Salsa</h3>
                        <small>Staff Marketing</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 7 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    "Playmat ini sangat memukau! Desainnya penuh warna dan menarik, serta bahannya lembut dan aman untuk
                    anak. Mudah dibersihkan dan sangat praktis digunakan. Sangat direkomendasikan!"
                </p>
                <div class="profil-testi">
                    <img src="img/profil7.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Kurnoia Asih Pertiwi</h3>
                        <small>Manajer Marketing</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 8 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    "Saya sangat puas dengan sandal ini! Desainnya stylish dan modern, nyaman dipakai sehari-hari, dan
                    sangat tahan lama. Sol anti slip memberikan keamanan ekstra. Sangat direkomendasikan!"
                </p>
                <div class="profil-testi">
                    <img src="img/profil8.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Abraham Panglapi</h3>
                        <small>Manajer Creatif 3D</small>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <div class="containerspill">
        <h1>Produk Unggulan</h1>
        <h2>Beberapa Produk Unggulan Yang Kami Rekomendasikan Untuk Anda.</h2>
        <hr class="section-divider">
        <div class="button-group">
            <div class="button-wrapper">
                <span class="product-count"></span>
                <button class="filter-btn-prd all-btn" data-category="all">All</button>
            </div>
            <div class="button-wrapper">
                <span class="product-count"></span>
                <button class="filter-btn-prd led-btn" data-category="led">LED</button>
            </div>
            <div class="button-wrapper">
                <span class="product-count"></span>
                <button class="filter-btn-prd coffee-btn" data-category="coffee">Coffee</button>
            </div>
            <div class="button-wrapper">
                <span class="product-count"></span>
                <button class="filter-btn-prd sendal-btn" data-category="sendal">Sendal</button>
            </div>
            <div class="button-wrapper">
                <span class="product-count"></span>
                <button class="filter-btn-prd playmat-btn" data-category="playmat">Playmat</button>
            </div>
        </div>
        <div class="product-display">
            <!-- Gambar akan muncul di sini berdasarkan kategori -->
        </div>
        <a href="/produk" class="see-more-btn">Lihat Lebih Banyak</a>
    </div>

    {{-- <section id="meet-the-team" class="meet-the-team-section">
    <div class="container">
        <div class="title">
            <h1>Temui Kru</h1>
            <p>Bertemu dengan tim hebat yang mendukung kesuksesan kami</p>
        </div>
        <div class="team-container">
            <div class="team-card">
                <div class="image-container">
                    <img src="img/profil4.jpg" alt="Nama Kru 1">
                    <div class="social-icons">
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:email@example.com" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="https://www.linkedin.com/in/ahmad-hamdi-3382a3339/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <h3>Ahmad Hamdi</h3>
                <p>Creative Director</p>
                <div class="description">
                    Bekerjasama untuk menghasilkan produk visual yang mendukung tujuan perusahaan, memimpin dan mengarahkan seluruh proses kreatif.
                </div>
            </div>
            <div class="team-card">
                <div class="image-container">
                    <img src="img/profil.jpg" alt="Nama Kru 2">
                    <div class="social-icons">
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:email@example.com" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <h3>Indrianti Pertiwi</h3>
                <p>Managing Director</p>
                <div class="description">
                    Memimpin dan mengelola perusahaan, serta memutuskan dan menentukan peraturan dalam perusahaan.
                </div>
            </div>
            <div class="team-card">
                <div class="image-container">
                    <img src="img/profil2.jpg" alt="Nama Kru 2">
                    <div class="social-icons">
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:email@example.com" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="https://www.linkedin.com/in/ilham-pratama-4272a5339/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <h3>Ilham Pratama</h3>
                <p>Team Manager</p>
                <div class="description">
                    Mengarahkan dan mendukung setiap anggota tim agar mereka dapat berkontribusi dengan maksimal.
                </div>
            </div>
            <div class="team-card">
                <div class="image-container">
                    <img src="img/4.jpg" alt="Nama Kru 2">
                    <div class="social-icons">
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:email@example.com" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="https://www.linkedin.com/in/maxie-fajar-rahman-6942a4339/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <h3>Maxie Fajar Rahman</h3>
                <p>Marketing Director</p>
                <div class="description">
                    Memastikan bahwa seluruh aktivitas pemasaran mendukung pencapaian tujuan bisnis perusahaan.
                </div>
            </div>
        </div>
    </div>
</section> --}}

    {{-- <div class="scroll-animated-section">
        <video autoplay loop muted class="background-video">
            <source src="https://cdn.pixabay.com/video/2017/03/08/8252-207598592_large.mp4" type="video/mp4" />
        </video>

        <div class="content-overlay">
            <h1 class="scroll-title">"KAMI BERUPAYA MEMBERIKAN PRODUK DAN PELAYANAN YANG TERBAIK KEPADA PELANGGAN"</h1>
            <p class="scroll-subtitle">CAHAYA SETIA TEAM</p>
        </div>
        <!-- Tambahkan kontrol audio di bagian bawah -->
        <div class="audio-controls">
            <button id="playPauseBtn">
                <i class="fas fa-play"></i> <!-- Ikon Play -->
            </button>
            <!--<button id="stopBtn">
                <i class="fas fa-stop"></i>
            </button>-->
            <input id="volumeSlider" type="range" min="0" max="1" step="0.1">
        </div>
        <audio id="myAudio" src="img/bcvideo.mp3"></audio>
    </div> --}}

    {{-- iklan muncul beberapa detik --}}
    <div id="promo-banner" class="promo-banner hidden" draggable="false">
        <div class="promo-content">
            <span class="close-btn" onclick="closeBanner()">×</span>
            <img id="promo-image" src="" alt="Promo Diskon" class="promo-image" />
            <div class="promo-text">
                <h2 id="promo-title"></h2>
                <p id="countdown-timer"></p>
                <p id="promo-description"></p>
                <a id="promo-link" href="#" class="promo-btn">Lihat Produk</a>
            </div>
        </div>
    </div>



    <script src="js/home.js"></script>
@endsection
