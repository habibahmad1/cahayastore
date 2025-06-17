@extends('layouts.main')
@section('container')
{{-- <div class="detail-product-card" data-name="LED Fishing Light 1">
    <div class="detail-card">
        <div class="img-detail">
            <img src="{{ asset('img/' . $post->gambar1) }}" alt="LED Fishing Light">
        </div>
        <h2><a href="/produk/{{ $post->slug }}">{{ $post->nama_produk }}</a></h2>
        <p><b>Kategori</b> : <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none text-capitalize">{{ $post->kategori->nama }}</a></p>
        <p><b>Deskripsi</b> : {{ $post->deskripsi }}</p>
        <p><b>Stok</b> : {{ $post->stok }}</p>
        <p><b>Berat</b> : {{ $post->berat }}Kg</p>
        <p><b>Diskon</b> : {{ $post->diskon }}%</p>
        <h4><b>Harga</b> :Rp {{ $post->harga }}</h4>
        <a href="/produk/{{ $post->slug }}" class="text-decoration-none">
            <button class="details-button mt-4">Beli Sekarang</button>
            <a href="/produk" class="kembali-button">Kembali</a>
      </a>
    </div>
</div> --}}

<div class="container-detail-card">
    <div class="container-detail-card-gambar">
        <div class="gambar-produk">
            {{-- Area Gambar Utama --}}
            <img id="preview-image" src="{{ asset('storage/' . $post->gambar1) }}" alt="img-produk" class="img-fluid">

            {{-- Thumbnail Gambar --}}
            <div class="gambar-produk-detail">
                {{-- Thumbnail Video (jika ada) --}}
                @if (!empty($post->video))
                    <div class="video-place d-inline">
                        <img src="{{ asset('storage/' . $post->gambar1) }}" alt="img-thumbnail" class="thumbnail video-img" data-src="{{ asset('storage/' . $post->video) }}">
                        <i class="fa-solid fa-play"></i>
                    </div>
                @endif
                <img src="{{ asset('storage/' . $post->gambar1) }}" alt="img-produk" class="img-fluid thumbnail" data-src="{{ asset('storage/' . $post->gambar1) }}">
                {{-- Thumbnail Gambar Tambahan --}}
                @if (!empty($post->gambar2))
                    <img src="{{ asset('storage/' . $post->gambar2) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $post->gambar2) }}">
                @endif
                @if (!empty($post->gambar3))
                    <img src="{{ asset('storage/' . $post->gambar3) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $post->gambar3) }}">
                @endif
                @if (!empty($post->gambar4))
                    <img src="{{ asset('storage/' . $post->gambar4) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $post->gambar4) }}">
                @endif
                @if (!empty($post->gambar5))
                    <img src="{{ asset('storage/' . $post->gambar5) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $post->gambar5) }}">
                @endif
                @if (!empty($post->variasi->gambar))


                @endif
            </div>
        </div>
    </div>



    <div class="produk-info-detail">

@php
    // Ambil semua harga variasi yang valid (> 0), dan unik
    $hargaVariasi = $produk_variasi->pluck('harga')->filter(fn($h) => $h > 0)->unique()->sort();

    // Apakah harga variasi berbeda dari harga produk?
    $gunakanHargaVariasi = $hargaVariasi->count() > 1 || ($hargaVariasi->count() === 1 && $hargaVariasi->first() != $post->harga);

    // Siapkan harga yang akan ditampilkan
    $hargaTerkecil = $gunakanHargaVariasi ? $hargaVariasi->min() : $post->harga;
    $hargaTerbesar = $gunakanHargaVariasi ? $hargaVariasi->max() : $post->harga;

    // Hitung harga coret dari harga terkecil (sebelum diskon)
    $hargaCoret = $hargaTerkecil / (1 - ($post->diskon / 100));
@endphp



        <h3 class="judul-detail">{{ $post->nama_produk }}
        </h3>
        <h2 id="harga-utama">
    <b>
        @if ($gunakanHargaVariasi && $hargaTerkecil !== $hargaTerbesar)
            Rp {{ number_format($hargaTerkecil, 0, ',', '.') }} - Rp {{ number_format($hargaTerbesar, 0, ',', '.') }}
        @else
            Rp {{ number_format($hargaTerkecil, 0, ',', '.') }}
        @endif
    </b>
