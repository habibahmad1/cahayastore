@extends('layouts.main')

@section('container')
<div class="slideshow-container">
    <div class="slide fade">
        <img src="img/slide1.jpg" class="slide-image">
        <div class="slide-text">
            <h1>Solusi Terbaik untuk Lampu LED</h1>
            <p>Temani petualangan memancing Anda dengan pencahayaan terbaik.</p>
            <a href="#produk" class="button">Jelajahi Produk</a>
        </div>
    </div>
    <div class="slide fade">
        <img src="img/slide2.jpg" class="slide-image">
        <div class="slide-text">
            <h1>Pencahayaan Optimal</h1>
            <p>Menarik perhatian ikan dengan teknologi canggih.</p>
            <a href="#about" class="button">Tentang Kami</a>
        </div>
    </div>
    <div class="slide fade">
        <img src="img/slide3.jpg" class="slide-image">
        <div class="slide-text">
            <h1>Kualitas Terjamin</h1>
            <p>Hemat energi dan ramah lingkungan untuk semua petualangan Anda.</p>
            <a href="#contact" class="button">Hubungi Kami</a>
        </div>
    </div>
</div>
<script src="js/home.js"></script>
@endsection
