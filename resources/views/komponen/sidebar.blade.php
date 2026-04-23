<div class="sidebar text-white">
    <div class="brand-title">JTrip Admin</div>
    <div class="brand-subtitle">Sistem Dashboard Terpadu</div>

    <hr class="sidebar-divider">

    <ul class="nav flex-column">

        <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}"
               class="nav-link {{ $segment == 'dashboard' ? 'active-menu' : '' }}">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/wisata') }}"
               class="nav-link {{ $segment == 'wisata' ? 'active-menu' : '' }}">
                <i class="bi bi-compass-fill"></i>
                <span>Wisata</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/tiket') }}"
               class="nav-link {{ $segment == 'tiket' ? 'active-menu' : '' }}">
                <i class="bi bi-ticket-fill"></i>
                <span>Tiket</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/transaksi') }}"
               class="nav-link {{ $segment == 'transaksi' ? 'active-menu' : '' }}">
                <i class="bi bi-wallet2"></i>
                <span>Transaksi</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/user') }}"
               class="nav-link {{ $segment == 'user' ? 'active-menu' : '' }}">
                <i class="bi bi-people-fill"></i>
                <span>User</span>
            </a>
        </li>

        <li class="nav-item mt-4">
            <a href="{{ url('/admin/laporan') }}"
               class="nav-link {{ $segment == 'laporan' ? 'active-menu' : '' }}">
                <i class="bi bi-bar-chart-fill"></i>
                <span>Laporan</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/pengaturan') }}"
               class="nav-link {{ $segment == 'pengaturan' ? 'active-menu' : '' }}">
                <i class="bi bi-gear-fill"></i>
                <span>Pengaturan</span>
            </a>
        </li>

    </ul>
</div>
