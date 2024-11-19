@extends('layouts.main')

@section('container')
<section class="hero">
    <div class="text-hero">
      <p>
        PT. Cahaya Setia Indonesia <br />
        Solusi Terbaik untuk Lampu LED Fishing Light!
      </p>
      <p>
        Lampu LED untuk memancing adalah alat penerangan yang dirancang
        khusus untuk menarik perhatian ikan di perairan, meningkatkan
        pengalaman memancing, dan meningkatkan hasil tangkapan. Lampu ini
        menggunakan teknologi LED yang efisien dan tahan lama, menjadikannya
        pilihan ideal bagi para pemancing yang mencari cahaya yang terang,
        hemat energi, dan ramah lingkungan.
      </p>
      <div class="button-hero">
        <div class="buynow">
          Jelajahi Produk
          <i
            class="fa-solid fa-chevron-right"
            style="margin-left: 15px"
          ></i>
        </div>
        <div class="readmore">Tentang Kami</div>
      </div>
    </div>
    <div class="img-hero">
      <img src="img/hero.png" alt="" />
    </div>
    <div class="img-hero-hp">
      <img src="img/hero 2.png" alt="" />
    </div>
  </section>
  <section class="why" id="why">
    <div class="why-img">
      <img src="img/why.jpeg" alt="why" />
    </div>
    <div class="text-why">
      <p class="title">
        Jangan sampai salah pilih untuk urusan lampu pada saat memancing
      </p>
      <p>Berikut adalah tiga alasan mengapa memilih kami</p>
      <div class="why-benefit">
        <div class="card">
          <p>
            <i
              class="fa-regular fa-circle-check"
              style="color: #1ac504"
            ></i>
            Kualitas Terjamin dan Tahan Lama
          </p>
        </div>
        <div class="card">
          <p>
            <i
              class="fa-regular fa-circle-check"
              style="color: #1ac504"
            ></i>
            Pencahayaan Optimal untuk Kesuksesan Memancing
          </p>
        </div>
        <div class="card">
          <p>
            <i
              class="fa-regular fa-circle-check"
              style="color: #1ac504"
            ></i>
            Efisiensi Energi untuk Penggunaan Jangka Panjang
          </p>
        </div>
        <div class="button">
          <div class="message">
            Message Now
            <i
              class="fa-solid fa-chevron-right"
              style="margin-left: 10px"
            ></i>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="slogan-besar" id="slogan">
    <div class="content-slogan">
      <h1>
        <span style="color: black">Terangi Lautan , </span>Temani
        Petualangan!
      </h1>
      <p>
        Solusi pencahayaan andal yang memastikan visibilitas optimal untuk
        aktivitas memancing Anda di laut.
      </p>
      <div class="button-slogan">
        <a href="#produk" style="text-decoration: none; color: black"
          >Order Now</a
        >
      </div>
    </div>
  </section>
@endsection
