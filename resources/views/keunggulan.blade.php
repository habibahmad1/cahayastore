@extends('layouts.main')

@section('container')
    <div class="gkeunggulan">
        <div class="background bg1"></div>
        <div class="background bg2"></div>
        <div class="background bg3"></div>
        <h1>Keunggulan Perusahaan Kami</h1>
        {{-- <p>Perusahaan kami memiliki berbagai keunggulan yang mendukung kepuasan dan kesuksesan Anda. Berikut adalah beberapa
            alasan mengapa kami menjadi pilihan yang tepat untuk Anda.</p> --}}
    </div>

    <!-- Keunggulan Perusahaan -->
    <div class="keunggulanz">
        <div class="keunggulan-list">
            <div class="keunggulan-item">
                <i class="fas fa-cogs"></i>
                <h3>Inovasi Produk</h3>
                <p>Kami terus berinovasi untuk terus merancang produk terbaru untuk memberikan kenyamanan dan kualitas terbaik kepada klien kami.</p>
            </div>
            <div class="keunggulan-item">
                <i class="fas fa-users"></i>
                <h3>Tim Profesional</h3>
                <p>Tim kami terdiri dari profesional berpengalaman yang selalu siap membantu memenuhi kebutuhan Anda.</p>
            </div>
            <div class="keunggulan-item">
                <i class="fas fa-rocket"></i>
                <h3>Kecepatan Layanan</h3>
                <p>Kami mengutamakan kecepatan dalam memberikan solusi tepat waktu untuk setiap proyek.</p>
            </div>
            <div class="keunggulan-item">
                <i class="fas fa-thumbs-up"></i>
                <h3>Kepuasan Pelanggan</h3>
                <p>Fokus utama kami adalah kepuasan pelanggan, dengan hasil yang dapat diandalkan dan berkualitas tinggi.
                </p>
            </div>
        </div>
    </div>

    <div class="categories">
        <h2>Beberapa keunggulan produk kami</h2>
        <div class="category-buttonss">
            <button class="category-buttonn active" onclick="showCategory('led-light')">
                <i class="fas fa-lightbulb"></i> <!-- Ikon LED -->
                LED
            </button>
            <button class="category-buttonn" onclick="showCategory('coffee-luwak')">
                <i class="fas fa-coffee"></i> <!-- Ikon Kopi -->
                Coffee
            </button>
            <button class="category-buttonn" onclick="showCategory('sandal')">
                <i class="fas fa-shoe-prints"></i> <!-- Ikon Sandal -->
                Sandal
            </button>
            <button class="category-buttonn" onclick="showCategory('playmat')">
                <i class="fa-solid fa-rug"></i> <!-- Ikon Sandal -->
                Playmat
            </button>
        </div>
    </div>

    <div id="led-light" class="category-description" style="display: block;">
        <h2>Keunggulan LED Fishing Light</h2>
        <p>Lampu berkualitas tinggi untuk membantu memancing di malam hari. Hemat energi dan tahan lama.</p>

        <div class="containers">
            <div class="features">
                <div class="feature">
                    <i class="icon fas fa-lightbulb"></i>
                    <h2>Cahaya Super Terang</h2>
                    <p>Memancarkan cahaya LED berkekuatan tinggi yang mampu menarik perhatian ikan bahkan di perairan yang
                        gelap.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-water"></i>
                    <h2>Tahan Air</h2>
                    <p>Dirancang dengan material tahan air yang ideal untuk digunakan di lingkungan laut atau sungai.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-battery-three-quarters"></i>
                    <h2>Efisiensi Energi</h2>
                    <p>Konsumsi daya yang rendah, memungkinkan penggunaan yang lebih lama tanpa sering mengganti baterai.
                    </p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-fish"></i>
                    <h2>Meningkatkan Hasil Tangkapan</h2>
                    <p>Membantu menarik lebih banyak ikan ke area tangkapan dengan teknologi cahaya spektrum khusus.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-cogs"></i>
                    <h2>Desain Tahan Lama</h2>
                    <p>Terbuat dari bahan berkualitas tinggi, LED Fishing Light dirancang untuk bertahan dalam berbagai
                        kondisi cuaca.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-tools"></i>
                    <h2>Mudah Digunakan</h2>
                    <p>Instalasi sederhana tanpa memerlukan peralatan tambahan, cocok untuk pemula maupun profesional.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-shield-alt"></i>
                    <h2>Keamanan Tinggi</h2>
                    <p>Dilengkapi dengan fitur perlindungan terhadap korsleting dan overheat.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-dollar-sign"></i>
                    <h2>Harga Terjangkau</h2>
                    <p>Memberikan nilai terbaik dengan performa tinggi, tanpa merusak kantong Anda.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="coffee-luwak" class="category-description" style="display: none;">
        <h2>Keunggulan Coffee Luwak</h2>
        <p>Kopi terbaik dengan cita rasa unik, langsung dari perkebunan pilihan.</p>

        <div class="container">
            <div class="features">
                <div class="feature">
                    <i class="icon fas fa-leaf"></i>
                    <h2>Rasa Unik</h2>
                    <p>Kopi Luwak memiliki rasa yang khas dengan aroma yang mendalam dan tidak dapat ditemukan di kopi
                        lainnya.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-star"></i>
                    <h2>Kualitas Premium</h2>
                    <p>Diproduksi secara eksklusif, menjadikan setiap bijinya berkualitas tinggi.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-seedling"></i>
                    <h2>Proses Alami</h2>
                    <p>Melalui proses fermentasi alami oleh Luwak, menghasilkan cita rasa yang tak tertandingi.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-globe"></i>
                    <h2>Ramah Lingkungan</h2>
                    <p>Proses produksinya menjaga kelestarian lingkungan dan mendukung petani lokal.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-coffee"></i>
                    <h2>Pengalaman Istimewa</h2>
                    <p>Setiap cangkir kopi memberikan pengalaman yang luar biasa bagi pecinta kopi sejati.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-gem"></i>
                    <h2>Eksklusivitas</h2>
                    <p>Ketersediaan terbatas menjadikan Kopi Luwak sebagai produk yang sangat spesial.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-heart"></i>
                    <h2>Manfaat Kesehatan</h2>
                    <p>Memiliki kandungan antioksidan tinggi yang baik untuk tubuh.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-handshake"></i>
                    <h2>Dukungan Petani Lokal</h2>
                    <p>Membeli Kopi Luwak berarti mendukung komunitas petani dan perekonomian lokal.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="sandal" class="category-description" style="display: none;">
        <h2>Keunggulan Sandal</h2>
        <p>Sandal nyaman dan stylish untuk segala suasana.</p>

        <div class="container">
            <div class="features">
                <div class="feature">
                    <i class="icon fas fa-shoe-prints"></i>
                    <h2>Anti Slip</h2>
                    <p>Dirancang dengan sol khusus yang memberikan cengkeraman maksimal pada berbagai permukaan.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-hand-holding-water"></i>
                    <h2>Tahan Air</h2>
                    <p>Dibuat dari bahan karet berkualitas tinggi yang tahan terhadap air dan mudah dibersihkan.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-shield-alt"></i>
                    <h2>Durabilitas Tinggi</h2>
                    <p>Material karet premium memastikan sandal tahan lama, bahkan untuk penggunaan harian.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-cloud"></i>
                    <h2>Kenyamanan Optimal</h2>
                    <p>Desain ergonomis memberikan kenyamanan saat digunakan sepanjang hari.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-leaf"></i>
                    <h2>Ramah Lingkungan</h2>
                    <p>Terbuat dari bahan yang dapat didaur ulang, mendukung kelestarian lingkungan.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-tshirt"></i>
                    <h2>Ringan</h2>
                    <p>Sangat ringan, memudahkan Anda untuk membawa sandal ini ke mana saja.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-ruler-combined"></i>
                    <h2>Desain Stylish</h2>
                    <p>Tersedia dalam berbagai warna dan desain modern untuk melengkapi gaya Anda.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-wallet"></i>
                    <h2>Harga Terjangkau</h2>
                    <p>Kualitas premium dengan harga yang ramah di kantong.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="playmat" class="category-description" style="display: none;">
        <h2>Keunggulan Playmat</h2>
        <p>Karpet Kualitas premium, mudah dibersihkan, cocok untuk segala aktivitas.</p>

        <div class="container">
            <div class="features">
                <div class="feature">
                    <i class="icon fas fa-child"></i>
                    <h2>Aman untuk Anak</h2>
                    <p>Playmat dirancang dengan bahan non-toxic yang aman bagi anak-anak.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-heart"></i>
                    <h2>Lembut dan Nyaman</h2>
                    <p>Permukaan empuk memberikan kenyamanan maksimal untuk bermain atau belajar.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-th"></i>
                    <h2>Desain Edukatif</h2>
                    <p>Dilengkapi dengan gambar dan pola edukatif untuk membantu perkembangan anak.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-water"></i>
                    <h2>Mudah Dibersihkan</h2>
                    <p>Material tahan air memungkinkan Playmat dibersihkan dengan mudah.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-puzzle-piece"></i>
                    <h2>Modular dan Fleksibel</h2>
                    <p>Bisa dirangkai sesuai kebutuhan, cocok untuk berbagai ukuran ruangan.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-shield-alt"></i>
                    <h2>Perlindungan Optimal</h2>
                    <p>Melindungi anak dari cedera saat bermain di lantai.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-palette"></i>
                    <h2>Warna Menarik</h2>
                    <p>Tersedia dalam berbagai warna ceria untuk meningkatkan kreativitas anak.</p>
                </div>
                <div class="feature">
                    <i class="icon fas fa-recycle"></i>
                    <h2>Ramah Lingkungan</h2>
                    <p>Terbuat dari bahan yang dapat didaur ulang untuk menjaga kelestarian alam.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="scrollTopButtonug" class="scroll-to-top" onclick="scrollToTopug()">
        ↑
    </div>

    <script src="js/keunggulan.js"></script>
@endsection
