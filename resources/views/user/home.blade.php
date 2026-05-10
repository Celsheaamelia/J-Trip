<!DOCTYPE html>
    <html lang="id">
    <head>
                <script 
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.client_key') }}">
        </script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>J-TRIP - Jelajahi Wisata Terbaik di Jember</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="/css/landing.css?v=1">
    </head>
    <body>

        {{-- ===== NAVBAR ===== --}}
        <nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="nav-logo">J-TRIP</a>

        <ul class="nav-menu">
            <li><a href="#beranda" class="nav-link active">Beranda</a></li>
            <li><a href="#destinasi" class="nav-link">Wisata</a></li>
            <li><a href="#tentang" class="nav-link">Tentang</a></li>

            @auth
                <li>
                    <a href="{{ route('riwayat.pesanan.index') }}" class="nav-link">
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
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-register" style="border:none;cursor:pointer;">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

        {{-- ===== HERO SECTION ===== --}}
        <section class="hero" id="beranda">
            <div class="hero-overlay"></div>
            <img id="heroBg" src="{{ asset('assets/images/hero-jember.jpg') }}" alt="Wisata Jember" class="hero-bg">
            <div class="hero-content">
                <h1 class="hero-title">Jelajahi Wisata Terbaik di<br>Jember dengan Mudah</h1>
                <p class="hero-desc">
                    Pesan tiket wisata terbaik, cepat, aman, dan praktis hanya<br>
                    di J-Trip. Dapatkan pengalaman wisata tumbukan!
                </p>
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">
                        <i class="fas fa-ticket-alt"></i> Pesan tiket
                    </a>
                    <a href="#destinasi" class="btn-outline">
                        <i class="fas fa-map-marker-alt"></i> Lihat Destinasi
                    </a>
                </div>
            </div>
        </section>

        {{-- ===== FITUR UNGGULAN ===== --}}
        <section class="features" id="fitur">
            <div class="container">
                <h2 class="section-title">Fitur Unggulan</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#e8f5e9">
                            <i class="fas fa-ticket-alt" style="color:#2e7d32"></i>
                        </div>
                        <h3>Booking Tiket Online</h3>
                        <p>Pesan tiket wisata secara online, kapan saja dan di mana saja tanpa antri panjang.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#e3f2fd">
                            <i class="fas fa-shield-alt" style="color:#1565c0"></i>
                        </div>
                        <h3>JMPN</h3>
                        <p>Jaminan kepastian tiket dengan sistem J-TRIP yang terpercaya dan terverifikasi.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#fff3e0">
                            <i class="fas fa-credit-card" style="color:#e65100"></i>
                        </div>
                        <h3>Pembayaran Online</h3>
                        <p>Bayar dengan mudah menggunakan berbagai metode pembayaran digital yang aman.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#fce4ec">
                            <i class="fas fa-map-marked-alt" style="color:#c62828"></i>
                        </div>
                        <h3>Navigasi Maps</h3>
                        <p>Temukan lokasi wisata dengan mudah menggunakan fitur navigasi peta interaktif.</p>
                    </div>
                </div>
            </div>
        </section>

       {{-- ===== DESTINASI POPULER ===== --}}
<section class="destinasi" id="destinasi">
    <div class="container">
        <div class="section-header">
            <div>
                <span class="section-label">Destinasi Populer</span>
                <h2 class="section-title-left">Jelajahi Pesona Jember</h2>
            </div>
            <a href="{{ url('/wisata') }}" class="lihat-semua">Lihat semua wisata →</a>
        </div>

 <div class="destinasi-grid">
    @foreach ($wisata as $item)
        <div class="dest-card">
            <div class="dest-img-wrap">
                <img src="{{ asset('uploads/wisata/' . $item->image) }}">
                <span class="dest-badge">Wisata</span>
            </div>

            <div class="dest-info">
                <h3>{{ $item->name }}</h3>
                <p>{{ $item->description }}</p>

                <div class="dest-footer">
                    <span class="dest-price">
                        {{ $item->price == 0 ? 'Gratis' : 'Rp ' . number_format($item->price, 0, ',', '.') }}
                    </span>

                    <button type="button"
                        class="btn-dest"
                        data-id="{{ $item->id_wisata }}"
                        onclick="openDetailById(this)">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>
    </div>
</section>
        {{-- ===== TENTANG J-TRIP ===== --}}
        <section class="tentang" id="tentang">
            <div class="container">
                <div class="tentang-wrap">
                    <div class="tentang-logo-box">
                        <div class="logo-circle">
                            <img src="{{ asset('assets/images/logo-jember.png') }}" alt="Logo Jember" onerror="this.style.display='none'">
                            <div class="logo-fallback">
                                <span class="logo-text-big">Jember</span>
                                <span class="logo-sub">safe work</span>
                                <span class="logo-sub2">SAFE WORK</span>
                            </div>
                        </div>
                    </div>
                    <div class="tentang-content">
                    <span class="visi-label">VISI & MISI</span>
                        <h2 class="tentang-title">Tentang J-TRIP</h2>
                        <p class="tentang-desc">
                            J-TRIP adalah platform digital terpercaya yang dirancang untuk memudahkan wisatawan di Kabupaten Jember. Kami hadir sebagai solusi nyata bagi wisatawan lokal maupun mancanegara.
                        </p>
                        <p class="tentang-desc">
                            Dengan fokus pada kemudahan akses, keamanan transaksi, dan promosi destinasi lokal yang berkembang, J-TRIP berkomitmen untuk meningkatkan pengalaman berwisata yang tak terlupakan melalui teknologi terkini.
                        </p>
                        <div class="tentang-stats">
                            <div class="stat-item">
                                <span class="stat-number">60+</span>
                                <span class="stat-label">Wisata Aktif</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">100K+</span>
                                <span class="stat-label">Pengunjung</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== FOOTER ===== --}}
        <footer class="footer">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-col">
                        <h3 class="footer-brand">J-TRIP</h3>
                        <p>Platform wisata digital terpercaya untuk menjelajahi keindahan Kabupaten Jember.</p>
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="footer-col">
                        <h4>Navigasi</h4>
                        <ul>
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Destinasi</a></li>
                            <li><a href="#">Cek Tiket</a></li>
                            <li><a href="#">Wisata</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Legalitas</h4>
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Cookie Support</a></li>
                            <li><a href="#">Lisensi</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Download App</h4>
                        <p>Unduh aplikasi J-TRIP sekarang.</p>
                        <a href="#" class="btn-playstore">
                            <i class="fab fa-google-play"></i>
                            <div>
                                <span>GET IT ON</span>
                                <strong>Google Play</strong>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>© 2024 J-TRIP. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <script src="/js/landing.js?v=1"></script>

