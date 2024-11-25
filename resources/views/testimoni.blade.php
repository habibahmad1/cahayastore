@extends('layouts.main')

@section('container')
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
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i>
        </div>
        <p>
          Layanan dari tim ini sangat memuaskan! Mereka cepat, profesional,
          dan benar-benar memahami apa yang saya butuhkan. Masalah listrik
          saya selesai dalam waktu singkat. Sangat direkomendasikan!
        </p>
        <div class="profil-testi">
          <img
            src="img/profil.jpg"
            alt="profil"
            width="40px"
            style="border-radius: 40px"
          />
          <div class="profil">
            <h3>Rina Pratiwi</h3>
            <small>Pengusaha</small>
          </div>
        </div>
      </div>

      <!-- Card Testimoni 2 -->
      <div class="card-testi">
        <div class="star-testi">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i>
        </div>
        <p>
          Pelayanan yang luar biasa! Saya menggunakan jasa mereka untuk
          perbaikan rumah dan hasilnya sangat memuaskan. Pekerjaannya rapi
          dan selesai tepat waktu. Saya sangat senang dengan hasilnya!
        </p>
        <div class="profil-testi">
          <img
            src="img/profil2.jpg"
            alt="profil"
            width="40px"
            style="border-radius: 40px"
          />
          <div class="profil">
            <h3>Doni Wahyudi</h3>
            <small>Wirausaha</small>
          </div>
        </div>
      </div>

      <!-- Card Testimoni 3 -->
      <div class="card-testi">
        <div class="star-testi">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i>
        </div>
        <p>
          Mereka sangat profesional dan komunikatif. Tim ini bekerja dengan
          sangat baik dan hasilnya bahkan melebihi ekspektasi saya.
          Pekerjaan dilakukan dengan teliti dan hasil akhirnya sangat bagus.
        </p>
        <div class="profil-testi">
          <img
            src="img/profil3.jpg"
            alt="profil"
            width="40px"
            style="border-radius: 40px"
          />
          <div class="profil">
            <h3>Lina Suliati</h3>
            <small>Manajer Proyek</small>
          </div>
        </div>
      </div>
      <div class="card-testi">
        <div class="star-testi">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i>
        </div>
        <p>
          Pekerjaan yang dilakukan benar-benar berkualitas tinggi! Tim ini
          tahu apa yang mereka lakukan dan memberikan saran yang sangat
          membantu. Sangat puas dengan layanan ini.
        </p>
        <div class="profil-testi">
          <img
            src="img/profil4.jpg"
            alt="profil"
            width="40px"
            style="border-radius: 40px"
          />
          <div class="profil">
            <h3>Rendi Kurniawan</h3>
            <small>Manajer Bisnis</small>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
