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

<script src="js/home.js"></script>
@endsection
