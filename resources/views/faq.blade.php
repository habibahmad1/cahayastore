@extends('layouts.main')

@section('container')
    <!-- FAQ -->
    <div class="body-faq">
        <div class="faq-hero">
            <div class="teks-hero">
                <p class="text-center" data-aos="zoom-in">Kita Disini untuk Kamu</p>
                <h1 data-aos="zoom-in">FAQ SUPPORT <i class="fa-solid fa-headset"></i></h1>
            </div>
        </div>
        <div class="container-card-faq py-4">
            <div class="card-faq">
                <div class="title-faq">
                    <h4>Kopi</h4>
                    <i class="fa-solid fa-mug-saucer"></i>
                </div>
                <p>Pertanyaan tentang Kopi</p>
                <div class="buka-card">
                    <button class="btn-buka-card btn text-white" style="background-color: #ffa340" data-kategori="Kopi">Baca</button>
                </div>
            </div>
            <div class="card-faq">
                <div class="title-faq">
                    <h4>Sandal</h4>
                    <i class="fas fa-shoe-prints"></i>
                </div>
                <p>Pertanyaan tentang Sandal</p>
                <div class="buka-card">
                    <button class="btn-buka-card btn text-white" style="background-color: #ffa340" data-kategori="Sandal">Baca</button>
                </div>
            </div>
            <div class="card-faq">
                <div class="title-faq">
                    <h4>Playmat</h4>
                    <i class="fas fa-border-all"></i>
                </div>
                <p>Pertanyaan tentang Playmat</p>
                <div class="buka-card">
                    <button class="btn-buka-card btn text-white" style="background-color: #ffa340" data-kategori="Playmat">Baca</button>
                </div>
            </div>
            <div class="card-faq">
                <div class="title-faq">
                    <h4>Lampu</h4>
                    <i class="fas fa-lightbulb"></i>
                </div>
                <p>Pertanyaan tentang Lampu</p>
                <div class="buka-card">
                    <button class="btn-buka-card btn text-white" style="background-color: #ffa340" data-kategori="Lampu">Baca</button>
                </div>
            </div>
            <div class="card-faq">
                <div class="title-faq">
                    <h4>Toko</h4>
                    <i class="fa-solid fa-shop"></i>
                </div>
                <p>Pertanyaan tentang Toko</p>
                <div class="buka-card">
                    <button class="btn-buka-card btn text-white" style="background-color: #ffa340" data-kategori="Toko">Baca</button>
                </div>
            </div>
        </div>
    </div>

    <div class="faq-popup">
        <div class="card-faq-popup">
            <h2 id="faq-popup-title">Kategori FAQ</h2>
            <div id="faq-popup-content">
                <div class="faq-item" data-kategori="Kopi">
                    <div class="faq-question">Apa itu kopi luwak?</div>
                    <div class="faq-answer">
                        Kopi luwak adalah kopi yang dihasilkan dari biji kopi yang telah dimakan dan dicerna sebagian
                        oleh luwak (sejenis musang). Proses fermentasi alami dalam saluran pencernaan luwak memberikan
                        cita rasa unik pada kopi ini.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Kopi">
                    <div class="faq-question">Mengapa kopi luwak istimewa?</div>
                    <div class="faq-answer">
                        Kopi luwak dianggap istimewa karena Proses fermentasi alami dalam tubuh luwak menciptakan rasa
                            yang lebih lembut, dengan tingkat keasaman rendah. juga
                            Kopi ini sering dianggap sebagai salah satu kopi termahal di dunia karena produksinya yang
                            terbatas dan unik.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Kopi">
                    <div class="faq-question">Bagaimana cara memproduksi kopi luwak?</div>
                    <div class="faq-answer">
                        Luwak memakan buah kopi yang matang.
                        Biji kopi yang tidak tercerna dikeluarkan bersama kotoran luwak.
                        Biji kopi dikumpulkan, dicuci bersih, kemudian dikeringkan, disangrai, dan digiling menjadi
                        bubuk kopi.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Kopi">
                    <div class="faq-question">Apakah kopi luwak aman untuk dikonsumsi?</div>
                    <div class="faq-answer">
                        Ya, kopi luwak aman dikonsumsi karena melalui proses pembersihan menyeluruh dan pemanasan saat
                            pengolahan. Proses ini membunuh bakteri yang mungkin ada.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Kopi">
                    <div class="faq-question">Berapa harga kopi luwak?</div>
                    <div class="faq-answer">
                        Harga kopi luwak bervariasi tergantung kualitas dan asalnya. Kopi luwak asli bisa dihargai mulai
                        dari ratusan ribu hingga jutaan rupiah per kilogram.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Sandal">
                    <div class="faq-question">Apakah sandal ini terbuat dari bahan yang tahan lama?</div>
                    <div class="faq-answer">
                        Ya, sandal kami dibuat dari bahan berkualitas tinggi yang tahan lama dan nyaman digunakan untuk
                        berbagai aktivitas.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Sandal">
                    <div class="faq-question">Apakah tersedia ukuran untuk semua usia?</div>
                    <div class="faq-answer">
                        Kami menyediakan berbagai ukuran untuk anak-anak, remaja, dan dewasa. Silakan cek tabel ukuran
                        di halaman produk kami.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Sandal">
                    <div class="faq-question">Apakah sandal ini anti-slip?</div>
                    <div class="faq-answer">
                        Ya, desain alas sandal kami menggunakan material khusus untuk mencegah tergelincir.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Sandal">
                    <div class="faq-question">Bagaimana cara memesan sandal?</div>
                    <div class="faq-answer">
                        Anda dapat memesan langsung di toko online marketplace kami, bisa juga melalui website kami atau menghubungi admin melalui
                        WhatsApp/Marketplace yang tersedia.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Playmat">
                    <div class="faq-question">Apa itu playmat?</div>
                    <div class="faq-answer">
                        Playmat adalah alas atau karpet empuk yang digunakan untuk anak-anak bermain. Biasanya terbuat
                        dari bahan lembut seperti busa atau karet, yang memberikan perlindungan saat anak-anak bermain
                        di lantai.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Playmat">
                    <div class="faq-question">Apa manfaat menggunakan playmat?</div>
                    <div class="faq-answer">
                        Playmat memberikan permukaan yang aman dan nyaman untuk anak-anak yang sedang bermain,
                        merangkak, atau belajar berjalan. Playmat juga membantu mencegah cedera akibat terjatuh.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Playmat">
                    <div class="faq-question">Bagaimana cara memilih playmat yang baik untuk anak?</div>
                    <div class="faq-answer">
                        Pilih playmat yang terbuat dari bahan bebas BPA, tidak beracun, dan mudah dibersihkan. Pastikan
                        ukuran playmat cukup besar untuk memberi ruang bermain yang nyaman dan pastikan memiliki
                        permukaan yang anti-slip agar tidak mudah tergelincir.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Playmat">
                    <div class="faq-question">Apakah playmat mudah dibersihkan?</div>
                    <div class="faq-answer">
                        Ya, sebagian besar playmat dirancang untuk mudah dibersihkan. Cukup lap permukaannya dengan kain
                        lembab atau sabun ringan untuk menghilangkan kotoran atau noda.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Playmat">
                    <div class="faq-question">Apakah playmat aman untuk anak yang baru lahir?</div>
                    <div class="faq-answer">
                        Playmat yang terbuat dari bahan non-toxic dan bebas dari bahan kimia berbahaya seperti BPA
                        sangat aman untuk bayi baru lahir. Pastikan bahwa playmat memiliki ketebalan yang cukup untuk
                        melindungi bayi yang sedang merangkak.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Playmat">
                    <div class="faq-question">Apakah playmat dapat digunakan di luar ruangan?</div>
                    <div class="faq-answer">
                        Beberapa playmat dirancang untuk penggunaan di luar ruangan, sementara yang lain lebih cocok
                        digunakan di dalam ruangan. Pastikan untuk memeriksa label produk untuk mengetahui kegunaan yang
                        tepat.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Playmat">
                    <div class="faq-question">Apakah playmat bisa digunakan untuk orang dewasa?</div>
                    <div class="faq-answer">
                        Beberapa jenis playmat cukup besar dan empuk untuk digunakan oleh orang dewasa, terutama untuk
                        aktivitas yoga, meditasi, atau latihan ringan. Namun, playmat anak-anak biasanya lebih kecil dan
                        khusus dirancang untuk kebutuhan bayi dan balita.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Playmat">
                    <div class="faq-question">Bagaimana cara merawat playmat agar tahan lama?</div>
                    <div class="faq-answer">
                        Untuk merawat playmat, hindari paparan sinar matahari langsung dalam waktu lama, bersihkan
                        secara rutin dengan kain lembab, dan pastikan playmat disimpan di tempat yang kering untuk
                        mencegah kerusakan.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Lampu">
                    <div class="faq-question">Apa itu lampu LED FISHING LIGHT?</div>
                    <div class="faq-answer">
                        Lampu ini digunakan untuk menarik ikan di malam hari. Lampu ini memiliki cahaya yang terang dan warna
                        yang menarik bagi ikan. Sehingga memudahkan para pemancing untuk menangkap ikan.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Lampu">
                    <div class="faq-question">Bagaimana cara menggunakan Lampu LED Fishing Light?</div>
                    <div class="faq-answer">
                        Pasang lampu LED Fishing Light di sisi kapal menggunakan pengikat
                        atau bracket yang tersedia. Pastikan lampu dipasang dengan kokoh
                        agar tidak mudah lepas saat kapal bergerak.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Lampu">
                    <div class="faq-question">Berapa lama daya tahan baterainya?</div>
                    <div class="faq-answer">
                        Rata-rata lampu LED Fishing Light dapat bertahan selama 6-8 jam
                        tergantung pada jenis dan kekuatan baterai yang digunakan.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Lampu">
                    <div class="faq-question">Apakah lampu ini tahan air?</div>
                    <div class="faq-answer">
                        Ya, lampu LED Fishing Light dirancang tahan air dan karat untuk
                        aktifitas sekitar perairan .
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Apa jam operasional toko Anda?</div>
                    <div class="faq-answer">
                        Toko kami buka setiap hari dari pukul 08.00 hingga 17.00 WIB.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Apakah Anda menyediakan layanan pengiriman?</div>
                    <div class="faq-answer">
                        Ya, kami menyediakan layanan pengiriman untuk seluruh wilayah Kab. Tangerang Biaya pengiriman
                        dihitung berdasarkan jarak dan berat paket.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Metode pembayaran apa saja yang diterima?</div>
                    <div class="faq-answer">
                        Kami menerima pembayaran tunai, kartu kredit/debit, BCA, dan pembayaran digital seperti OVO, GoPay,
                        dan Dana.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Apakah produk yang saya beli bisa dikembalikan atau ditukar?</div>
                    <div class="faq-answer">
                        Ya, kami menerima pengembalian dan penukaran produk dalam waktu 7 hari setelah pembelian dengan
                        syarat produk masih dalam kondisi baik dan disertai dengan struk pembelian dan video unboxing.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Bagaimana cara melacak pesanan saya?</div>
                    <div class="faq-answer">
                        Anda dapat melacak pesanan Anda melalui nomor resi yang dikirimkan ke email atau SMS setelah
                        pengiriman dilakukan. Masukkan nomor resi tersebut di situs web ekspedisi terkait untuk melihat
                        status pengiriman.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Apakah Anda memiliki toko cabang di tempat lain?</div>
                    <div class="faq-answer">
                        Saat ini, kami hanya memiliki satu toko fisik di Tangerang, tetapi Anda dapat berbelanja secara
                        online melalui situs web kami.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Apakah produk yang dijual asli dan berkualitas?</div>
                    <div class="faq-answer">
                        Ya, kami hanya menjual produk asli dan berkualitas tinggi. Setiap produk telah melalui proses
                        pengecekan kualitas sebelum dijual.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Apakah ada garansi untuk produk?</div>
                    <div class="faq-answer">
                        Ya, kami memberikan garansi 7 hari untuk produk cacat produksi.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Berapa lama waktu pengiriman?</div>
                    <div class="faq-answer">
                        Waktu pengiriman tergantung lokasi Anda. Biasanya, untuk area dalam kota, pengiriman memakan
                        waktu 1-3 hari kerja.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Apakah ada promo saat ini?</div>
                    <div class="faq-answer">
                        Ya, Dapatkan promo diskon hingga 50% untuk setiap produk kami.
                    </div>
                </div>
                <div class="faq-item" data-kategori="Toko">
                    <div class="faq-question">Bagaimana cara menghubungi layanan pelanggan?</div>
                    <div class="faq-answer">
                        Anda dapat menghubungi layanan pelanggan kami melalui telepon di (+62) 856-9300-0255 atau email di
                        admin@cahayasetia.com <admin@cahayasetia.com>. Tim kami siap membantu Anda setiap hari dari pukul 08.00 hingga 17.00 WIB.
                    </div>
                </div>
            </div>
            <button class="close-popup btn btn-danger">Tutup</button>
        </div>
    </div>

    <script src="js/faq.js"></script>
@endsection