</h2>

<div class="diskon-coret">
    <div class="diskon">Diskon -{{ $post->diskon }}%</div>
    <div class="harga-coret" id="harga-coret">
        Rp {{ number_format($hargaCoret, 0, ',', '.') }}
    </div>
</div>


        @if ($produk_variasi->isNotEmpty())
    <p class="title-variasi mt-3">Warna/Variasi:</p>
    <div class="detail-variasi">
        @php
            $checkedWarna = []; // Array untuk menyimpan warna yang sudah ditampilkan
        @endphp
        @foreach ($produk_variasi as $variasi)
            @php
                $warna = $variasi->warna->warna ?? 'Tidak ada';
            @endphp
            @if (!in_array($warna, $checkedWarna))
                <div class="card-variasi"
                    data-warna="{{ $warna }}"
                    data-gambar="{{ asset('storage/' . ($variasi->gambar->gambar ?? 'default-image.jpg')) }}">
                    <img src="{{ asset('storage/' . ($variasi->gambar->gambar ?? $post->gambar1)) }}" alt="img" width="30px">
                    <p style="margin-left: 10px">{{ $warna }}</p>
                </div>
                @php
                    $checkedWarna[] = $warna; // Tambahkan warna ke array
                @endphp
            @endif
        @endforeach
    </div>
@endif

@php
// Cek apakah ada ukuran yang tersedia dalam variasi produk
$hasUkuran = false;
foreach ($produk_variasi as $variasi) {
    if (!empty($variasi->ukuran->ukuran)) {
        $hasUkuran = true;
        break;
    }
}
@endphp


        @php
        // Cek apakah ada ukuran yang tersedia dalam variasi produk
        $hasUkuran = false;
        foreach ($produk_variasi as $variasi) {
            if (!empty($variasi->ukuran->ukuran)) {
                $hasUkuran = true;
                break;
            }
        }
    @endphp

    @if ($hasUkuran)
        <p class="title-variasi mt-3">
            Ukuran:
        </p>

        <div class="detail-variasi">
            @php
                $checkedUkuran = []; // Array untuk menyimpan ukuran yang sudah ditampilkan
            @endphp

            @foreach ($produk_variasi as $variasi)
                @if (!in_array($variasi->ukuran->ukuran ?? 'Tidak ada', $checkedUkuran))
                    <div class="card-variasi" data-ukuran="{{ $variasi->ukuran->ukuran ?? 'Tidak ada' }}">
                        <p>{{ $variasi->ukuran->ukuran ?? 'Tidak ada' }}</p>
                    </div>
                    @php
                        $checkedUkuran[] = $variasi->ukuran->ukuran ?? 'Tidak ada'; // Tambahkan ukuran ke array
                    @endphp
                @endif
            @endforeach
        </div>
    @endif

        <!-- Share Button -->
        <div class="share-button-container my-3">
            <button id="share-button" class="badge btn text-white" style="background-color: #ff9553"><i class="fa-solid fa-share"></i> Bagikan</button>
        </div>

        <!-- Share Menu -->
        <div id="share-menu" style="display:none;">
            <a id="whatsapp-share" href="#" target="_blank" class="badge bg-success text-decoration-none"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
            <button id="copy-url" class="badge bg-secondary border-0"><i class="fa-regular fa-clipboard"></i> Copy URL</button>
        </div>

        <hr>
        <h3>Detail Produk</h3>
        <hr>
        <p><b>Kondisi</b>: Baru </p>
        <p><b>Min. Pemesanan:</b> 1</p>
        <p>
            @if ( $post->kode_produk )
                <b>Kode Produk:</b> {{ $post->kode_produk }}
            @else

            @endif
        </p>
        <p>
            @if ( $post->dimensi )
                <b>Dimensi Produk:</b> {{ $post->dimensi }}
            @else

            @endif
        </p>
        <p><b>Berat</b>: {{ $post->berat }}(gram)</p>
        <p><b>Status Produk:</b>
            <span class="badge
                @if($post->status == 'pre-order')
                    bg-warning
                @elseif($post->status == 'habis')
                    bg-danger
                @else
                    text-bg-success
                @endif
                text-white">
                {{ ucwords($post->status) }}
            </span>
        </p>
        <p><b>Kategori</b>: <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none fw-bold badge text-bg-primary text-white">{{ $post->kategori->nama }}</a></p>
        <p><b>Deskripsi</b>: <br>{!! $post->deskripsi !!}</p>

        <a href="/produk" class="d-inline-block btn btn-primary float-end">Kembali</a>
    </div>

        <div class="form-beli">
        <h5><b>Detail Harga</b></h5>
        <div class="img-produk">
            <img id="img-form" src="{{ asset('storage/' . $post->gambar1) }}" alt="img-form">
            <p>Variasi</p>
        </div>
        <p><b>Stok: {{ $post->total_stok }}</b></p>
        <p class="coret-form-harga">Rp {{ number_format($post->harga / (1 - ($post->diskon / 100)), 0, ',', '.') }}</p>
        <div class="harga-asli">
            <h5>Subtotal</h5>
               <h4 id="subtotal"><b>Rp {{ number_format($hargaTerkecil, 0, ',', '.') }}</b></h4>
        </div>
        <div class="form-wa">
            <a
                href="https://wa.me/628119910388?text={{ urlencode('Halo, saya tertarik dengan produk ini: ' . url('/produk/' . $post->slug) . ' Terima kasih.') }}"
                target="_blank">
                Beli Sekarang
            </a>
            {{-- <a
                href="buy-now-link" onclick="alert('Dalam Pengembangan')">
                Beli Sekarang
            </a> --}}
        </div>
    </div>
