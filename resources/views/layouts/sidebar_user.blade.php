<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Pemetaan Jalan Rusak Provinsi Bali</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        @guest
                            Menu
                        @else
                            Menu User
                        @endguest
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/"
                            aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i
                                class="fa fa-fw fa-home"></i>Beranda <span
                                class="badge badge-success">6</span></a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kategori','kategori/create','kategori/edit') ? 'active' : '' }}"
                            href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fa fa-fw fa-map"></i>Maps</a>
                            <div id="submenu-9" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/mapPengaduan">Map Jalan Rusak Pengaduan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/mapTerverifikasi">Map Jalan Rusak Terverifikasi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/mapDiperbaiki">Map Jalan Sudah Diperbaiki</a>
                                    </li>
                                </ul>
                            </div>

                    </li>
                    
                        
                        @guest
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}"
                                href="#" aria-expanded="false" data-target="#submenu-10" data-toggle="collapse" aria-expanded ="false"
                                aria-controls="submenu-10"><i class="fas fa-fw fa-user"></i>Login / Register</a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    </ul>
                                </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('jalan/create') ? 'active' : '' }}"
                                href="#" aria-expanded="false" data-target="#submenu-11" data-toggle="collapse" aria-expanded="false"
                                aria-controls="submenu-11"><i class="fas fa-fw fa-book"></i>Ajukan Pengaduan</a>
                                <div id="submenu-11" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="jalan/create">Ajukan Pengaduan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/riwayatPengaduan">Riwayat Pengaduan</a>
                                        </li>
                                    </ul>
                                </div>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}"
                                href="{{ route('login') }}" aria-expanded="false" data-target="#submenu-3"
                                aria-controls="submenu-3"><i class="fas fa-fw fa-user"></i>Profil</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/logout" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i
                                    class="fas fa-power-off mr-2"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</div>