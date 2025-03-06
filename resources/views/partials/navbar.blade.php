<header class="mynavbar">
    <div class="mynavbar-container">
            <a href="/" class="logo text-decoration-none">CSI</a>
            <div class="mynavbar-nav">
                <a href="/" class="{{ Request::is('/') ? 'active-dashboard' : '' }}">Beranda</a>
                <a href="/features" class="{{ Request::is('features') ? 'active-dashboard' : '' }}">Keunggulan</a>
                <a href="/produk" class="{{ Request::is('produk*') ? 'active-dashboard' : '' }}">Produk</a>
                <a href="/katalog-produk" class="{{ Request::is('katalog-produk*') ? 'active-dashboard' : '' }}">Katalog</a>
                <a href="/artikel" class="{{ Request::is('artikel*') ? 'active-dashboard' : '' }}">Artikel</a>
                {{-- <a href="/categories" class="{{ Request::is('categories*') ? 'active-dashboard' : '' }}">Kategori</a> --}}
                <a href="/faq" class="{{ Request::is('faq') ? 'active-dashboard' : '' }}">FAQ</a>
                <a href="/tentang" class="{{ Request::is('tentang') ? 'active-dashboard' : '' }}">Tentang</a>

                @auth
                <a class="dropdown-toggle text-decoration-none login-nav" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> {{ ucfirst(auth()->user()->name) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item text-black" href="/dashboard"><i class="fa-solid fa-square-poll-horizontal"></i> Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                        </form>
                    </li>
                </ul>
                @else
                    <a href="/login" class="login-nav login-key d-none"><i class="fa-solid fa-arrow-right-to-bracket "></i> Login</a>
                @endauth
            </div>
            <div class="navbar-ekstra">
                @auth
                <a class="dropdown-toggle text-decoration-none" id="login" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> {{ ucfirst(auth()->user()->name) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item text-black" href="/dashboard"><i class="fa-solid fa-square-poll-horizontal"></i> Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                        </form>
                    </li>
                </ul>
                @else
                    <a href="/set-login-access" id="login" class="login-key">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                    </a>
                @endauth
                <a href="#" id="hamburger"><i class="fa-solid fa-bars"></i></a>
            </div>
    </div>
</header>