</div>

<div class="box-beli">
    <div class="nempel-beli">
        <div class="stok" id="stok-nempel-beli"><i class="fa-solid fa-box"></i> Stok 20</div>
        <a href="https://wa.me/628119910388?text={{ urlencode('Halo, saya tertarik dengan produk ini: ' . url('/produk/' . $post->slug) . ' Terima kasih.') }}" target="_blank" class="beli-sekarang-hp text-decoration-none">
            <i class="fa-solid fa-cart-shopping"></i> Beli Sekarang
        </a>    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil elemen thumbnail
        const thumbnails = document.querySelectorAll(".thumbnail");
        const previewImage = document.getElementById("preview-image");

        // Tambahkan event click ke setiap thumbnail
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener("click", function () {
                // Perbarui src gambar utama dengan data-src dari thumbnail yang diklik
                const newSrc = thumbnail.getAttribute("data-src");
                previewImage.setAttribute("src", newSrc);
            });
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const warnaVariasi = document.querySelectorAll(".detail-variasi .card-variasi[data-warna]");
    const previewImage = document.getElementById("preview-image");
    const imgForm = document.getElementById("img-form"); // Gambar di Detail Harga
    const ukuranVariasi = document.querySelectorAll(".detail-variasi .card-variasi[data-ukuran]");
    const stokElement = document.querySelector(".form-beli p b"); // Elemen stok di form beli
    const stokNempelBeliElement = document.getElementById("stok-nempel-beli"); // Elemen stok di bagian bawah
    const produkVariasi = @json($produk_variasi); // Kirim data PHP ke JavaScript


    let selectedWarna = null;  // Inisialisasi selectedWarna
    let selectedUkuran = null; // Inisialisasi selectedUkuran

    // Tampilkan stok awal produk
    const stokAwal = {{ $post->total_stok }}; // Stok awal produk tanpa variasi
    updateStokDisplay(stokAwal);

    // Event klik untuk warna
    warnaVariasi.forEach(warna => {
    warna.addEventListener("click", function () {
        // Tandai warna terpilih
        warnaVariasi.forEach(w => w.classList.remove("selected"));
        this.classList.add("selected");

        // Ambil gambar terkait variasi
        const newImage = this.getAttribute("data-gambar");

        // Perbarui gambar utama
        previewImage.setAttribute("src", newImage);

        // Perbarui gambar di Detail Harga
        imgForm.setAttribute("src", newImage);  // Mengubah gambar Detail Harga

        // Simpan warna yang dipilih
        selectedWarna = this.getAttribute("data-warna");

        // Perbarui ukuran yang tersedia setelah warna dipilih
        updateUkuranAvailability();

        // Perbarui stok
        updateStok();
    });
});


    // Event klik untuk ukuran
    ukuranVariasi.forEach(ukuran => {
        ukuran.addEventListener("click", function () {

            // Tandai ukuran terpilih
            ukuranVariasi.forEach(u => u.classList.remove("selected"));
            this.classList.add("selected");

            // Ambil gambar terkait variasi ukuran
            const newImage = this.getAttribute("data-gambar");

            // Perbarui gambar di Detail Harga
            if (newImage) {
                imgForm.setAttribute("src", newImage);  // Mengubah gambar Detail Harga
            } else {
                // Jika tidak ada gambar, kembalikan ke gambar utama atau gambar default
                imgForm.setAttribute("src", "{{ asset('storage/' . $post->gambar1) }}");
            }

            // Simpan ukuran yang dipilih
            selectedUkuran = this.getAttribute("data-ukuran");

            updateWarnaAvailability();


            // Perbarui stok
            updateStok();
        });
    });

    // Fungsi untuk memperbarui stok berdasarkan warna atau ukuran yang dipilih
    function updateStok() {
    let selectedVariasi = null;

    // Logika pencocokan variasi
    if (selectedWarna && !selectedUkuran) {
        selectedVariasi = produkVariasi.find(variasi =>
            variasi.warna?.warna === selectedWarna
        );
    }

    if (!selectedWarna && selectedUkuran) {
        selectedVariasi = produkVariasi.find(variasi =>
            variasi.ukuran?.ukuran === selectedUkuran
        );
    }

    if (selectedWarna && selectedUkuran) {
        selectedVariasi = produkVariasi.find(variasi =>
            variasi.warna?.warna === selectedWarna &&
            variasi.ukuran?.ukuran === selectedUkuran
        );
    }

    // 🔍 Periksa jika variasi ditemukan dan stok-nya ada
    if (selectedVariasi && selectedVariasi.stok > 0) {
    updateStokDisplay(selectedVariasi.stok);
    updateSubtotal(selectedVariasi.harga);
    updateHargaUtama(selectedVariasi.harga); // ← Tambahkan ini
    } else if (selectedWarna || selectedUkuran) {
        // ❗ Jika variasi dipilih tapi tidak ditemukan atau stok habis
        showTidakTersedia();
        document.getElementById("harga-utama").innerHTML = `<b>Tidak tersedia</b>`;
        document.getElementById("harga-coret").innerHTML = '';
    } else {
        // Jika belum memilih variasi apapun, tampilkan stok awal dan harga awal
        updateStokDisplay(stokAwal);
        updateSubtotal(null);
    }
}

