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
        <h3>{{ $post->nama_produk }}
        </h3>
        <h2><b>Rp {{ number_format($post->harga, 0, ',', '.') }}</b></h2>
        <div class="diskon-coret">
            <div class="diskon">Diskon -{{ $post->diskon }}%</div>
            <div class="harga-coret">Rp {{ number_format($post->harga / (1 - ($post->diskon / 100)), 0, ',', '.') }}</div>
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
            <img src="{{ asset('storage/' . $post->gambar1) }}" alt="img-form">
            <p>Variasi</p>
        </div>
        <p><b>Stok: {{ $post->stok }}</b></p>
        <p class="coret-form-harga">Rp {{ number_format($post->harga / (1 - ($post->diskon / 100)), 0, ',', '.') }}</p>
        <div class="harga-asli">
            <h5>Subtotal</h5>
            <h4><b>Rp {{ number_format($post->harga, 0, ',', '.') }}</b></h4>
        </div>
        <div class="form-wa">
            <a
                href="https://wa.me/6289529907437?text={{ urlencode('Halo, saya tertarik dengan produk ini: ' . url('/produk/' . $post->slug) . '\n\nTerima kasih.') }}"
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
    const ukuranVariasi = document.querySelectorAll(".detail-variasi .card-variasi[data-ukuran]");
    const stokElement = document.querySelector(".form-beli p b"); // Elemen stok di form beli
    const produkVariasi = @json($produk_variasi); // Kirim data PHP ke JavaScript

    let selectedWarna = null;  // Inisialisasi selectedWarna
    let selectedUkuran = null; // Inisialisasi selectedUkuran

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

            // Simpan warna yang dipilih
            selectedWarna = this.getAttribute("data-warna");

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

            // Simpan ukuran yang dipilih
            selectedUkuran = this.getAttribute("data-ukuran");

            // Perbarui stok
            updateStok();
        });
    });

    // Fungsi untuk memperbarui stok berdasarkan warna atau ukuran yang dipilih
    function updateStok() {
        let selectedVariasi = null;

        // Jika warna dipilih
        if (selectedWarna && !selectedUkuran) {
            selectedVariasi = produkVariasi.find(variasi =>
                (variasi.warna?.warna === selectedWarna)
            );
        }
        // Jika ukuran dipilih
        if (!selectedWarna && selectedUkuran) {
            selectedVariasi = produkVariasi.find(variasi =>
                (variasi.ukuran?.ukuran === selectedUkuran)
            );
        }
        // Jika warna dan ukuran keduanya dipilih
        if (selectedWarna && selectedUkuran) {
            selectedVariasi = produkVariasi.find(variasi =>
                (variasi.warna?.warna === selectedWarna) &&
                (variasi.ukuran?.ukuran === selectedUkuran)
            );
        }

        // Perbarui stok di form beli
        if (selectedVariasi) {
            stokElement.textContent = `Stok: ${selectedVariasi.stok}`;
        } else {
            stokElement.textContent = "Stok: Tidak tersedia"; // Jika variasi yang dipilih tidak ada
        }
    }
});
</script>




@endsection
