@extends('dashboard.layouts.main')

@section('container')
<div class="detail-product-card" data-name="{{ $produk->nama_produk }}">
    <div class="detail-card">
        <div class="gambar-produk">
            {{-- Area Gambar Utama --}}
            <img id="preview-image" src="{{ asset('storage/' . $produk->gambar1) }}" alt="img-produk" class="img-fluid">

            {{-- Thumbnail Gambar --}}
            <div class="gambar-produk-detail">
                {{-- Thumbnail Video (jika ada) --}}
                @if (!empty($produk->video))
                    <div class="video-place d-inline">
                        <img src="{{ asset('storage/' . $produk->gambar1) }}" alt="img-thumbnail" class="thumbnail video-img" data-src="{{ asset('storage/' . $produk->video) }}">
                        <i class="fa-solid fa-play"></i>
                    </div>
                @endif
                <img src="{{ asset('storage/' . $produk->gambar1) }}" alt="img-thumbnail" class="img-fluid thumbnail" data-src="{{ asset('storage/' . $produk->gambar1) }}">

                {{-- Thumbnail Gambar Tambahan --}}
                @foreach (['gambar2', 'gambar3', 'gambar4', 'gambar5'] as $gambar)
                    @if (!empty($produk->$gambar))
                        <img src="{{ asset('storage/' . $produk->$gambar) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $produk->$gambar) }}">
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="detail-info">
        {{-- Tombol Edit dan Hapus --}}
        <div class="edit-produk">
            <a href="/dashboard/produk/{{ $produk->slug }}/edit" class="badge bg-warning text-decoration-none my-3"><i class="bi bi-pencil-square"></i> Edit Produk</a>
            <form action="/dashboard/produk/{{ $produk->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Produk?')"><span><i class="bi bi-trash"></i></span>Hapus Produk</button>
            </form>
        </div>

        {{-- Informasi Produk --}}
        <h2><a href="/produk/{{ $produk->slug }}" class="text-decoration-none">{{ $produk->nama_produk }}</a></h2>
        <h4><b>Rp {{ number_format($produk->harga, 0, ',', '.') }}</b></h4>
        {{-- Variasi Produk --}}
        <div>
            <p class="title-variasi mt-3">Warna/Variasi:</p>
            <div class="detail-variasi d-flex flex-wrap">
                @foreach ($produk_variasi->unique('warna_id') as $variasi)
                    <div class="card-variasi me-2 w-20 d-flex  justify-content-evenly" data-warna="{{ $variasi->warna->warna ?? 'Tidak ada' }}" data-id="{{ $variasi->id }}" data-gambar="{{ asset('storage/' . ($variasi->gambar->gambar ?? $produk->gambar1)) }}">
                        <img src="{{ asset('storage/' . ($variasi->gambar->gambar ?? $produk->gambar1)) }}" alt="img" width="30px" class="me-2">
                        <p>{{ $variasi->warna->warna ?? 'Tidak ada' }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Ukuran Produk --}}
            @php
                $ukuranVariasi = $produk_variasi->unique('ukuran_id');
            @endphp
            @if ($ukuranVariasi->isNotEmpty())
                <p class="title-variasi mt-3">Ukuran:</p>
                <div class="detail-variasi d-flex flex-wrap">
                    @foreach ($ukuranVariasi as $variasi)
                        <div class="card-variasi m-2" data-ukuran="{{ $variasi->ukuran->ukuran ?? 'Tidak ada' }}">
                            <p>{{ $variasi->ukuran->ukuran ?? 'Tidak ada' }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Stok --}}
            <p class="mt-2"><b>Stok:</b> <span id="stok-tersedia">{{ $produk->stok }}</span></p>
        </div>
        <p><b>Kondisi</b>: Baru </p>
        <p><b>Min. Pemesanan:</b> 1</p>
        <p><b>Kode Produk:</b> {{ $produk->kode_produk ?? 'Tidak tersedia' }}</p>
        <p><b>Dimensi Produk:</b> {{ $produk->dimensi ?? 'Tidak tersedia' }}</p>
        <p><b>Kategori</b> : <a href="/kategori/{{ $produk->kategori->slug }}" class="badge bg-primary text-decoration-none">{{ $produk->kategori->nama }}</a></p>
        <p><b>Berat</b> : {{ $produk->berat }}(gram)</p>
        <p><b>Status Produk:</b>
            <span class="badge
                @if($produk->status == 'pre-order')
                    bg-warning
                @elseif($produk->status == 'habis')
                    bg-danger
                @else
                    text-bg-success
                @endif
                text-white">
                {{ ucwords($produk->status) }}
            </span>
        </p>
        <p><b>Diskon</b> : {{ $produk->diskon }}%</p>
        <p><b>Deskripsi</b> : {!! $produk->deskripsi !!}</p>

        {{-- Tombol Kembali --}}
        <div class="button d-flex">
            <div class="me-auto"></div> <!-- Tambahkan ini untuk memberikan ruang kosong di sebelah kiri -->
            <a href="/dashboard/produk" class="kembali-button">Kembali</a>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const previewImage = document.getElementById("preview-image");
        const thumbnails = document.querySelectorAll(".thumbnail");
        const warnaVariasi = document.querySelectorAll(".card-variasi[data-warna]");
        const ukuranVariasi = document.querySelectorAll(".card-variasi[data-ukuran]");
        const stokTersedia = document.getElementById("stok-tersedia");
        const produkVariasi = @json($produk_variasi);

        let selectedWarna = null;
        let selectedUkuran = null;

        // Thumbnail Gambar
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener("click", function () {
                const newSrc = thumbnail.getAttribute("data-src");
                previewImage.setAttribute("src", newSrc);
            });
        });

        // Variasi Warna
        warnaVariasi.forEach(warna => {
            warna.addEventListener("click", function () {
                warnaVariasi.forEach(w => w.classList.remove("selected"));
                this.classList.add("selected");
                selectedWarna = this.getAttribute("data-warna");
                const newImage = this.getAttribute("data-gambar");
                if (newImage) {
                    previewImage.setAttribute("src", newImage);
                }
                updateStok();
            });
        });

        // Variasi Ukuran
        ukuranVariasi.forEach(ukuran => {
            ukuran.addEventListener("click", function () {
                ukuranVariasi.forEach(u => u.classList.remove("selected"));
                this.classList.add("selected");
                selectedUkuran = this.getAttribute("data-ukuran");
                updateStok();
            });
        });

        // Update Stok Berdasarkan Pilihan
        function updateStok() {
            const variasiTerpilih = produkVariasi.find(variasi => {
                return (
                    (!selectedWarna || variasi.warna?.warna === selectedWarna) &&
                    (!selectedUkuran || variasi.ukuran?.ukuran === selectedUkuran)
                );
            });

            if (variasiTerpilih) {
                stokTersedia.textContent = variasiTerpilih.stok;
            } else {
                stokTersedia.textContent = "Tidak tersedia";
            }
        }
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