{{-- ===== GALLERY MODAL ===== --}}
<div id="galleryModal" style="
    display:none;
    position:fixed;
    top:0; left:0; right:0; bottom:0;
    background:rgba(0,0,0,0.92);
    z-index:99999;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    animation:fadeInModal .25s ease;
">
    <button onclick="closeGallery()" style="
        position:absolute; top:18px; right:22px;
        background:rgba(255,255,255,0.12); border:none; color:#fff;
        font-size:1.1rem; font-weight:700; cursor:pointer;
        border-radius:50%; width:38px; height:38px;
        display:flex; align-items:center; justify-content:center;
        transition:background .2s;
    " onmouseover="this.style.background='rgba(255,255,255,0.25)'"
       onmouseout="this.style.background='rgba(255,255,255,0.12)'">✕</button>

    <div id="galleryBig" style="
        max-width:80vw; max-height:72vh;
        border-radius:14px; overflow:hidden;
        box-shadow:0 30px 80px rgba(0,0,0,0.6);
    ">
        <img id="galleryBigImg" src="" alt="" style="
            width:100%; height:100%; object-fit:contain; display:block;
            max-height:72vh;
        ">
    </div>

    <div id="galleryThumbs" style="
        display:flex; gap:12px; margin-top:18px;
        justify-content:center; flex-wrap:wrap;
        padding:0 20px;
    "></div>

    <p style="color:rgba(255,255,255,.4); font-size:.72rem; margin-top:14px; font-family:'Poppins',sans-serif;">
        Klik thumbnail untuk ganti foto
    </p>
</div>

{{-- ===== MAIN SLIDE ===== --}}
<div id="detailSlide" style="
    position:fixed;
    top:0; left:0; right:0; bottom:0;
    background:#f4f4f4;
    z-index:9999;
    overflow-y:auto;
    transform:translateX(100%);
    transition:transform 0.42s cubic-bezier(0.4, 0, 0.2, 1);
    font-family:'Poppins', sans-serif;
    display:none;
