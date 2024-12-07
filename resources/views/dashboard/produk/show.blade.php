@extends('dashboard.layouts.main')
@section('container')
<div class="detail-product-card" data-name="LED Fishing Light 1">
    {{-- <div class="">
        @if ($produk->gambar1)
        <div class="img-detail">
            <img src="{{ asset('storage/' . $produk->gambar1) }}" alt="Img-Produk">
        </div>
    @else
        <div class="img-detail">
            <img src="{{ asset('img/noimg.png' ) }}" alt="Img-Produk">
        </div>
    @endif --}}
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
                <img src="{{ asset('storage/' . $produk->gambar1) }}" alt="img-produk" class="img-fluid thumbnail" data-src="{{ asset('storage/' . $produk->gambar1) }}">
                {{-- Thumbnail Gambar Tambahan --}}
                @if (!empty($produk->gambar2))
                    <img src="{{ asset('storage/' . $produk->gambar2) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $produk->gambar2) }}">
                @endif
                @if (!empty($produk->gambar3))
                    <img src="{{ asset('storage/' . $produk->gambar3) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $produk->gambar3) }}">
                @endif
                @if (!empty($produk->gambar4))
                    <img src="{{ asset('storage/' . $produk->gambar4) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $produk->gambar4) }}">
                @endif
                @if (!empty($produk->gambar5))
                    <img src="{{ asset('storage/' . $produk->gambar5) }}" alt="img-thumbnail" class="thumbnail" data-src="{{ asset('storage/' . $produk->gambar5) }}">
                @endif
            </div>
        </div>
    </div>


        <div class="detail-info">
            <div class="edit-produk">
                <a href="/dashboard/produk/{{ $produk->slug }}/edit" class="badge bg-warning text-decoration-none my-3"><i class="bi bi-pencil-square"></i> Edit Produk</a>
                <form action="/dashboard/produk/{{ $produk->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus Produk?')"><span><i class="bi bi-trash"></i></span>Hapus Produk</button>
                </form>
            </div>
            <h2><a href="/produk/{{ $produk->slug }}" class="text-decoration-none">{{ $produk->nama_produk }}</a></h2>
            <p><b>Kategori</b> : <a href="/kategori/{{ $produk->kategori->slug }}" class="text-decoration-none text-capitalize">{{ $produk->kategori->nama }}</a></p>
            <p><b>Deskripsi</b> : {!! $produk->deskripsi !!}</p>
            <p><b>Stok</b> : {{ $produk->stok }}</p>
            <p><b>Berat</b> : {{ $produk->berat }}Kg</p>
            <p><b>Diskon</b> : {{ $produk->diskon }}%</p>
            <h4><b>Harga</b> :Rp {{ $produk->harga }}</h4>
            <div class="button d-flex">
                <div class="me-auto"></div>
                <a href="/dashboard/produk" class="kembali-button">Kembali</a>
            </div>

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