function formatRupiah(angka) {
    const parsed = parseInt(angka);
    if (isNaN(parsed)) return formatRupiah(hargaProduk); // fallback ke harga produk
    return parsed.toLocaleString('id-ID');
}


// Fungsi untuk menonaktifkan ukuran yang tidak tersedia
function updateUkuranAvailability() {
    ukuranVariasi.forEach(ukuran => {
        const ukuranVal = ukuran.getAttribute("data-ukuran");
        const isAvailable = produkVariasi.some(variasi =>
            (!selectedWarna || variasi.warna?.warna === selectedWarna) &&
            variasi.ukuran?.ukuran === ukuranVal &&
            variasi.stok > 0
        );
        ukuran.disabled = !isAvailable;
        ukuran.classList.toggle("disabled", !isAvailable); // Jika pakai CSS tambahan
    });
}

// Fungsi untuk menonaktifkan warna yang tidak tersedia
function updateWarnaAvailability() {
    warnaVariasi.forEach(warna => {
        const warnaVal = warna.getAttribute("data-warna");
        const isAvailable = produkVariasi.some(variasi =>
            (!selectedUkuran || variasi.ukuran?.ukuran === selectedUkuran) &&
            variasi.warna?.warna === warnaVal &&
            variasi.stok > 0
        );
        warna.disabled = !isAvailable;
        warna.classList.toggle("disabled", !isAvailable); // Jika pakai CSS tambahan
    });
}



function showTidakTersedia() {
    const stokIconHTML = `<i class="fas fa-box"></i>`;
    const stokText = `Stok: Tidak tersedia`;

    stokElement.innerHTML = `${stokIconHTML} ${stokText}`;
    stokNempelBeliElement.innerHTML = `${stokIconHTML} ${stokText}`;

    const subtotalEl = document.getElementById("subtotal");
    subtotalEl.innerHTML = `<b>Tidak tersedia</b>`;
}


const hargaProduk = {{ $post->harga }};

