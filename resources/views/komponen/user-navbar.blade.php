<nav class="navbar user-navbar" id="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="nav-logo">J-TRIP</a>

        <button type="button" class="mobile-menu-btn" onclick="toggleUserMenu()" aria-label="Menu">
            ☰
        </button>

        <ul class="nav-menu" id="userNavMenu">
            <li>
                <a href="{{ url('/') }}"
                   class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>

            <li>
                <a href="{{ url('/wisata') }}"
                   class="nav-link {{ request()->is('wisata*') ? 'active' : '' }}">
                    Wisata
                </a>
            </li>

            <li>
                <a href="{{ url('/#tentang') }}" class="nav-link">
                    Tentang
                </a>
            </li>

            @auth
                <li>
                    <a href="{{ route('riwayat.pesanan.index') }}"
                       class="nav-link {{ request()->is('riwayat-pesanan*') ? 'active' : '' }}">
                        Riwayat Pesanan
                    </a>
                </li>
            @endauth
        </ul>

        <div class="nav-auth">
            @guest
                <a href="{{ url('/login') }}" class="btn-login">Login</a>
                <a href="{{ url('/register') }}" class="btn-register">Register</a>
            @endguest

            @auth
                <form action="{{ route('logout') }}" method="POST" style="display:inline;margin:0;">
                    @csrf
                    <button type="submit" class="btn-register nav-logout-btn">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<script>
    function toggleUserMenu() {
        const menu = document.getElementById('userNavMenu');
        if (menu) {
            menu.classList.toggle('show');
        }
    }
</script>