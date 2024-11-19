<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT CAHAYA SETIA INDONESIA</title>
    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    {{-- Font Awesome --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    {{-- CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  </head>
  <body>
    <div class="container-all">
      <section class="mynavbar">
        <a href="#" class="logo">CSI</a>
        <nav>
          <a href="/">Beranda</a>
          <a href="/features">Keunggulan</a>
          <a href="/produk">Produk</a>
          <a href="/testimoni">Testimoni</a>
          <a href="/faq">FAQ</a>
          <a href="/tentang">Tentang</a>
        </nav>
        <div class="login">
          <a href="/login" class="login">Login</a>
        </div>
      </section>
      <!-- Navbar HP -->
      <!-- <div class="navbar-hp">
        <a href="#" class="logo">CSI</a>
        <div class="button"><i class="fa-solid fa-bars"></i></div>
      </div>

      <div class="navbar-side">
        <nav>
          <a href="#">Beranda</a>
          <a href="#features">Keunggulan</a>
          <a href="#produk">Produk</a>
          <a href="#testimoni">Testimoni</a>
          <a href="#about">Tentang</a>
        </nav>
      </div> -->
      <div class="container-layouts">
        @yield('container')

          <section class="myfooter">
            <div class="footer-1">
              <h3>CSI</h3>
              <p>
                PT CAHAYA SETIA INDONESIA: Menyediakan lampu pancing berkualitas
                tinggi untuk dermaga dan kapal.
              </p>
              <div class="sosmed">
                <p>Follow Us</p>
                <div class="link-sosmed">
                  <a
                    href="https://www.tiktok.com/@cahayacoffee.id?lang=en"
                    target="_blank"
                    ><i class="fa-brands fa-tiktok"></i
                  ></a>
                  <a
                    href="https://www.instagram.com/cahayacenterid/?igsh=MXRtMnJoMnd5cDZlNA%3D%3D"
                    target="_blank"
                    ><i class="fa-brands fa-instagram"></i
                  ></a>
                  <a
                    href="https://id.linkedin.com/in/pt-cahaya-setia-indonesia-619451324/in"
                    target="_blank"
                    ><i class="fa-brands fa-linkedin"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="footer-2">
              <h3>Beranda</h3>
              <a href="#why">Kenapa Kita?</a>
              <a href="#slogan">Slogan</a>
            </div>
            <div class="footer-3">
              <h3>Pelayanan</h3>
              <a href="#produk">Produk</a>
              <a href="#features">Keunggulan</a>
            </div>
            <div class="footer-4">
              <h3>Testimoni</h3>
              <a href="#testimoni">Testimoni Pelanggan</a>
              <a href="#faq">FAQ</a>
            </div>
          </section>
          <p
            style="
              color: gray;
              text-align: center;
              padding: 40px 0;
              background-color: black;
              margin:0;
            "
          >
            © 2024 CSI. All Rights Reserved
          </p>
      </div>
    </div>

    {{-- MY JS --}}
    <script src="{{ asset('js/script.js') }}"></script>

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </body>
</html>
