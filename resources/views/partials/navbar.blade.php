<header class="mynavbar">
    <div class="mynavbar-container">
            <a href="/" class="logo text-decoration-none">CSI</a>
            <div class="mynavbar-nav">
                <a href="/">Beranda</a>
                <a href="/features">Keunggulan</a>
                <a href="/produk">Produk</a>
                <a href="/testimoni">Testimoni</a>
                <a href="/faq">FAQ</a>
                <a href="/tentang">Tentang</a>
                @auth
                <a class="dropdown-toggle text-decoration-none login-nav" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> {{ strtoupper(auth()->user()->name) }}
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
                    <a href="/login" class="login-nav"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                @endauth
            </div>
            <div class="navbar-ekstra">
                @auth
                <a class="dropdown-toggle text-decoration-none" id="login" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> {{ strtoupper(auth()->user()->name) }}
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
                    <a href="/login" id="login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                @endauth
                <a href="#" id="hamburger"><i class="fa-solid fa-bars"></i></a>
            </div>
    </div>
</header>
