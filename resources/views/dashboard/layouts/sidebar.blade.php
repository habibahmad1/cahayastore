<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-dark-gray">
    <div class="offcanvas-md offcanvas-end bg-dark-gray" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel">PT. CAHAYA SETIA INDONESIA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">

        <h6 id="bagHomeToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style=" padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AbagHomeSubmenu">
            <span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
</svg>
BAG home</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>

        @auth
        <ul id="bagHomeSubmenu" class="nav flex-column collapse">
          <li class="nav-item" id="nav-item-dashboard">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active-dashboard' : '' }}" aria-current="page" href="/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-text-sidebar-reverse" viewBox="0 0 16 16">
                    <path d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5.5 0 0 1 0-1zm0 3a.5.5 0 0 1 0 1h-5a.5.5.5 0 0 1 0-1zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5m-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"/>
                    <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5z"/>
                  </svg>
              Dashboard
            </a>
          </li>

          <li class="nav-item" id="nav-item-homepage">
            <a class="nav-link d-flex align-items-center gap-2" href="/"  target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                  </svg>
              Homepage
            </a>
          </li>
        </ul>
        @endauth

        <h6 id="bagProdukToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style=" padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AbagProdukSubmenu">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3-fill" viewBox="0 0 16 16">
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
</svg> BAG PRODUK</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>

        <ul id="bagProdukSubmenu" class="nav flex-column collapse">
            <li class="nav-item" id="nav-item-produk">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/produk*') ? 'active-dashboard' : '' }}" href="/dashboard/produk">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
                      </svg>
                  Produk
                </a>
            </li>

            @can('admin')
            <li class="nav-item" id="nav-item-kategori-produk">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/kategori', 'dashboard/kategori/*') ? 'active-dashboard' : '' }}" href="/dashboard/kategori">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bounding-box-circles" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2M0 2a2 2 0 0 1 3.937-.5h8.126A2 2 0 1 1 14.5 3.937v8.126a2 2 0 1 1-2.437 2.437H3.937A2 2 0 1 1 1.5 12.063V3.937A2 2 0 0 1 0 2m2.5 1.937v8.126c.703.18 1.256.734 1.437 1.437h8.126a2 2 0 0 1 1.437-1.437V3.937A2 2 0 0 1 12.063 2.5H3.937A2 2 0 0 1 2.5 3.937M14 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2M2 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m12 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                    </svg>
                    Kategori Produk
                </a>
            </li>
            @endcan
        </ul>

        @auth
        <h6 id="bagArtikelToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style=" padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AbagArtikelSubmenu">
            <span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-post" viewBox="0 0 16 16">
  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
  <path d="M4 6.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1-.5-.5"/>
</svg> BAG Artikel</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>

        <ul id="bagArtikelSubmenu" class="nav flex-column collapse">
            <li class="nav-item" id="nav-item-artikel-saya">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/artikel*') ? 'active-dashboard' : '' }}" href="/dashboard/artikel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                      </svg>
                    Artikel Saya
                </a>
            </li>

            @can('admin')
            <li class="nav-item" id="nav-item-kategori-artikel">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/kategoriartikel', 'dashboard/kategoriartikel/*') ? 'active-dashboard' : '' }}" href="/dashboard/kategoriartikel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bounding-box-circles" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2M0 2a2 2 0 0 1 3.937-.5h8.126A2 2 0 1 1 14.5 3.937v8.126a2 2 0 1 1-2.437 2.437H3.937A2 2 0 1 1 1.5 12.063V3.937A2 2 0 0 1 0 2m2.5 1.937v8.126c.703.18 1.256.734 1.437 1.437h8.126a2 2 0 0 1 1.437-1.437V3.937A2 2 0 0 1 12.063 2.5H3.937A2 2 0 0 1 2.5 3.937M14 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2M2 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m12 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                    </svg>
                    Kategori Artikel
                </a>
            </li>
            @endcan
        </ul>

        @can('admin')

        <h6 id="bagUserManajemenToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style=" padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AbagUserManajemenSubmenu">
            <span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
  <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
</svg> BAG User Manajemen</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>

        <ul id="bagUserManajemenSubmenu" class="nav flex-column collapse">
            <li class="nav-item" id="nav-item-daftar-user">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/data') ? 'active-dashboard' : '' }}" href="/dashboard/data">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    </svg>
                    Daftar User
                </a>
            </li>
            <li class="nav-item" id="nav-item-daftar-artikel">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/allartikel*') ? 'active-dashboard' : '' }}" href="/dashboard/allartikel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                    </svg>
                    Daftar Artikel
                </a>
            </li>
        </ul>
        @endcan
        @endauth

        <h6 id="bagTambahBarangToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style=" padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AbagTambahBarangSubmenu">
            <span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z"/>
</svg> BAG TAMBAH BARANG</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>

        <ul id="bagTambahBarangSubmenu" class="nav flex-column collapse">
            <li class="nav-item" id="nav-item-tambah-barang-masuk">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/barang-masuk/create') ? 'active-dashboard' : '' }}" href="/dashboard/barang-masuk/create">
                    <i class="bi bi-bag-plus"></i>
                    Tambah Barang Masuk
                </a>
            </li>
            <li class="nav-item" id="nav-item-tambah-barang-keluar">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/barang-keluar/create') ? 'active-dashboard' : '' }}" href="/dashboard/barang-keluar/create">
                    <i class="bi bi-file-earmark-plus"></i>
                    Tambah Barang Keluar
                </a>
            </li>
        </ul>

        <h6 id="bagStokBarangToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style="padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AbagStokBarangSubmenu">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
  <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z"/>
</svg> BAG Stok Barang</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>

        <ul id="bagStokBarangSubmenu" class="nav flex-column collapse">
            <li class="nav-item" id="nav-item-data-stok-barang">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/databarang*') ? 'active-dashboard' : '' }}" href="/dashboard/databarang">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
                        <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6z"/>
                    </svg>
                    Data Stok Barang
                </a>
            </li>
            <li class="nav-item" id="nav-item-barang-masuk">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/barang-masuk') ? 'active-dashboard' : '' }}" href="/dashboard/barang-masuk">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dropbox" viewBox="0 0 16 16">
                        <path d="M8.01 4.555 4.005 7.11 8.01 9.665 4.005 12.22 0 9.651l4.005-2.555L0 4.555 4.005 2zm-4.026 8.487 4.006-2.555 4.005 2.555-4.005 2.555zm4.026-3.39 4.005-2.556L8.01 4.555 11.995 2 16 4.555 11.995 7.11 16 9.665l-4.005 2.555z"/>
                    </svg>
                    Data Barang Masuk
                </a>
            </li>
            <li class="nav-item" id="nav-item-barang-keluar">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/barang-keluar') ? 'active-dashboard' : '' }}" href="/dashboard/barang-keluar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
                        <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6z"/>
                    </svg>
                    Data Barang Keluar
                </a>
            </li>
        </ul>

        <h6 id="bagSuratToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style=" padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AbagTambahBarangSubmenu">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
</svg> BAG SURAT</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>
        <ul id="bagSuratSubmenu" class="nav flex-column collapse">
            <li class="nav-item" id="nav-item-barang-keluar">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/barang-keluar') ? 'active-dashboard' : '' }}" href="/dashboard/surat-resi">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-2l-1-1-1 1-1-1-1 1-1-1-1 1-1-1-1 1H1a1 1 0 0 1-1-1V1zM2 2v12h12V2H2zm2 2h8v1H4V4zm0 2h8v1H4V6zm0 2h8v1H4V8zm0 2h8v1H4v-1z"/>
                    </svg>
                    Buat Surat Resi
                </a>
            </li>
            <li class="nav-item" id="nav-item-barang-keluar">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/barang-keluar') ? 'active-dashboard' : '' }}" href="/dashboard/surat-jalan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M4 9.5A1.5 1.5 0 0 1 5.5 8h5A1.5 1.5 0 0 1 12 9.5V10h1V6h-1V4H2v6h1v.5zM12 11v-1H4v1h8zM3 11v1h10v-1H3zm2.5 2A1.5 1.5 0 1 0 7 11.5 1.5 1.5 0 0 0 5.5 13zm6 0A1.5 1.5 0 1 0 13 11.5 1.5 1.5 0 0 0 11.5 13z"/>
                    </svg>
                    Buat Surat Jalan
                </a>
            </li>
        </ul>

        <h6 id="bagReturnToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style=" padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AbagTambahBarangSubmenu">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-symlink-fill" viewBox="0 0 16 16">
  <path d="M13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2l.04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3M2.19 3q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293L7.586 3zm9.608 5.271-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742"/>
</svg> BAG RETURN</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>

        <ul id="bagReturnSubmenu" class="nav flex-column collapse">
            <li class="nav-item" id="nav-item-input-barang-return">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/barang-return/create') ? 'active-dashboard' : '' }}" href="/dashboard/barang-return/create">
                    <i class="bi bi-box-seam-fill"></i>
                    Input Barang Return
                </a>
            </li>
            <li class="nav-item" id="nav-item-riwayat-return">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/barang-return') ? 'active-dashboard' : '' }}" href="/dashboard/barang-return">
                    <i class="bi bi-stack"></i>
                    Riwayat Return
                </a>
            </li>
        </ul>

        <hr class="my-3">
       <!-- Settings Submenu -->
       @auth
       <h6 id="bagSettingsToggle" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase" style="padding: 10px; color: #ffffff !important; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#AsettingsSubmenu" aria-expanded="false" aria-controls="SsettingsSubmenu">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
  <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z"/>
</svg> Settings</span>
            <i class="bi bi-caret-down-fill"></i>
        </h6>
        @endauth

<ul id="SsettingsSubmenu" class="nav flex-column collapse">
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/settings*') ? 'active-dashboard' : '' }}" href="/dashboard/settings">
            <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
            Profil
        </a>
    </li>
    <!-- Bahasa Submenu -->
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="#">
            <i class="bi bi-translate"></i>
            <span>Bahasa</span>
            <div id="google_translate_element"></div>
        </a>
    </li>
    <!-- Logout Submenu -->
    @auth
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 15a1 1 0 0 1-1-1v-1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4V2a1 1 0 0 1 2 0v1h1.5a1.5 1.5 0 0 1 1.5 1.5v8A1.5 1.5 0 0 1 13.5 14H12v1a1 1 0 0 1-1 1zm-1-2v1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4v1H5v8h4zm1-1h1.5a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5H10v9z"/>
                <path fill-rule="evenodd" d="M8.5 8a.5.5 0 0 1 .5.5v.5h3.5a.5.5 0 0 1 0 1H9v.5a.5.5 0 0 1-1 0v-2a.5.5 0 0 1 .5-.5z"/>
            </svg>
            Logout
        </a>
        <form id="logout-form" method="POST" action="/logout" style="display: none;">
            @csrf
        </form>
    </li>
    @endauth

    <hr class="my-3">
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id',
            includedLanguages: 'en,id,zh-CN',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

      </div>
    </div>
  </div>