function updateSubtotal(hargaVariasi) {
    const subtotalElement = document.querySelector('.harga-asli h4 b');

    let harga = parseInt(hargaVariasi);
    if (isNaN(harga)) {
        harga = hargaProduk;
    }

    subtotalElement.innerText = `Rp ${formatRupiah(harga)}`;
}




    // Fungsi untuk memperbarui tampilan stok (dengan ikon stok)
    function updateStokDisplay(stok) {
    const stokIconHTML = `<i class="fas fa-box"></i>`;
    if (stok === null || stok <= 0) {
        const stokText = `Stok: <span style="color: red;">Tidak tersedia</span>`;
        stokElement.innerHTML = `${stokIconHTML} ${stokText}`;
        stokNempelBeliElement.innerHTML = `${stokIconHTML} ${stokText}`;
    } else {
        const stokText = `Stok: ${stok}`;
        stokElement.innerHTML = `${stokIconHTML} ${stokText}`;
        stokNempelBeliElement.innerHTML = `${stokIconHTML} ${stokText}`;
    }
}

function updateHargaUtama(hargaVariasi) {
    const hargaUtama = document.getElementById("harga-utama");
    const hargaCoret = document.getElementById("harga-coret");

    // Ambil diskon dari Blade (dari PHP) via JS
    const diskon = {{ $post->diskon }};


    // Harga coret = harga sebelum diskon
    const hargaDiskon = Math.round(hargaVariasi / (1 - (diskon / 100)));

    hargaUtama.innerHTML = `<b>${formatRupiah(hargaVariasi)}</b>`;
    hargaCoret.innerHTML = formatRupiah(hargaDiskon);
}


});


function updateSubtotal(harga) {
    const subtotalEl = document.getElementById("subtotal");
    subtotalEl.innerHTML = `<b>Rp ${parseInt(harga).toLocaleString("id-ID")}</b>`;
}


</script>

<script>
    document.getElementById("share-button").addEventListener("click", function() {
        const shareMenu = document.getElementById("share-menu");

        // Generate the URL using the product's slug
        const productUrl = window.location.origin + "/produk/" + "{{ $post->slug }}"; // Ensure slug is available

        // Construct the URL for sharing on WhatsApp
        const whatsappUrl = "https://wa.me/?text=" + encodeURIComponent("Check out this product: " + productUrl);

        // Set the href attribute for the WhatsApp share button
        document.getElementById("whatsapp-share").setAttribute("href", whatsappUrl);

        // Toggle the visibility of the share menu
        if (shareMenu.style.display === "none" || shareMenu.style.display === "") {
            // Show the share menu
            shareMenu.style.display = "block";
        } else {
            // Hide the share menu
            shareMenu.style.display = "none";
        }

        // Add functionality to copy URL to clipboard
        document.getElementById("copy-url").addEventListener("click", function() {
            // Create a temporary input element to copy the URL
            const tempInput = document.createElement("input");
            tempInput.value = productUrl;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            // Alert the user that the URL has been copied
            alert("Link berhasil disalin");
        });
    });
</script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Ambil semua elemen dengan class "video-place"
    const videoPlaces = document.querySelectorAll(".video-place");

    videoPlaces.forEach((videoPlace) => {
        videoPlace.addEventListener("click", () => {
            // Ambil URL video dari atribut data-src
            const videoSrc = videoPlace.querySelector(".video-img").getAttribute("data-src");

            // Buat elemen wrapper video
            const videoWrapper = document.createElement("div");
            videoWrapper.classList.add("video-wrapper");

            // Buat elemen video
            const videoElement = document.createElement("video");
            videoElement.src = videoSrc;
            videoElement.controls = true; // Tampilkan kontrol video
            videoElement.autoplay = true; // Langsung putar video

            // Tambahkan tombol "X"
            const closeButton = document.createElement("button");
            closeButton.classList.add("close-button");
            closeButton.innerHTML = "&times;"; // Karakter X

            // Tutup video saat tombol "X" diklik
            closeButton.addEventListener("click", () => {
                videoWrapper.remove();
            });

            // Masukkan video dan tombol ke dalam wrapper
            videoWrapper.appendChild(closeButton);
            videoWrapper.appendChild(videoElement);

            // Tambahkan wrapper ke elemen body
            document.body.appendChild(videoWrapper);
        });
    });
});


</script>



@endsection
