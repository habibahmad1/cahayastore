@extends('layouts.main')

@section('container')
<div class="slider">
    <div class="slides">
        <div class="slide" style="background-image: url('https://cdn.pixabay.com/photo/2012/03/03/23/54/animal-21668_1280.jpg');">
            <div class="content">
                <h1>PT. CAHAYA SETIA INDONESIA</h1>
                <p>"Cahaya Tepat untuk Tangkap yang Hebat, Terangi Laut, Raih Hasil yang Maksimal"</p>
                <a href="#!" class="btn">Jelajahi Produk</a>
            </div>
        </div>
        <div class="slide" style="background-image: url('https://cdn.pixabay.com/photo/2014/12/11/02/56/coffee-563797_1280.jpg');">
            <div class="content">
                <h1>PT. CAHAYA SETIA INDONESIA</h1>
                <p>"Nikmati Keaslian, Hirup Kenikmatan Bersama Luwak Coffee Authentic"</p>
                <a href="#!" class="btn">Jelajahi Produk</a>
            </div>
        </div>
        <div class="slide" style="background-image: url('https://cdn.pixabay.com/photo/2018/08/18/14/26/feet-3614862_1280.jpg');">
            <div class="content">
                <h1>PT. CAHAYA SETIA INDONESIA</h1>
                <p>"Sandal Praktis untuk Gaya Dinamis, Setiap Langkah Bersama Kenyamanan"</p>
                <a href="#!" class="btn">Jelajahi Produk</a>
            </div>
        </div>
    </div>
    <div class="navigation">
        <span class="nav-dot" onclick="changeSlide(0)"></span>
        <span class="nav-dot" onclick="changeSlide(1)"></span>
        <span class="nav-dot" onclick="changeSlide(2)"></span>
    </div>
</div>

<div class="about-company">
    <div class="about-wrapper">
        <div class="about-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="about-content">
            <h2 class="about-title">Tentang Kami</h2>
            <p class="about-description">
                Kami adalah perusahaan inovatif yang berkomitmen untuk memberikan solusi terbaik bagi klien kami. Dengan tim yang berdedikasi dan pengalaman bertahun-tahun, kami selalu menghadirkan layanan yang berkualitas tinggi.
            </p>

            <div class="services-section">
                <div class="services-wrapper">
                    <h2 class="services-title">Layanan Kami</h2>
                    <div class="services-row">
                        <div class="service-card">
                            <i class="fas fa-lightbulb"></i>
                            <h3>Produk Berkualitas</h3>
                            <p>Menjual produk lampu, coffee, dan sandal dengan kualitas terbaik.</p>
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
        <p class="story-subtitle">Perjalanan kami dari awal hingga sekarang.</p>
        <button class="story-btn">Baca Selengkapnya</button>
    </div>
    <div class="right-content">
        <h2 class="experience-title"><i class="fa-solid fa-star"></i> Pengalaman Kami</h2>
        <div class="experience-item" data-target="90%">
            <span class="experience-subtitle">Merek</span>
            <div class="progress-bar">
                <div class="progress" data-progress="90" style="width: 90%;">
                    <span class="data-target-text">90%</span>
                </div>
            </div>
        </div>
        <div class="experience-item" data-target="85%">
            <span class="experience-subtitle">Pengalaman Pengguna</span>
            <div class="progress-bar">
                <div class="progress" data-progress="85" style="width: 85%;">
                    <span class="data-target-text">85%</span>
                </div>
            </div>
        </div>
        <div class="experience-item" data-target="95%">
            <span class="experience-subtitle">Desain Produk</span>
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
        <div class="slide-facts" style="background-image: url('https://cdn.pixabay.com/photo/2019/10/06/10/03/team-4529717_1280.jpg');"></div>
        <div class="slide-facts" style="background-image: url('https://cdn.pixabay.com/photo/2017/06/02/17/47/friendship-2366955_1280.jpg');"></div>
        <div class="slide-facts" style="background-image: url('https://cdn.pixabay.com/photo/2019/09/25/09/36/team-4503157_1280.jpg');"></div>
    </div>
    <div class="facts-header">
        <h1 class="facts-title">Beberapa Fakta Menarik Tentang Kami</h1>
        <h2 class="facts-subtitle">Menjadi yang terbaik bukanlah kebetulan</h2>
    </div>
    <div class="facts-items">
        <div class="fact-item">
            <h3 class="fact-number" data-target="1200">0</h3>
            <p>Pelanggan yang puas</p>
        </div>
        <div class="fact-item">
            <h3 class="fact-number" data-target="800">0</h3>
            <p>Produk Terlengkap</p>
        </div>
        <div class="fact-item">
            <h3 class="fact-number" data-target="500">0</h3>
            <p>Kualitas Terjamin</p>
        </div>
        <div class="fact-item">
            <h3 class="fact-number" data-target="100">0</h3>
            <p>Kerjasama Perusahaan</p>
        </div>
    </div>
</section>

<section id="meet-the-team" class="meet-the-team-section">
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
                        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <h3>Ahmad Hamdi</h3>
                <p>Jabatan</p>
                <div class="description">
                    Deskripsi singkat tentang kru dan peran mereka dalam tim.
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
                <p>Jabatan</p>
                <div class="description">
                    Deskripsi singkat tentang kru dan peran mereka dalam tim.
                </div>
            </div>
            <div class="team-card">
                <div class="image-container">
                    <img src="img/profil2.jpg" alt="Nama Kru 2">
                    <div class="social-icons">
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:email@example.com" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <h3>Ilham Pratama</h3>
                <p>Jabatan</p>
                <div class="description">
                    Deskripsi singkat tentang kru dan peran mereka dalam tim.
                </div>
            </div>
            <div class="team-card">
                <div class="image-container">
                    <img src="img/4.jpg" alt="Nama Kru 2">
                    <div class="social-icons">
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:email@example.com" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <h3>Maxie Fajar Rahman</h3>
                <p>Jabatan</p>
                <div class="description">
                    Deskripsi singkat tentang kru dan peran mereka dalam tim.
                </div>
            </div>
        </div>
    </div>
</section>


<script src="js/home.js"></script>
@endsection
