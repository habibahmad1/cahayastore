@extends('layouts.main')

@section('container')
<div class="slider">
    <div class="slides">
        <div class="slide" style="background-image: url('https://cdn.pixabay.com/photo/2023/10/06/07/14/plant-8297610_1280.jpg');">
            <div class="content">
                <h1>PT. CAHAYA SETIA INDONESIA</h1>
                <p>"Cahaya Tepat untuk Tangkap yang Hebat, Terangi Laut, Raih Hasil yang Maksimal"</p>
                <a href="#!" class="btn">Pelajari Lebih Lanjut</a>
            </div>
        </div>
        <div class="slide" style="background-image: url('https://cdn.pixabay.com/photo/2022/10/17/09/41/twig-7527181_1280.jpg');">
            <div class="content">
                <h1>PT. CAHAYA SETIA INDONESIA</h1>
                <p>"Nikmati Keaslian, Hirup Kenikmatan Bersama Luwak Coffee Authentic"</p>
                <a href="#!" class="btn">Pelajari Lebih Lanjut</a>
            </div>
        </div>
        <div class="slide" style="background-image: url('https://cdn.pixabay.com/photo/2020/02/27/16/38/tree-4885205_1280.jpg');">
            <div class="content">
                <h1>PT. CAHAYA SETIA INDONESIA</h1>
                <p>"Sandal Praktis untuk Gaya Dinamis, Setiap Langkah Bersama Kenyamanan"</p>
                <a href="#!" class="btn">Pelajari Lebih Lanjut</a>
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
