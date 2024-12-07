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
            </div>
        </div>
    </div>



    <div class="produk-info-detail">
        <h3>{{ $post->nama_produk }}
        </h3>
        <h2><b>Rp {{ number_format($post->harga, 0, ',', '.') }}</b></h2>
        <div class="diskon-coret">
            <div class="diskon">-{{ $post->diskon }}%</div>
            <div class="harga-coret">Rp {{ number_format($post->harga / (1 - ($post->diskon / 100)), 0, ',', '.') }}</div>
        </div>
        <hr>
        <h3>Detail Produk</h3>
        <hr>
        <p>Kondisi: <span class="badge text-bg-success text-white">Baru</span> </p>
        <p>Min. Pemesanan: 1</p>
        <p>Kategori: <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none fw-bold badge text-bg-primary text-white">{{ $post->kategori->nama }}</a></p>
        <p>{!! $post->deskripsi !!}</p>

        <a href="/produk" class="d-inline-block btn btn-primary float-end">Kembali</a>
    </div>

    <div class="form-beli">
        <h5><b>Detail Harga</b></h5>
        <div class="img-produk">
            <img src="{{ asset('storage/' . $post->gambar1) }}" alt="img-form">
            <p>variasi</p>
        </div>
        <p><b>Stok: 12</b></p>
        <p class="coret-form-harga">Rp {{ number_format($post->harga / (1 - ($post->diskon / 100)), 0, ',', '.') }}</p>
        <div class="harga-asli">
            <h5>Subtotal</h5>
            <h4><b>Rp {{ number_format($post->harga, 0, ',', '.') }}</b></h4>
        </div>
        <div class="form-wa">
            {{-- <a
                href="https://wa.me/6289529907437?text={{ urlencode('Halo, saya tertarik dengan produk ini: ' . url('/produk/' . $post->slug) . '\n\nTerima kasih.') }}"
                target="_blank">
                Beli Sekarang
            </a> --}}
            <a
                href="#" onclick="alert('Dalam Pengembangan')">
                Beli Sekarang
            </a>
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


@endsection
