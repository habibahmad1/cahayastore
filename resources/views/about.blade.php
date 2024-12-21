@extends('layouts.main')

@if (session('success'))
    <div style="color: green; text-align: center; margin: 20px;">
        {{ session('success') }}
    </div>
@endif


@section('container')
    <section class="about" id="about">

        <div class="about-title">
            <h1>Tentang kami</h1>
            {{-- <p>Memahami lebih dalam tentang visi dan misi kami.</p> --}}
        </div>

        {{-- <div class="gallery-container">
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
    </div> --}}
        <div class="map-teks">
            <div class="teks-about">
                <h1 style="margin: 40px 0; text-align: center">
                    PT.CAHAYA SETIA INDONESIA
                </h1>
                <p>
                    Kami percaya bahwa setiap langkah kecil menuju inovasi adalah langkah besar menuju
                    masa depan yang lebih baik. Sejak didirikan pada 2024, kami telah berkomitmen untuk
                    menyediakan solusi yang tidak hanya memenuhi kebutuhan pasar, tetapi juga melampaui ekspektasi pelanggan
                    kami.</p>

                {{-- Kami berawal dari sebuah ide sederhana : untuk menciptakan produk dan layanan yang mampu memecahkan
                    masalah nyata di masyarakat. Dengan tim yang berdedikasi dan berpengalaman, kami terus berkembang,
                    menghadirkan teknologi dan pendekatan terbaru dalam setiap proyek yang kami kerjakan.<br /><br />

                    Kami percaya pada kolaborasi dan hubungan jangka panjang yang dibangun berdasarkan kepercayaan,
                    kualitas, dan integritas. Setiap tantangan yang kami hadapi adalah kesempatan untuk belajar dan
                    berkembang, yang mendorong kami untuk terus berinovasi dalam menghadirkan solusi yang lebih baik.<br /><br /> --}}

                <p> Cahaya Setia Indonesia berperan aktif dalam penjualan online
                    dengan memanfaatkan platform digital untuk menjangkau konsumen
                    secara luas. Melalui pengembangan situs e-commerce dan penggunaan
                    marketplace, perusahaan dapat langsung menjual produk dan layanan
                    kepada audiens. </p>


                <p>Strategi pemasaran konten yang menarik, seperti artikel dan video,
                    juga berkontribusi pada peningkatan visibilitas dan membangun
                    kepercayaan di kalangan pelanggan. Media sosial menjadi saluran
                    penting untuk berinteraksi dengan audiens, mengiklankan produk,
                    dan melakukan promosi. </p>

                <p> Visi Kami : Menjadi pemimpin industri yang berfokus pada keberlanjutan dan dampak positif bagi
                    masyarakat melalui inovasi yang berkelanjutan.</p>

                <p> Misi Kami : Menyediakan produk dan layanan terbaik yang mendukung perkembangan bisnis pelanggan kami,
                    dengan selalu mengutamakan kualitas dan kepuasan.</p>
            </div>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.8826525526278!2d106.48704487511118!3d-6.253383524294324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42074f440a8997%3A0x1a5382b147d41f76!2sPT.%20CAHAYA%20SETIA%20INDONESIA!5e0!3m2!1sen!2sid!4v1730796422473!5m2!1sen!2sid"
                    style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        {{-- <div class="kontak-kami">
        <div class="kontak-title">
            <h1>Kontak Kami</h1>
            <p>Hubungi kami untuk pertanyaan, saran, atau kebutuhan lainnya!</p>
        </div>
        <div class="kontak-container">
            <form action="/send-message" method="POST" class="kontak-form">
                @csrf
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
            <div class="kontak-info">
                <h3>Informasi Kontak</h3>
                <p>Alamat: Jl. Contoh Alamat No. 123, Jakarta</p>
                <p>Telepon: +62 123 4567 890</p>
                <p>Email: info@contoh.com</p>
            </div>

        </div>
    </div> --}}

        <div class="kontak-links">
            <h3>Temukan Kami di Toko Online</h3>
            <ul class="online-stores">
                <li>
                    <a href="#" class="tok">
                        <img src="https://img.icons8.com/color/48/shopee.png" alt="Shopee">
                        Shopee
                    </a>
                    <ul class="dropdown">
                        <li><a href="https://shopee.co.id/cahayacoffee?uls_trackid=51daa06t031m&utm_campaign=-&utm_content=product&utm_medium=affiliates&utm_source=an_11345740520&utm_term=c6qjdy3fyvo1"
                                target="_blank">Toko 1</a></li>
                        <li><a href="https://shopee.co.id/cahayasetiaelectric?uls_trackid=51daa0bm004o&utm_campaign=-&utm_content=product&utm_medium=affiliates&utm_source=an_11345740520&utm_term=c6qje35g8wrf"
                                target="_blank">Toko 2</a></li>
                        <li><a href="https://shopee.co.id/cahayasetiastore_?uls_trackid=51daa0hi0145&utm_campaign=-&utm_content=product&utm_medium=affiliates&utm_source=an_11345740520&utm_term=c6qje8cpgeqm"
                                target="_blank">Toko 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="tok">
                        <img src="https://www.freepnglogos.com/uploads/logo-tokopedia-png/berita-tokopedia-info-berita-terbaru-tokopedia-6.png"
                            alt="Tokopedia">
                        Tokopedia
                    </a>
                    <ul class="dropdown">
                        <li><a href="https://www.tokopedia.com/cahayacenterid" target="_blank">Toko 1</a></li>
                        <li><a href="https://www.tokopedia.com/cahayasetiastore" target="_blank">Toko 2</a></li>
                        <li><a href="https://www.tokopedia.com/cahayasetiaelektric" target="_blank">Toko 3</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="#" class="tok">
                        <img src="https://planetsains.com/wp-content/uploads/2022/09/bukalapak.png" alt="Bukalapak">
                        Bukalapak
                    </a>
                    <ul class="dropdown">
                        <li><a href="https://bukalapak.com/toko1" target="_blank">Toko 1</a></li>
                        <li><a href="https://bukalapak.com/toko2" target="_blank">Toko 2</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="#" class="tok">
                        <img src="https://img.icons8.com/color/48/tiktok.png" alt="TikTok">
                        TikTok
                    </a>
                    <ul class="dropdown">
                        <li><a href="https://www.tiktok.com/@cahayacoffee.id?is_from_webapp=1&sender_device=pc"
                                target="_blank">Toko 1</a></li>
                        <li><a href="https://www.tiktok.com/@cahayacenterid1?is_from_webapp=1&sender_device=pc"
                                target="_blank">Toko 2</a></li>
                        <li><a href="https://www.tiktok.com/@cahayacenterid1?is_from_webapp=1&sender_device=pc"
                                target="_blank">Toko 3</a></li>
                        <li><a href="https://www.tiktok.com/@cahayasbeautyskin?_t=8rtfW4SFX9D&_r=1" target="_blank">Toko
                                4</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="#" class="tok">
                        <img src="https://freepnglogo.com/images/all_img/1701498816lazada-icon-png.png" alt="Lazada">
                        Lazada
                    </a>
                    <ul class="dropdown">
                        <li><a href="https://sellercenter.lazada.co.id/apps/product/list?spm=a1zawh.portal_home.navi_left_sidebar.droot_normal_rp_asc_v2_products_rp_asc_v2_manageproducts_common_tools.4f811e13dcrPTp&tab=online_product"
                                target="_blank">Toko 1</a></li>
                        <li><a href="https://lazada.co.id/toko2" target="_blank">Toko 2</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>

        <div class="floating-contact">
            <div class="hubungi-icon" id="hubungiButton" title="Hubungi Kami">
                <i class="fas fa-comments"></i>
            </div>
            <div class="contact-menu hidden" id="contactMenu">
                <a href="https://wa.me/6285693000255" target="_blank" class="menu-item whatsapp" title="Chat via WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="tel:+6285693000255" class="menu-item call" title="Telepon Kami">
                    <i class="fas fa-phone-alt"></i>
                </a>
                <a href="mailto:admin@cahayasetia.com" class="menu-item email" title="Kirim Email">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>




    </section>

    <script src="js/tentang.js"></script>
@endsection