">
    <div style="
        display:flex; align-items:center; justify-content:space-between;
        padding:0 28px; height:54px;
        background:#fff;
        border-bottom:1px solid #e5e7eb;
        position:sticky; top:0; z-index:100;
        box-shadow:0 1px 8px rgba(0,0,0,.06);
    ">
        <span style="font-size:1.15rem; font-weight:900; color:#1a7a5e; letter-spacing:-.5px;">J-TRIP</span>
        <span style="font-size:.82rem; font-weight:700; color:#1a7a5e; border-bottom:2.5px solid #1a7a5e; padding-bottom:2px;">Wisata</span>
        <button onclick="closeDetailSlide()" style="
            background:none; border:none; cursor:pointer;
            font-size:.82rem; color:#6b7280; font-family:inherit;
            padding:6px 10px; border-radius:6px;
            transition:background .15s;
        " onmouseover="this.style.background='#f3f4f6'"
           onmouseout="this.style.background='none'">✕ Tutup</button>
    </div>

    <div style="width:100%; padding:28px 32px 80px; box-sizing:border-box;">
        <div id="detailCard" style="
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 4px 24px rgba(0,0,0,.05);
            opacity:0;
            transform:translateY(28px);
            transition:opacity .45s ease .15s, transform .45s ease .15s;
        ">
            <div style="padding:12px 22px 4px; font-size:.72rem; color:#9ca3af;">
                &rsaquo; <span id="detailBreadcrumb"></span>
            </div>

            <div style="display:flex; gap:0; padding:10px 22px 28px; flex-wrap:wrap; align-items:flex-start;">

                {{-- KOLOM FOTO --}}
                <div style="flex:0 0 500px; max-width:500px;">
                    <div style="
                        position:relative; border-radius:13px; overflow:hidden;
                        height:230px; background:#c8e0d8;
                        box-shadow:0 4px 18px rgba(0,0,0,.1);
                    ">
                        <img id="detailMainImg" src="" alt=""
                            style="width:100%; height:100%; object-fit:cover; display:block; transition:transform .4s ease;">
                        <div style="position:absolute; top:11px; left:11px; display:flex; gap:5px;" id="detailBadges"></div>
                    </div>

                    <div style="display:flex; gap:9px; margin-top:11px; align-items:center;">
                        <div style="width:80px; height:64px; border-radius:10px; overflow:hidden; cursor:pointer; flex-shrink:0; border:2px solid #e5e7eb; transition:border-color .2s, transform .2s;"
                             onmouseover="this.style.borderColor='#1a7a5e';this.style.transform='scale(1.04)'"
                             onmouseout="this.style.borderColor='#e5e7eb';this.style.transform='scale(1)'">
                            <img id="detailThumbImg1" src="" alt="" style="width:100%; height:100%; object-fit:cover;" onclick="switchMainImg(this)">
                        </div>
                        <div style="width:80px; height:64px; border-radius:10px; overflow:hidden; cursor:pointer; flex-shrink:0; border:2px solid #e5e7eb; transition:border-color .2s, transform .2s;"
                             onmouseover="this.style.borderColor='#1a7a5e';this.style.transform='scale(1.04)'"
                             onmouseout="this.style.borderColor='#e5e7eb';this.style.transform='scale(1)'">
                            <img id="detailThumbImg2" src="" alt="" style="width:100%; height:100%; object-fit:cover;" onclick="switchMainImg(this)">
                        </div>
                        <div onclick="openGallery()" style="
                            width:80px; height:64px; border-radius:10px;
                            background:#f3f4f6; flex-shrink:0;
                            display:flex; flex-direction:column;
                            align-items:center; justify-content:center; gap:4px;
                            cursor:pointer; border:2px solid #e5e7eb;
                            transition:border-color .2s, background .2s, transform .2s;
                        " onmouseover="this.style.borderColor='#1a7a5e';this.style.background='#ecfdf5';this.style.transform='scale(1.04)'"
                           onmouseout="this.style.borderColor='#e5e7eb';this.style.background='#f3f4f6';this.style.transform='scale(1)'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="1.8">
                                <rect x="3" y="3" width="7" height="7" rx="1"/>
                                <rect x="14" y="3" width="7" height="7" rx="1"/>
                                <rect x="3" y="14" width="7" height="7" rx="1"/>
                                <rect x="14" y="14" width="7" height="7" rx="1"/>
                            </svg>
                            <span style="font-size:.58rem; font-weight:700; color:#9ca3af; letter-spacing:.3px; text-align:center; line-height:1.2;">TAMPILKAN<br>LEBIH</span>
                        </div>
                    </div>
                </div>

                {{-- KOLOM INFO --}}
                <div style="flex:1; min-width:260px; padding-left:28px; padding-top:4px;">
                    <h2 id="detailTitle" style="font-size:1.65rem; font-weight:900; line-height:1.15; color:#111827; margin:0 0 13px; letter-spacing:-.5px;"></h2>
                    <p id="detailDesc" style="font-size:.8rem; color:#6b7280; line-height:1.78; margin:0 0 18px;"></p>

                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; padding:12px 16px; background:#f0fdf4; border-radius:10px; border:1px solid #bbf7d0;">
                        <span style="font-size:.78rem; color:#374151; font-weight:600;">Harga Tiket</span>
                        <div style="text-align:right; line-height:1.1;">
                            <span id="detailPrice" style="font-size:1.1rem; font-weight:900; color:#1a7a5e;"></span>
                            <span style="font-size:.68rem; color:#9ca3af; display:block;">/ orang</span>
                        </div>
                    </div>

                    <div style="margin-bottom:14px;">
                        <label style="display:block; font-size:.65rem; font-weight:700; color:#374151; letter-spacing:.6px; text-transform:uppercase; margin-bottom:7px;">Pilih Tanggal</label>
                        <div style="position:relative; display:flex; align-items:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2" style="position:absolute; left:11px; pointer-events:none; z-index:1;">
                                <rect x="3" y="4" width="18" height="18" rx="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <input type="date" id="detailDate" style="width:100%; padding:10px 12px 10px 34px; border:1.5px solid #d1d5db; border-radius:9px; font-size:.82rem; font-family:inherit; color:#374151; outline:none; background:#fff; box-sizing:border-box; transition:border-color .2s;"
                            onfocus="this.style.borderColor='#1a7a5e'"
                            onblur="this.style.borderColor='#d1d5db'">
                        </div>
                    </div>

                    <div style="margin-bottom:22px;">
                        <label style="display:block; font-size:.65rem; font-weight:700; color:#374151; letter-spacing:.6px; text-transform:uppercase; margin-bottom:7px;">Jumlah</label>
                        <div style="display:inline-flex; align-items:center; border:1.5px solid #d1d5db; border-radius:9px; overflow:hidden; background:#fff;">
                            <button onclick="changeQty(-1)" style="width:40px; height:40px; border:none; background:#f9fafb; font-size:1.15rem; cursor:pointer; color:#374151; font-weight:700; line-height:1; transition:background .15s; border-right:1.5px solid #e5e7eb;"
                                onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='#f9fafb'">−</button>
                            <span id="detailQty" style="min-width:44px; text-align:center; font-size:.95rem; font-weight:800; color:#111827;">02</span>
                            <button onclick="changeQty(1)" style="width:40px; height:40px; border:none; background:#f9fafb; font-size:1.15rem; cursor:pointer; color:#374151; font-weight:700; line-height:1; transition:background .15s; border-left:1.5px solid #e5e7eb;"
                                onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='#f9fafb'">+</button>
                        </div>
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; padding:10px 16px; background:#f9fafb; border-radius:9px; border:1px dashed #d1d5db;">
                        <span style="font-size:.75rem; color:#6b7280; font-weight:500;">Total</span>
                        <span id="detailTotal" style="font-size:1rem; font-weight:900; color:#111827;"></span>
                    </div>

                    <button onclick="handlePesan()" style="
                        width:100%; padding:13px;
                        background:#1a4a2e; color:#fff;
                        border:none; border-radius:11px;
                        font-size:.9rem; font-weight:800;
                        font-family:inherit; cursor:pointer;
                        margin-bottom:10px;
                        transition:background .2s, transform .15s, box-shadow .2s;
                        letter-spacing:.2px;
                        box-shadow:0 4px 14px rgba(26,74,46,.25);
                    " onmouseover="this.style.background='#143820';this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 20px rgba(26,74,46,.35)'"
                       onmouseout="this.style.background='#1a4a2e';this.style.transform='translateY(0)';this.style.boxShadow='0 4px 14px rgba(26,74,46,.25)'">
                        Pesan Sekarang
                    </button>

                    <button id="btnLihatLokasi" style="
                        width:100%; padding:12px;
                        background:#fef3c7; color:#92400e;
                        border:none; border-radius:11px;
                        font-size:.86rem; font-weight:700;
                        font-family:inherit; cursor:pointer;
                        display:flex; align-items:center; justify-content:center; gap:7px;
                        transition:background .2s, transform .15s;
                    " onmouseover="this.style.background='#fde68a';this.style.transform='translateY(-1px)'"
                       onmouseout="this.style.background='#fef3c7';this.style.transform='translateY(0)'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#92400e" stroke-width="2.2">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                            <circle cx="12" cy="9" r="2.5"/>
                        </svg>
                        Lihat Lokasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeInModal { from{opacity:0} to{opacity:1} }
