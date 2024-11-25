<header class="mynavbar">
    <div class="mynavbar-container">
        <div class="mynavbar-logo">
            <a href="#">CSI</a>
        </div>
        <button class="menu-toggle" aria-label="Toggle Menu">☰</button>
        <nav class="mynavbar-menu">
            <ul>
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="/">Beranda</a>
                </li>
                <li class="{{ request()->is('features') ? 'active' : '' }}">
                    <a href="/features">Keunggulan</a>
                </li>
                <li class="{{ request()->is('produk') ? 'active' : '' }}">
                    <a href="/produk">Produk</a>
                </li>
                <li class="{{ request()->is('testimoni') ? 'active' : '' }}">
                    <a href="/testimoni">Testimoni</a>
                </li>
                <li class="{{ request()->is('faq') ? 'active' : '' }}">
                    <a href="/faq">FAQ</a>
                </li>
                <li class="{{ request()->is('tentang') ? 'active' : '' }}">
                    <a href="/tentang">Tentang</a>
                </li>
            </ul>
        </nav>

        <!-- Login Button -->
        <div class="mynavbar-login">
            <a href="/login" class="login-btn">Login</a>
        </div>
    </div>
</header>



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
