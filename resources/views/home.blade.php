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
<script src="js/home.js"></script>
@endsection
