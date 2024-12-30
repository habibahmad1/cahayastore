@extends('layouts.main')

@section('container')


<h1 class="text-center mb-4" style="padding-top: 80px">{{ $title }}</h1>

<div class="row justify-content-center px-4">
    <div class="col-lg-8 pencarian">
        <form action="/produk">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Produk.." name="search" value="{{ request('search') }}" id="search-box">
                <button class="btn btn-warning" style="background-color: #fd8c45; color:#fff" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

{{-- <div class="kategori-list">
    @foreach ($kategori as $k)
    <a href="/kategori/{{ $k->slug }}" data-aos="fade-up"
        data-aos-duration="3000" class="text-capitalize">{{ $k->nama }}</a>
    @endforeach
    <a href="/allkategori" data-aos="fade-up"
    data-aos-duration="3000">All Kategori</a>
</div> --}}

<!-- Kontainer Produk -->
<br>
<section id="product-container">

    <!-- Produk LED Fishing Light -->
    <div class="product-list" id="produk-card">
        @if($posts->isEmpty())
            <p class="text-center fs-4">Tidak ada produk yang ditemukan.</p>
        @else
            @foreach ($posts as $produk)
                <div class="product-card" data-name="img-produk"  data-aos="zoom-out" data-aos-duration="1000">
                    <div class="kategori-produk">
                        <p><a href="/kategori/{{ $produk->kategori->slug }}" class="text-decoration-none text-capitalize text-white">{{ $produk->kategori->nama }} <i class="fa-solid fa-tag"></i></a></p>
                    </div>
                    <a href="/produk/{{ $produk->slug }}">
                        <div class="gambar-thumbnail">
                            <img src="{{ asset('storage/' . $produk->gambar1) }}" alt="Img-Produk">
                        </div>
                    </a>
                    <div class="produk-info">
                        <h5>
                            <a href="/produk/{{ $produk->slug }}" class="nama-produk">
                                <!-- Untuk desktop, tampilkan 70 karakter -->
                                <span class="desktop">{{ \Illuminate\Support\Str::limit($produk->nama_produk, 65) }}</span>

                                <!-- Untuk mobile, tampilkan 40 karakter -->
                                <span class="mobile">{{ \Illuminate\Support\Str::limit($produk->nama_produk, 35) }}</span>
                            </a>
                        </h5>
                        <p><span class="badge text-bg-warning text-danger"><i class="fa-solid fa-fire"></i> Diskon : {{ $produk->diskon }}% </span></p>
                        <p><i class="fa-solid fa-store" style="color: #04b4c4"></i> Cahayacenterid</p>
                        <p><i class="fa-solid fa-truck-fast" style="color: #2fd946"></i> Kab.Tangerang</p>
                        <p>  <span class="text-decoration-line-through text-secondary badge text-bg-danger text-white">Rp {{ number_format($produk->harga / (1 - ($produk->diskon / 100)), 0, ',', '.') }}
                        </span></p>
                        <h4><b>Harga : Rp {{ number_format($produk->harga, 0, ',', '.') }}</b></h4>
                    </div>
                    <a href="/produk/{{ $produk->slug }}" class="text-decoration-none">
                        <button class="details-button">Selengkapnya</button>
                    </a>
                </div>
            @endforeach
        @endif
        <button id="back-to-top" class="btn" style="background-color: #fd8c45; color: white; display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
            <i class="fa-solid fa-angle-up"></i>
        </button>


    </div>

    <div class="pagination d-flex justify-content-center my-5">
        {{ $posts->links('vendor.pagination.default') }}
    </div>
</section>
<br>


<script src="{{ asset('js/produk.js') }}"></script>
<script>
    // Menampilkan tombol jika scroll lebih dari 100px
    const backToTopButton = document.getElementById("back-to-top");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 100) {
            backToTopButton.style.display = "block";
        } else {
            backToTopButton.style.display = "none";
        }
    });

    // Scroll ke atas saat tombol diklik
    backToTopButton.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>


@endsection
