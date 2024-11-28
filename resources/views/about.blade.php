@extends('layouts.main')

@section('container')
<section class="about" id="about">

    <div class="about-title">
      <h1>Tentang kami</h1>
      <p>Memahami lebih dalam tentang visi dan misi kami.</p>
    </div>

    <div class="gallery-container">
      <div class="gallery-item">
        <img src="img/4.jpg" alt="Gallery Image 1" />
        <div class="overlay">Sejarah Perusahaan</div>
      </div>
      <div class="gallery-item">
        <img src="img/kami.jpg" alt="Gallery Image 2" />
        <div class="overlay">Tim perusahaan</div>
      </div>
      <div class="gallery-item">
        <img src="img/3.jpg" alt="Gallery Image 3" />
        <div class="overlay">Prinsip dan nilai</div>
      </div>
      <div class="gallery-item">
        <img src="img/2.jpg" alt="Gallery Image 3" />
        <div class="overlay">Kerjasama</div>
      </div>
      <div class="gallery-item">
        <img src="img/1.jpg" alt="Gallery Image 4" />
        <div class="overlay">Penghargaan</div>
      </div>
    </div>
    <div class="map-teks">
      <div class="teks-about">
        <h1 style="margin: 40px 0; text-align: center">
          PT.CAHAYA SETIA INDONESIA
        </h1>
        <p>
          PT Cahaya Setia Indonesia berperan aktif dalam penjualan online
          dengan memanfaatkan platform digital untuk menjangkau konsumen
          secara luas. Melalui pengembangan situs e-commerce dan penggunaan
          marketplace, perusahaan dapat langsung menjual produk dan layanan
          kepada audiens. <br /><br />
          Strategi pemasaran konten yang menarik, seperti artikel dan video,
          juga berkontribusi pada peningkatan visibilitas dan membangun
          kepercayaan di kalangan pelanggan. Media sosial menjadi saluran
          penting untuk berinteraksi dengan audiens, mengiklankan produk,
          dan melakukan promosi.
        </p>
      </div>
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.8826525526278!2d106.48704487511118!3d-6.253383524294324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42074f440a8997%3A0x1a5382b147d41f76!2sPT.%20CAHAYA%20SETIA%20INDONESIA!5e0!3m2!1sen!2sid!4v1730796422473!5m2!1sen!2sid"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>

    <div class="kontak-kami">
        <div class="kontak-title">
            <h1>Kontak Kami</h1>
            <p>Hubungi kami untuk pertanyaan, saran, atau kebutuhan lainnya!</p>
        </div>
        <div class="kontak-container">
            <div class="kontak-form">
                <form action="/kirim-pesan" method="POST">
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan:</label>
                        <textarea id="message" name="message" placeholder="Tulis pesan Anda" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Kirim</button>
                </form>
            </div>
            {{-- <div class="kontak-info">
                <h3>Informasi Kontak</h3>
                <p>Alamat: Jl. Contoh Alamat No. 123, Jakarta</p>
                <p>Telepon: +62 123 4567 890</p>
                <p>Email: info@contoh.com</p>
            </div> --}}

        </div>
    </div>

    <div class="kontak-links">
        <h3>Temukan Kami di Toko Online</h3>
        <ul class="online-stores">
            <li>
                <a href="#">
                    <img src="https://img.icons8.com/color/48/shopee.png" alt="Shopee">
                    Shopee
                </a>
                <ul class="dropdown">
                    <li><a href="https://shopee.co.id/toko1" target="_blank">Toko 1</a></li>
                    <li><a href="https://shopee.co.id/toko2" target="_blank">Toko 2</a></li>
                    <li><a href="https://shopee.co.id/toko2" target="_blank">Toko 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <img src="https://www.freepnglogos.com/uploads/logo-tokopedia-png/berita-tokopedia-info-berita-terbaru-tokopedia-6.png" alt="Tokopedia">
                    Tokopedia
                </a>
                <ul class="dropdown">
                    <li><a href="https://tokopedia.com/toko1" target="_blank">Toko 1</a></li>
                    <li><a href="https://tokopedia.com/toko2" target="_blank">Toko 2</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <img src="https://seeklogo.com/images/B/bukalapak-logo-E32BE44217-seeklogo.com.png" alt="Bukalapak">
                    Bukalapak
                </a>
                <ul class="dropdown">
                    <li><a href="https://bukalapak.com/toko1" target="_blank">Toko 1</a></li>
                    <li><a href="https://bukalapak.com/toko2" target="_blank">Toko 2</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <img src="https://img.icons8.com/color/48/tiktok.png" alt="TikTok">
                    TikTok
                </a>
                <ul class="dropdown">
                    <li><a href="https://tiktok.com/@toko1" target="_blank">Toko 1</a></li>
                    <li><a href="https://tiktok.com/@toko2" target="_blank">Toko 2</a></li>
                    <li><a href="https://tiktok.com/@toko3" target="_blank">Toko 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <img src="https://freepnglogo.com/images/all_img/1701498816lazada-icon-png.png" alt="Lazada">
                    Lazada
                </a>
                <ul class="dropdown">
                    <li><a href="https://lazada.co.id/toko1" target="_blank">Toko 1</a></li>
                    <li><a href="https://lazada.co.id/toko2" target="_blank">Toko 2</a></li>
                </ul>
            </li>
        </ul>
    </div>


  </section>
@endsection
