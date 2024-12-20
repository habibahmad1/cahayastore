@extends('layouts.main')

@section('container')
    <!-- FAQ -->

    <div class="faq">
        {{-- <h1>Pilih Kategori</h1> --}}
        <div class="category-container">
            <button class="category-button" onclick="showCategory('led')"><i class="fas fa-lightbulb"></i> LED</button>
            <button class="category-button" onclick="showCategory('coffee')"><i class="fas fa-coffee"></i> Coffee</button>
            <button class="category-button" onclick="showCategory('sandal')"><i class="fas fa-shoe-prints"></i>
                Sandal</button>
            <button class="category-button" onclick="showCategory('playmat')"><i class="fa-solid fa-rug"></i>
                Playmat</button>
            <button class="category-button" onclick="showCategory('toko')"><i class="fa-solid fa-toolbox"></i> Toko</button>

        </div>



        <div id="led" class="page-content">
            <h2>Faq LED Fishing Light</h2>
            <p>Beberapa Informasi tentang produk LED Fishing Light Kami dibawah.</p>

            <section class="faq" id="faq">
                <div class="faq-title">
                    {{-- <h1>FAQ LED Fishing Light</h1> --}}
                    <div class="card-faq">
                        <h2>Apa itu Lampu LED Fishing Light?</h2>
                        <p>
                            Lampu ini digunakan untuk menerangi perairan, memudahkan navigasi,
                            dan membantu menarik ikan saat memancing.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Bagaimana cara menggunakan Lampu LED Fishing Light?</h2>
                        <p>
                            Pasang lampu LED Fishing Light di sisi kapal menggunakan pengikat
                            atau bracket yang tersedia. Pastikan lampu dipasang dengan kokoh
                            agar tidak mudah lepas saat kapal bergerak.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Berapa lama daya tahan baterainya?</h2>
                        <p>
                            Rata-rata lampu LED Fishing Light dapat bertahan selama 6-8 jam
                            tergantung pada jenis dan kekuatan baterai yang digunakan.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah lampu ini tahan air?</h2>
                        <p>
                            Ya, lampu LED Fishing Light dirancang tahan air dan karat untuk
                            aktifitas sekitar perairan .
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <div id="coffee" class="page-content">
            <h2>Faq Coffee Luwak</h2>
            <p>Beberapa informasi tentang Coffee Luwak Authentic Kami dibawah.</p>

            <section class="faq" id="faq">
                <div class="faq-title">
                    {{-- <h1>FAQ LED Fishing Light</h1> --}}
                    <div class="card-faq">
                        <h2>Apa itu kopi luwak?</h2>
                        <p>
                            Kopi luwak adalah kopi yang dihasilkan dari biji kopi yang telah dimakan dan dicerna sebagian
                            oleh luwak (sejenis musang). Proses fermentasi alami dalam saluran pencernaan luwak memberikan
                            cita rasa unik pada kopi ini.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Mengapa kopi luwak istimewa?</h2>
                        <p>
                            Kopi luwak dianggap istimewa karena Proses fermentasi alami dalam tubuh luwak menciptakan rasa
                            yang lebih lembut, dengan tingkat keasaman rendah. juga
                            Kopi ini sering dianggap sebagai salah satu kopi termahal di dunia karena produksinya yang
                            terbatas dan unik.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Bagaimana cara memproduksi kopi luwak?</h2>
                        <p>
                            Luwak memakan buah kopi yang matang.
                            Biji kopi yang tidak tercerna dikeluarkan bersama kotoran luwak.
                            Biji kopi dikumpulkan, dicuci bersih, kemudian dikeringkan, disangrai, dan digiling menjadi
                            bubuk kopi.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah kopi luwak aman untuk dikonsumsi?</h2>
                        <p>
                            Ya, kopi luwak aman dikonsumsi karena melalui proses pembersihan menyeluruh dan pemanasan saat
                            pengolahan. Proses ini membunuh bakteri yang mungkin ada.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Berapa harga kopi luwak?</h2>
                        <p>
                            Harga kopi luwak bervariasi tergantung kualitas dan asalnya. Kopi luwak asli bisa dihargai mulai
                            dari ratusan ribu hingga jutaan rupiah per kilogram.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah kopi luwak ramah lingkungan?</h2>
                        <p>
                            Ada dua jenis produksi kopi luwak:
                            1. Alami: Luwak liar mencari buah kopi sendiri di alam.
                            2. Ternak: Luwak dipelihara dalam kandang dan diberi makan buah kopi.
                            Produksi yang melibatkan luwak liar lebih ramah lingkungan, tetapi yang berbasis ternak sering
                            menuai kritik karena melibatkan praktik tidak etis terhadap hewan.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apa rasa khas dari kopi luwak?</h2>
                        <p>
                            Rasa kopi luwak cenderung lebih lembut, dengan aroma khas, rasa cokelat atau karamel, dan
                            sedikit asam. Cita rasa ini bervariasi tergantung pada jenis kopi yang dikonsumsi oleh luwak.
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <div id="sandal" class="page-content">
            <h2>Faq Sandal</h2>
            <p>Beberapa informasi tentang produk sandal kami dibawah.</p>

            <section class="faq" id="faq">
                <div class="faq-title">
                    {{-- <h1>FAQ LED Fishing Light</h1> --}}
                    <div class="card-faq">
                        <h2>Apakah sandal ini terbuat dari bahan yang tahan lama?</h2>
                        <p>
                            Ya, sandal kami dibuat dari bahan berkualitas tinggi yang tahan lama dan nyaman digunakan untuk
                            berbagai aktivitas.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah tersedia ukuran untuk semua usia?</h2>
                        <p>
                            Kami menyediakan berbagai ukuran untuk anak-anak, remaja, dan dewasa. Silakan cek tabel ukuran
                            di halaman produk kami.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah sandal ini anti-slip?</h2>
                        <p>
                            Ya, desain alas sandal kami menggunakan material khusus untuk mencegah tergelincir.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Bagaimana cara memesan sandal?</h2>
                        <p>
                            Anda dapat memesan langsung melalui website kami atau menghubungi admin melalui
                            WhatsApp/Marketplace yang tersedia.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2> Apakah saya bisa memesan sandal custom?</h2>
                        <p>
                            Kami menyediakan layanan custom untuk beberapa model. Hubungi kami untuk informasi lebih lanjut.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah ada minimal pembelian?</h2>
                        <p>
                            Tidak ada minimal pembelian untuk pembelian ritel. Namun, untuk grosir, minimal pembelian adalah
                            10 pasang.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Berapa lama waktu pengiriman?</h2>
                        <p>
                            Waktu pengiriman tergantung lokasi Anda. Biasanya, untuk area dalam kota, pengiriman memakan
                            waktu 1-3 hari kerja.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah ada garansi untuk produk?</h2>
                        <p>
                            Ya, kami memberikan garansi 7 hari untuk produk cacat produksi.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Bagaimana jika ukuran sandal tidak sesuai?</h2>
                        <p>
                            Anda dapat mengajukan penukaran dalam waktu 3 hari setelah produk diterima, dengan syarat sandal
                            belum digunakan.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah ada diskon untuk pembelian dalam jumlah banyak?</h2>
                        <p>
                            Ya, kami menawarkan harga khusus untuk pembelian grosir. Silakan hubungi tim kami untuk
                            mendapatkan penawaran terbaik.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah ada promo saat ini?</h2>
                        <p>
                            Promo berlaku untuk pembelian melalui website kami. Informasi lebih lengkap bisa Anda cek di
                            halaman promo kami.
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <div id="playmat" class="page-content">
            <h2>Faq Playmat</h2>
            <p>Beberapa informasi tentang Flaymat Kami dibawah.</p>

            <section class="faq" id="faq">
                <div class="faq-title">
                    {{-- <h1>FAQ LED Fishing Light</h1> --}}
                    <div class="card-faq">
                        <h2> Apa itu playmat?</h2>
                        <p>
                            Playmat adalah alas atau karpet empuk yang digunakan untuk anak-anak bermain. Biasanya terbuat
                            dari bahan lembut seperti busa atau karet, yang memberikan perlindungan saat anak-anak bermain
                            di lantai.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apa manfaat menggunakan playmat?</h2>
                        <p>
                            Playmat memberikan permukaan yang aman dan nyaman untuk anak-anak yang sedang bermain,
                            merangkak, atau belajar berjalan. Playmat juga membantu mencegah cedera akibat terjatuh.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Bagaimana cara memilih playmat yang baik untuk anak?</h2>
                        <p>
                            Pilih playmat yang terbuat dari bahan bebas BPA, tidak beracun, dan mudah dibersihkan. Pastikan
                            ukuran playmat cukup besar untuk memberi ruang bermain yang nyaman dan pastikan memiliki
                            permukaan yang anti-slip agar tidak mudah tergelincir.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah playmat mudah dibersihkan?</h2>
                        <p>
                            Ya, sebagian besar playmat dirancang untuk mudah dibersihkan. Cukup lap permukaannya dengan kain
                            lembab atau sabun ringan untuk menghilangkan kotoran atau noda.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah playmat aman untuk anak yang baru lahir?</h2>
                        <p>
                            Playmat yang terbuat dari bahan non-toxic dan bebas dari bahan kimia berbahaya seperti BPA
                            sangat aman untuk bayi baru lahir. Pastikan bahwa playmat memiliki ketebalan yang cukup untuk
                            melindungi bayi yang sedang merangkak.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah playmat dapat digunakan di luar ruangan?</h2>
                        <p>
                            Beberapa playmat dirancang untuk penggunaan di luar ruangan, sementara yang lain lebih cocok
                            digunakan di dalam ruangan. Pastikan untuk memeriksa label produk untuk mengetahui kegunaan yang
                            tepat.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah playmat bisa digunakan untuk orang dewasa?</h2>
                        <p>
                            Beberapa jenis playmat cukup besar dan empuk untuk digunakan oleh orang dewasa, terutama untuk
                            aktivitas yoga, meditasi, atau latihan ringan. Namun, playmat anak-anak biasanya lebih kecil dan
                            khusus dirancang untuk kebutuhan bayi dan balita.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Bagaimana cara merawat playmat agar tahan lama?</h2>
                        <p>
                            Untuk merawat playmat, hindari paparan sinar matahari langsung dalam waktu lama, bersihkan
                            secara rutin dengan kain lembab, dan pastikan playmat disimpan di tempat yang kering untuk
                            mencegah kerusakan.
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <div id="toko" class="page-content">
            <h2>Faq Toko</h2>
            <p>Beberapa informasi tentang Toko Kami dibawah.</p>

            <section class="faq" id="faq">
                <div class="faq-title">
                    {{-- <h1>FAQ LED Fishing Light</h1> --}}
                    <div class="card-faq">
                        <h2> Apa jam operasional toko Anda?</h2>
                        <p>
                            Toko kami buka setiap hari dari pukul 08.00 hingga 17.00 WIB.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah Anda menyediakan layanan pengiriman?</h2>
                        <p>
                            Ya, kami menyediakan layanan pengiriman untuk seluruh wilayah Kab. Tangerang Biaya pengiriman
                            dihitung
                            berdasarkan jarak dan berat paket.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Metode pembayaran apa saja yang diterima?</h2>
                        <p>
                            Kami menerima pembayaran tunai, kartu kredit/debit, dan pembayaran digital seperti OVO, GoPay,
                            dan Dana.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah produk yang saya beli bisa dikembalikan atau ditukar?</h2>
                        <p>
                            Ya, kami menerima pengembalian dan penukaran produk dalam waktu 7 hari setelah pembelian dengan
                            syarat produk masih dalam kondisi baik dan disertai dengan struk pembelian dan video unboxing.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Bagaimana cara melacak pesanan saya??</h2>
                        <p>
                            Anda dapat melacak pesanan Anda melalui nomor resi yang dikirimkan ke email atau SMS setelah
                            pengiriman dilakukan. Masukkan nomor resi tersebut di situs web ekspedisi terkait untuk melihat
                            status
                            pengiriman.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah ada diskon khusus untuk pelanggan baru?</h2>
                        <p>
                            Ya, kami menawarkan diskon 50% untuk pembelian pertama pelanggan baru. Gunakan kode promo
                            "CAHAYA01" saat checkout di Online Shop.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah Anda memiliki toko cabang di tempat lain?</h2>
                        <p>
                            Saat ini, kami hanya memiliki satu toko fisik di Tangerang, tetapi Anda dapat berbelanja secara
                            online melalui situs web kami.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Apakah produk yang dijual asli dan berkualitas?</h2>
                        <p>
                            Ya, kami hanya menjual produk asli dan berkualitas tinggi. Setiap produk telah melalui proses
                            pengecekan kualitas sebelum dijual.
                        </p>
                    </div>
                    <div class="card-faq">
                        <h2>Bagaimana cara menghubungi layanan pelanggan?</h2>
                        <p>
                            Anda dapat menghubungi layanan pelanggan kami melalui telepon di (+62) 856-9300-0255 atau email di
                            admin@cahayasetia.com <admin@cahayasetia.com>. Tim kami siap membantu Anda setiap hari dari pukul 08.00 hingga 17.00 WIB.
                        </p>
                    </div>
                </div>
            </section>
        </div>


    </div>

    <div id="scrollTopButton" class="scroll-to-top" onclick="scrollToTop()">
        ↑
    </div>

    <script src="js/faq.js"></script>
@endsection
