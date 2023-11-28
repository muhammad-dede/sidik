<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span class="brand-logo">
                        <img src="{{ asset('') }}logo.png" alt="" class="w-100">
                    </span>
                    <h2 class="brand-text">
                        SIDIK
                    </h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content pt-1">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="mt-2 nav-item {{ Request::is('/') || Request::is('home') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('home') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Beranda">
                        Beranda
                    </span>
                </a>
            </li>
            {{-- Divider --}}
            <li class=" navigation-header">
                <span data-i18n="Manajemen Data">Manajemen Data</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item {{ Request::is('user') || Request::is('user/*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('user.index') }}">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="User">
                        User
                    </span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="layout"></i>
                    <span class="menu-title text-truncate" data-i18n="Master">
                        Master
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::is('jabatan') || Request::is('jabatan/*') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('jabatan.index') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Jabatan">
                                Jabatan
                            </span>
                        </a>
                    </li>
                    <li class="{{ Request::is('badan-usaha') || Request::is('badan-usaha/*') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('badan-usaha.index') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Badan Usaha">
                                Badan Usaha
                            </span>
                        </a>
                    </li>
                    <li
                        class="{{ Request::is('satuan-produksi') || Request::is('satuan-produksi/*') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('satuan-produksi.index') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Satuan Produksi">
                                Satuan Produksi
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class=" nav-item {{ Request::is('kategori-produk') || Request::is('kategori-produk/*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('kategori-produk.index') }}">
                    <i data-feather='grid'></i>
                    <span class="menu-title text-truncate" data-i18n="Kategori Produk">
                        Kategori Produk
                    </span>
                </a>
            </li>
            <li class=" nav-item {{ Request::is('produk') || Request::is('produk/*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('produk.index') }}">
                    <i data-feather='award'></i>
                    <span class="menu-title text-truncate" data-i18n="Produk">
                        Produk
                    </span>
                </a>
            </li>
            {{-- Divider --}}
            <li class=" navigation-header">
                <span data-i18n="Data">Data</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item {{ Request::is('perusahaan') || Request::is('perusahaan/*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('perusahaan.index') }}">
                    <i data-feather='flag'></i>
                    <span class="menu-title text-truncate" data-i18n="Perusahaan">
                        Perusahaan
                    </span>
                </a>
            </li>
            <li class=" nav-item {{ Request::is('ikm') || Request::is('ikm/*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('ikm.index') }}">
                    <i data-feather='book-open'></i>
                    <span class="menu-title text-truncate" data-i18n="IKM">
                        IKM
                    </span>
                </a>
            </li>
            {{-- Divider --}}
            <li class=" navigation-header">
                <span data-i18n="Pengaturan">Lainnya</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item {{ Request::is('akun') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('akun') }}">
                    <i data-feather='user'></i>
                    <span class="menu-title text-truncate" data-i18n="Akun">
                        Akun
                    </span>
                </a>
            </li>
            <li class=" nav-item {{ Request::is('pengaturan') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('pengaturan') }}">
                    <i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="Pengaturan">
                        Pengaturan
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