input[type="date"]::-webkit-calendar-picker-indicator { opacity:1; position:absolute; right:10px; cursor:pointer; }
input[type="date"]::-webkit-inner-spin-button { display:none; }
input[type="date"]::-ms-clear { display:none; }
#detailCard.card-visible { opacity:1 !important; transform:translateY(0) !important; }
@keyframes shimmer { 0%{background-position:-600px 0} 100%{background-position:600px 0} }
.img-loading { background:linear-gradient(90deg,#e5e7eb 25%,#f3f4f6 50%,#e5e7eb 75%); background-size:600px 100%; animation:shimmer 1.4s infinite; }
</style>

@php
    $wisataData = $wisata->map(function ($item) {
        $fotoUtama = asset('uploads/wisata/' . $item->image);

        $galeri = $item->galeri->map(function ($g) {
            return asset('uploads/galeri_wisata/' . $g->gambar);
        })->values()->toArray();

        return [
            'id' => $item->id_wisata,
            'nama' => $item->name,
            'kategori' => 'Wisata',
            'deskripsi' => $item->description,
            'harga' => (int) $item->price,
            'foto' => $fotoUtama,
            'lokasi' => $item->location_name,
            'lat' => $item->latitude,
            'lng' => $item->longitude,
            'galeri' => count($galeri) ? $galeri : [$fotoUtama],
        ];
    })->values();
@endphp

<script>
const DATA = @json($wisataData);

let currentQty = 2;
let currentHarga = 0;
let currentPhotos = [];
let selectedWisata = null;

function openModalFromBtn(btn) {
    const title = btn.getAttribute('data-title');
    const w = DATA.find(x => x.nama === title);

    if (!w) {
        alert('Data wisata tidak ditemukan.');
        return;
    }

    selectedWisata = w;

    const data = {
        breadcrumb: w.nama,
        lat: w.lat,
        lng: w.lng,
        badges: [{ label: w.kategori, color: "#1a7a5e" }],
        desc: w.deskripsi,
        harga: w.harga,
        foto: w.foto,
        thumb1: w.galeri?.[0] || w.foto,
        thumb2: w.galeri?.[1] || w.foto,
        allPhotos: w.galeri?.length ? w.galeri : [w.foto],
        mapsUrl: w.lat && w.lng
            ? `https://www.google.com/maps/search/?api=1&query=${w.lat},${w.lng}`
            : "https://www.google.com/maps/search/?api=1&query=" + encodeURIComponent(w.nama + " " + (w.lokasi || "Jember"))
    };

    document.getElementById('detailTitle').textContent = title;
    document.getElementById('detailBreadcrumb').textContent = data.breadcrumb;
    document.getElementById('detailDesc').textContent = data.desc;

    document.getElementById('detailBadges').innerHTML = data.badges.map(b =>
        `<span style="background:${b.color};color:#fff;font-size:.62rem;font-weight:700;padding:3px 10px;border-radius:50px;">${b.label}</span>`
    ).join('');

    currentHarga = data.harga;
    document.getElementById('detailPrice').textContent =
        data.harga === 0 ? 'Gratis' : 'Rp ' + data.harga.toLocaleString('id-ID');

    document.getElementById('detailMainImg').src = data.foto;
    document.getElementById('detailThumbImg1').src = data.thumb1;
    document.getElementById('detailThumbImg2').src = data.thumb2;
    currentPhotos = data.allPhotos;

    document.getElementById('btnLihatLokasi').onclick = () => window.open(data.mapsUrl, '_blank');

    currentQty = 2;
    updateQtyDisplay();
    document.getElementById('detailDate').value = '';

    const slide = document.getElementById('detailSlide');
    const card = document.getElementById('detailCard');

    card.classList.remove('card-visible');
    slide.style.display = 'block';
    document.body.style.overflow = 'hidden';

    requestAnimationFrame(() => requestAnimationFrame(() => {
        slide.style.transform = 'translateX(0)';
        setTimeout(() => card.classList.add('card-visible'), 180);
    }));
}

function closeDetailSlide() {
    const slide = document.getElementById('detailSlide');
    const card = document.getElementById('detailCard');
    card.classList.remove('card-visible');
    slide.style.transform = 'translateX(100%)';
    document.body.style.overflow = '';
    setTimeout(() => { slide.style.display = 'none'; }, 420);
}

function openGallery() {
    const modal = document.getElementById('galleryModal');
    const thumbsEl = document.getElementById('galleryThumbs');
    const mainSrc = document.getElementById('detailMainImg').src;
    document.getElementById('galleryBigImg').src = mainSrc;
    thumbsEl.innerHTML = currentPhotos.map((src, i) =>
        `<img src="${src}" alt="Foto ${i+1}" onclick="setGalleryBig('${src}', this)"
            style="width:72px;height:56px;object-fit:cover;border-radius:8px;cursor:pointer;border:2.5px solid ${src===mainSrc?'#1a7a5e':'transparent'};transition:border-color .2s,transform .2s;opacity:${src===mainSrc?'1':'.7'};"
            onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">`
    ).join('');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function setGalleryBig(src, thumbEl) {
    document.getElementById('galleryBigImg').src = src;
    document.querySelectorAll('#galleryThumbs img').forEach(img => { img.style.borderColor='transparent'; img.style.opacity='.7'; });
    thumbEl.style.borderColor = '#1a7a5e';
    thumbEl.style.opacity = '1';
}

function closeGallery() {
    document.getElementById('galleryModal').style.display = 'none';
    if (document.getElementById('detailSlide').style.display === 'block') {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
}

function switchMainImg(thumbImg) {
    const mainImg = document.getElementById('detailMainImg');
    const tmp = mainImg.src;
    mainImg.src = thumbImg.src;
    thumbImg.src = tmp;
    mainImg.style.transform = 'scale(1.03)';
    setTimeout(() => mainImg.style.transform = 'scale(1)', 300);
}

function changeQty(delta) {
    currentQty = Math.max(1, currentQty + delta);
    updateQtyDisplay();
}

function updateQtyDisplay() {
    document.getElementById('detailQty').textContent = String(currentQty).padStart(2, '0');
    const totalEl = document.getElementById('detailTotal');
    if (currentHarga === 0) {
        totalEl.textContent = 'Gratis';
    } else {
        totalEl.textContent = 'Rp ' + (currentHarga * currentQty).toLocaleString('id-ID');
    }
}

function openDetailById(btn) {
    const id = btn.getAttribute('data-id');
    const wisata = DATA.find(item => String(item.id) === String(id));

    if (!wisata) {
        alert('Data wisata tidak ditemukan.');
        return;
    }

    selectedWisata = wisata;

    document.getElementById('detailTitle').textContent = wisata.nama;
    document.getElementById('detailBreadcrumb').textContent = wisata.nama;
    document.getElementById('detailDesc').textContent = wisata.deskripsi;

    document.getElementById('detailBadges').innerHTML = `
        <span style="background:#1a7a5e;color:#fff;font-size:.62rem;font-weight:700;padding:3px 10px;border-radius:50px;">
            Wisata
        </span>
    `;

    currentHarga = wisata.harga;
    currentPhotos = wisata.galeri?.length ? wisata.galeri : [wisata.foto];

    document.getElementById('detailPrice').textContent =
        wisata.harga === 0 ? 'Gratis' : 'Rp ' + wisata.harga.toLocaleString('id-ID');

    document.getElementById('detailMainImg').src = wisata.foto;
    document.getElementById('detailThumbImg1').src = currentPhotos[0] || wisata.foto;
    document.getElementById('detailThumbImg2').src = currentPhotos[1] || wisata.foto;

    document.getElementById('btnLihatLokasi').onclick = () => {
        const url = wisata.lat && wisata.lng
            ? `https://www.google.com/maps/search/?api=1&query=${wisata.lat},${wisata.lng}`
            : `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(wisata.nama + ' Jember')}`;

        window.open(url, '_blank');
    };

    currentQty = 2;
    updateQtyDisplay();
    document.getElementById('detailDate').value = '';

    const slide = document.getElementById('detailSlide');
    const card = document.getElementById('detailCard');

    card.classList.remove('card-visible');
    slide.style.display = 'block';
    document.body.style.overflow = 'hidden';

    requestAnimationFrame(() => requestAnimationFrame(() => {
        slide.style.transform = 'translateX(0)';
        setTimeout(() => card.classList.add('card-visible'), 180);
    }));
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        if (document.getElementById('galleryModal').style.display === 'flex') {
            closeGallery();
        } else {
            closeDetailSlide();
        }
    }
});

document.getElementById('galleryModal').addEventListener('click', function(e) {
    if (e.target === this) closeGallery();
});
</script>

{{-- ===== OVERLAY GELAP ===== --}}
<div id="paymentOverlay" onclick="closePayment()" style="
    display:none;
    position:fixed;
    top:0; left:0; right:0; bottom:0;
    background:rgba(0,0,0,0.45);
    z-index:99998;
    animation:overlayFadeIn .25s ease;
"></div>

{{-- ===== PAYMENT MODAL ===== --}}
<div id="paymentModal" style="
    display:none;
    position:fixed;
    top:50%; left:50%;
    transform:translate(-50%, -50%) scale(0.94);
    width:92%;
    max-width:940px;
    max-height:90vh;
    background:#fff;
    border-radius:20px;
    z-index:99999;
    overflow:hidden;
    box-shadow:0 30px 80px rgba(0,0,0,.22), 0 8px 24px rgba(0,0,0,.1);
    font-family:'Poppins', sans-serif;
    opacity:0;
    transition:opacity .28s ease, transform .28s cubic-bezier(0.34,1.56,0.64,1);
">
    <div style="display:flex; align-items:center; justify-content:space-between; padding:0 24px; height:52px; background:#fff; border-bottom:1px solid #e5e7eb; position:sticky; top:0; z-index:10;">
        <button onclick="closePayment()" style="display:flex;align-items:center;gap:6px;background:none;border:none;cursor:pointer;font-size:.82rem;color:#374151;font-family:inherit;padding:6px 8px;border-radius:8px;transition:background .15s;"
            onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </button>

        <span style="font-size:1.1rem;font-weight:900;color:#1a7a5e;letter-spacing:-.5px;">J-TRIP</span>

        <div style="display:flex;align-items:center;gap:6px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#6b7280" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0110 0v4"/>
            </svg>
            <span style="font-size:.72rem;font-weight:700;color:#6b7280;letter-spacing:.8px;">SECURE CHECKOUT</span>
        </div>
    </div>

    <div style="display:flex;overflow:hidden;min-height:520px;max-height:calc(90vh - 52px);">

        {{-- KOLOM KIRI: RINGKASAN HARGA --}}
        <div style="flex:1;padding:28px 32px;border-right:1px solid #f3f4f6;min-width:0;overflow-y:auto;">
            <h1 style="font-size:1.9rem;font-weight:900;color:#1a4a2e;margin:0 0 4px;letter-spacing:-.5px;">
                Ringkasan Pesanan
            </h1>

            <p style="font-size:.8rem;color:#6b7280;margin:0 0 26px;line-height:1.6;">
                Periksa kembali detail tiket sebelum melanjutkan pembayaran melalui Midtrans.
            </p>

            <div style="padding:18px;border:1.5px solid #e5e7eb;border-radius:14px;background:#fff;margin-bottom:18px;">
                <p style="font-size:.68rem;font-weight:800;color:#9ca3af;letter-spacing:.8px;text-transform:uppercase;margin:0 0 8px;">
                    Destinasi
                </p>
                <h3 id="payNamaDestinasiLeft" style="font-size:1.15rem;font-weight:900;color:#111827;margin:0;line-height:1.35;"></h3>
            </div>

            <div style="padding:18px;border:1.5px solid #e5e7eb;border-radius:14px;background:#fff;margin-bottom:18px;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;">
                    <div>
                        <p style="font-size:.68rem;font-weight:800;color:#9ca3af;letter-spacing:.8px;text-transform:uppercase;margin:0 0 5px;">
                            Tanggal Kunjungan
                        </p>
                        <p id="payTanggalLeft" style="font-size:.9rem;font-weight:800;color:#111827;margin:0;"></p>
                    </div>

                    <div style="width:38px;height:38px;border-radius:50%;background:#f0fdf4;display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="#1a7a5e" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                </div>

                <div style="height:1px;background:#f3f4f6;margin:14px 0;"></div>

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <div>
                        <p style="font-size:.68rem;font-weight:800;color:#9ca3af;letter-spacing:.8px;text-transform:uppercase;margin:0 0 5px;">
                            Jumlah Tiket
                        </p>
                        <p id="payJumlahLeft" style="font-size:.9rem;font-weight:800;color:#111827;margin:0;"></p>
                    </div>

                    <div style="width:38px;height:38px;border-radius:50%;background:#f0fdf4;display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="#1a7a5e" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                            <path d="M16 3.13a4 4 0 010 7.75"/>
                        </svg>
                    </div>
                </div>
            </div>
            

            <div style="padding:20px;border-radius:16px;background:#f0fdf4;border:1.5px solid #bbf7d0;margin-bottom:18px;">
                <div style="display:flex;justify-content:space-between;margin-bottom:12px;">
                    <span id="payLabelEntryLeft" style="font-size:.85rem;color:#374151;font-weight:600;">
                        Standard Entry
                    </span>
                    <span id="paySubtotalLeft" style="font-size:.85rem;color:#111827;font-weight:800;"></span>
                </div>

                <div style="display:flex;justify-content:space-between;margin-bottom:12px;">
                    <span style="font-size:.85rem;color:#374151;font-weight:600;">
                        Biaya Layanan
                    </span>
                    <span style="font-size:.85rem;color:#111827;font-weight:800;">
                        Rp 0
                    </span>
                </div>

                <div style="height:1px;background:#bbf7d0;margin:14px 0;"></div>

                <div style="display:flex;justify-content:space-between;align-items:flex-end;">
                    <span style="font-size:.95rem;color:#111827;font-weight:900;">
                        Total Pembayaran
                    </span>

                    <div style="text-align:right;">
                        <div id="payTotalLeft" style="font-size:1.65rem;font-weight:900;color:#1a7a5e;line-height:1;"></div>
                        <div style="font-size:.62rem;font-weight:800;color:#1a7a5e;letter-spacing:.6px;margin-top:5px;">
                            VIA MIDTRANS
                        </div>
                    </div>
                </div>
            </div>

            <div style="display:flex;gap:13px;align-items:flex-start;padding:14px 18px;background:#fff;border-radius:12px;border:1px solid #e5e7eb;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#1a7a5e" stroke-width="2" style="flex-shrink:0;margin-top:1px;">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <div>
                    <p style="font-size:.8rem;font-weight:800;color:#1a4a2e;margin:0 0 3px;">
                        Pembayaran Aman
                    </p>
                    <p style="font-size:.72rem;color:#6b7280;margin:0;line-height:1.5;">
                        Metode pembayaran akan dipilih langsung melalui popup Midtrans.
                    </p>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: VISUAL FULL --}}
        <div style="width:340px;flex-shrink:0;position:relative;display:flex;flex-direction:column;">
            <div style="position:absolute;inset:0;overflow:hidden;">
                <img id="payFotoDestinasi"
                     src=""
                     alt=""
                     style="width:100%;height:100%;object-fit:cover;object-position:center;display:block;"
                     onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&q=80'">
            </div>

            <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(0,0,0,.78) 0%, rgba(0,0,0,.25) 48%, rgba(0,0,0,.08) 100%);"></div>

            <div style="position:relative;z-index:2;display:flex;flex-direction:column;justify-content:space-between;height:100%;padding:24px;">
                <div>
                    <p style="font-size:.7rem;font-weight:700;color:rgba(255,255,255,.8);margin:0 0 6px;letter-spacing:.8px;text-transform:uppercase;">
                        Destinasi Pilihan
                    </p>
                    <h3 id="payNamaDestinasi" style="font-size:1.25rem;font-weight:900;color:#fff;margin:0;line-height:1.4;"></h3>
                </div>

                <div style="background:rgba(255,255,255,.13);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,.18);border-radius:16px;padding:18px;">
                    <p style="font-size:.72rem;color:rgba(255,255,255,.85);margin:0 0 14px;line-height:1.5;">
                        Lanjutkan pembayaran untuk menyelesaikan pemesanan tiket wisata Anda.
                    </p>

                    <button onclick="prosesPembayaranMidtrans()"
                        style="width:100%;padding:14px;background:#ffffff;color:#1a4a2e;border:none;border-radius:12px;font-size:.95rem;font-weight:900;font-family:inherit;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:.2s;">
                        Bayar Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#1a4a2e" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <p style="font-size:.65rem;color:rgba(255,255,255,.75);text-align:center;margin:10px 0 0;line-height:1.5;">
                        Anda akan diarahkan ke popup pembayaran Midtrans.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== PAYMENT STEPS MODAL (muncul setelah klik Bayar Sekarang) ===== --}}
