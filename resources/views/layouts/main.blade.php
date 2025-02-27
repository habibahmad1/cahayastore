<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <meta name="description" content="Perusahaan yang bergerak dibidang penjualan pada platform online marketplace"> --}}

    <!-- Meta Description -->
    <meta name="description" content="Perusahaan yang bergerak dibidang penjualan pada platform online marketplace , Temukan berbagai produk berkualitas di toko online kami yang tersedia di marketplace populer. Kami menyediakan solusi belanja mudah dan terpercaya untuk memenuhi kebutuhan Anda.">

    <!-- Meta Keywords -->
    <meta name="keywords" content="toko online, jual produk, marketplace, belanja online, produk berkualitas, solusi belanja, harga terbaik, pengiriman cepat, belanja terpercaya">
    <meta name="author" content="PT. CAHAYA SETIA INDONESIA">
    <title>PT. CAHAYA SETIA INDONESIA | {{ $title ?? '404' }}</title>
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/matahari.png') }}" type="image/png">
    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/allkategori.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/artikel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/keunggulan.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/katalogproduk.css') }}" />
    {{-- Font Awesome --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    {{-- Animasi CSS AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- CSS Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>

    <div class="container-all">

      @include('partials.navbar')

      <div class="navbar-bottom"></div>

      <div class="container-layouts">
        @yield('container')

        @include('partials.footer')
      </div>
    </div>

    {{-- MY JS --}}
    <script src="{{ asset('js/script.js') }}"></script>

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- JS AOS --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </body>
</html>
