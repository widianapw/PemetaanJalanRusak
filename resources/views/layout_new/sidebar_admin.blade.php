<ul class="navbar-nav">
    <li class="nav-item  active ">
      <a class="nav-link " href="/">
        <i class="ni ni-tv-2 text-primary"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link"
            href="#" data-target="#submenu-11" data-toggle="collapse" aria-expanded="false"
            aria-controls="submenu-11"><i class="ni ni-map-big text-orange"></i>Maps</a>
            <div id="submenu-11" class="collapse submenu" style="">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/mapPengaduan">Map Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mapTerverifikasi">Map Terverifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mapDiperbaiki">Map Diperbaiki</a>
                    </li>
                </ul>
            </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/listPengaduan') ? 'active' : '' }}"
            href="/admin/listPengaduan" aria-expanded="false" data-target="#submenu-3"
            aria-controls="submenu-3"><i class="ni ni-book-bookmark text-purple"></i>Manajemen Pengaduan</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/digitasiJalan') ? 'active' : '' }}"
            href="/admin/digitasiJalan" aria-expanded="false" data-target="#submenu-3"
            aria-controls="submenu-3"><i class="ni ni-delivery-fast text-green"></i>Digitasi Jalan</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/listPengguna') ? 'active' : '' }}"
            href="/admin/listPengguna" aria-expanded="false" data-target="#submenu-3"
            aria-controls="submenu-3"><i class="ni ni-single-02 text-blue"></i>Manajemen Pengguna</a>
    </li>
                        
    <li class="nav-item">
        <a class="nav-link" href="/logout" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                class="ni ni-button-power text-pink"></i>
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
            style="display: none;">
            @csrf
        </form>
    </li>
  </ul>