<div id="stepsOverlay" onclick="closeSteps()" style="
    display:none;
    position:fixed;
    top:0; left:0; right:0; bottom:0;
    background:rgba(0,0,0,0.45);
    backdrop-filter: blur(4px);
    z-index:199997;
    animation:overlayFadeIn .2s ease;
"></div>

<div id="stepsModal" style="
    display:none;
    position:fixed;
    top:50%; left:50%;
    transform:translate(-50%, -50%) scale(0.96);
    width:90%;
    max-width:720px; /* FIX: biar gak kegedean */
    max-height:90vh;
    background:#fff;
    border-radius:16px; /* lebih clean */
    z-index:199999;
    overflow:hidden;
    box-shadow:0 20px 60px rgba(0,0,0,.25);
    font-family:'Poppins', sans-serif;
    opacity:0;
    transition:all .25s ease;
">
    {{-- Header --}}
   <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 18px;border-bottom:1px solid #f1f5f9;"><div>
            <p style="font-size:.65rem;font-weight:700;color:#9ca3af;letter-spacing:.8px;text-transform:uppercase;margin:0 0 3px;">Panduan Pembayaran</p>
            <h3 id="stepsTitle" style="font-size:1.05rem;font-weight:800;color:#1a4a2e;margin:0;"></h3>
        </div>
        <button onclick="closeSteps()" style="background:#f3f4f6;border:none;cursor:pointer;width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.9rem;color:#6b7280;transition:background .15s;"
            onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">✕</button>
    </div>

    {{-- Badge metode --}}
    <div style="padding:12px 18px 0;">
        <div id="stepsBadge" style="display:inline-flex;align-items:center;gap:7px;padding:6px 14px;border-radius:50px;font-size:.75rem;font-weight:700;"></div>
    </div>

    {{-- Steps --}}
    <div id="stepsContent" style="
    padding:18px 22px 24px;
    overflow-y:auto;
    max-height:calc(90vh - 120px);"></div>
