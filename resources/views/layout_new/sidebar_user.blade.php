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
    @guest
        <li class="nav-item">
            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}"
                href="#" aria-expanded="false" data-target="#submenu-10" data-toggle="collapse" aria-expanded ="false"
                aria-controls="submenu-10"><i class="ni ni-circle-08 text-pink"></i>Login / Register</a>
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
                aria-controls="submenu-11"><i class="ni ni-book-bookmark text-purple"></i>Ajukan Pengaduan</a>
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
    @endguest
    
  </ul>