</div>

<style>
@keyframes overlayFadeIn { from{opacity:0} to{opacity:1} }
.pay-option:hover { border-color:#1a7a5e !important; background:#f0fdf4 !important; transform:translateY(-1px); }
.pay-active { border-color:#1a7a5e !important; background:#f0fdf4 !important; }

.step-item {
    display:flex;
    gap:12px;
    align-items:flex-start;
    padding:14px 0;
    border-bottom:1px solid #f1f5f9;
}

.step-num {
    width:26px;
    height:26px;
    border-radius:50%;
    background:#166534; /* lebih soft */
    color:#fff;
    font-size:.72rem;
    font-weight:700;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    margin-top:2px;
}

.step-text {
    font-size:.8rem;
    color:#374151;
    line-height:1.55;
}

.step-text strong {
    color:#111827;
    display:block;
    margin-bottom:3px;
    font-size:.82rem;
    font-weight:700;
}

.step-note {
    margin-top:14px;
    padding:12px;
    background:#fffbeb;
    border-radius:10px;
    border:1px solid #fde68a;
    font-size:.75rem;
    color:#92400e;
    line-height:1.5;
}

#stepsModal.show {
    opacity:1;
    transform:translate(-50%, -50%) scale(1);
}
</style>

<script>
/* ============================================================
   DATA LANGKAH PEMBAYARAN
============================================================ */
    let payState = {
    idWisata: '',
    namaDestinasi: '',
    foto: '',
    tanggal: '',
    qty: 2,
    harga: 0,
};

const IS_LOGGED_IN = @json(Auth::check());
const LOGIN_URL = "{{ url('/login') }}";

function openPayment(data) {
    payState = {
        idWisata: data.idWisata,
        namaDestinasi: data.namaDestinasi,
        foto: data.foto,
        tanggal: data.tanggal,
        qty: data.qty,
        harga: data.harga,
    };

    const tgl = new Date(data.tanggal + 'T00:00:00');
    const bulanIndo = [
        'Januari','Februari','Maret','April','Mei','Juni',
        'Juli','Agustus','September','Oktober','November','Desember'
    ];

    const tglFormatted = `${tgl.getDate()} ${bulanIndo[tgl.getMonth()]} ${tgl.getFullYear()}`;
    const subtotal = data.harga * data.qty;
    const subtotalText = data.harga === 0
        ? 'Gratis'
        : 'Rp ' + subtotal.toLocaleString('id-ID');

    const setText = (id, value) => {
        const el = document.getElementById(id);
        if (el) el.textContent = value;
    };

    const setSrc = (id, value) => {
        const el = document.getElementById(id);
        if (el) el.src = value;
    };

    setText('payNamaDestinasi', data.namaDestinasi);
    setSrc('payFotoDestinasi', data.foto);

    setText('payNamaDestinasiLeft', data.namaDestinasi);
    setText('payTanggalLeft', tglFormatted);
    setText('payJumlahLeft', data.qty + ' orang');
    setText('payLabelEntryLeft', `Standard Entry (x${data.qty})`);
    setText('paySubtotalLeft', subtotalText);
    setText('payTotalLeft', subtotalText);

    const overlay = document.getElementById('paymentOverlay');
    const modal = document.getElementById('paymentModal');

    if (!overlay || !modal) {
        alert('Modal pembayaran tidak ditemukan.');
        return;
    }

    overlay.style.display = 'block';
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';

    requestAnimationFrame(() => requestAnimationFrame(() => {
        modal.style.opacity = '1';
        modal.style.transform = 'translate(-50%, -50%) scale(1)';
    }));
}

function closePayment() {
    const overlay = document.getElementById('paymentOverlay');
    const modal = document.getElementById('paymentModal');

    if (!overlay || !modal) return;

    modal.style.opacity = '0';
    modal.style.transform = 'translate(-50%, -50%) scale(0.94)';
    overlay.style.display = 'none';
    document.body.style.overflow = '';

    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}

function prosesPembayaranMidtrans() {
    if (!IS_LOGGED_IN) {
    alert('Silakan login atau register terlebih dahulu untuk membeli tiket.');
    window.location.href = LOGIN_URL;
    return;
}
    if (!payState.idWisata) {
        alert('Data wisata tidak ditemukan.');
        return;
    }

    if (!payState.tanggal) {
        alert('Tanggal kunjungan belum dipilih.');
        return;
    }

    console.log('Checkout data:', {
        id_wisata: payState.idWisata,
        tanggal_kunjungan: payState.tanggal,
        jumlah_pengunjung: payState.qty,
        metode_pembayaran: 'Midtrans Snap'
    });

    fetch("/checkout/midtrans", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id_wisata: payState.idWisata,
            tanggal_kunjungan: payState.tanggal,
            jumlah_pengunjung: payState.qty,
            metode_pembayaran: 'Midtrans Snap'
        })
    })
    .then(async response => {
        const text = await response.text();

        console.log('HTTP Status:', response.status);
        console.log('Raw response:', text);

        let result;

        try {
            result = JSON.parse(text);
        } catch (e) {
            alert('Server tidak mengembalikan JSON. Cek Console browser.');
            throw new Error(text);
        }

        if (!response.ok) {
            alert(result.message || 'Checkout gagal. Status: ' + response.status);
            throw new Error(result.message || text);
        }

        return result;
    })
    .then(result => {
        console.log('Checkout result:', result);

        if (!result.success) {
            alert(result.message || 'Gagal membuat pembayaran.');
            return;
        }

        if (!result.snap_token) {
            alert('Snap token kosong. Cek MidtransController.');
            console.error('Snap token kosong:', result);
            return;
        }

        snap.pay(result.snap_token, {
            onSuccess: function(midtransResult) {
                console.log('Midtrans success:', midtransResult);
                alert('Pembayaran berhasil! Status akan diproses otomatis.');
                window.location.href = "{{ url('/wisata') }}";
            },
            onPending: function(midtransResult) {
                console.log('Midtrans pending:', midtransResult);
                alert('Pembayaran masih pending. Silakan selesaikan pembayaran.');
                window.location.href = "{{ url('/wisata') }}";
            },
            onError: function(midtransResult) {
                console.error('Midtrans error:', midtransResult);
                alert('Pembayaran gagal.');
            },
            onClose: function() {
                alert('Popup pembayaran ditutup sebelum selesai.');
            }
        });
    })
    .catch(error => {
        console.error('Checkout error:', error);
        alert('Terjadi kesalahan saat memproses pembayaran. Buka Console untuk lihat detail error.');
    });
}

    function closeSteps() {
        const stepsModal = document.getElementById('stepsModal');
        const stepsOverlay = document.getElementById('stepsOverlay');
        stepsModal.style.opacity = '0';
        stepsModal.style.transform = 'translate(-50%, -50%) scale(0.93)';
        stepsOverlay.style.display = 'none';
        setTimeout(() => { stepsModal.style.display = 'none'; }, 250);
    }

    function handlePesan() {
    const date = document.getElementById('detailDate').value;

    if (!date) {
        alert('Silakan pilih tanggal terlebih dahulu.');
        return;
    }

    if (!selectedWisata || !selectedWisata.id) {
        alert('Data wisata tidak ditemukan.');
        return;
    }

    openPayment({
        idWisata: selectedWisata.id,
        namaDestinasi: selectedWisata.nama,
        foto: document.getElementById('detailMainImg').src,
        tanggal: date,
        qty: currentQty,
        harga: currentHarga
    });
}

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (document.getElementById('stepsModal').style.display === 'block') {
                closeSteps();
            } else if (document.getElementById('paymentModal').style.display === 'block') {
                closePayment();
            }
        }
    });
    </script>

        </body>
        </html>
