<!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>J-TRIP - Jelajahi Wisata Terbaik di Jember</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    </head>
    <body>

        {{-- ===== NAVBAR ===== --}}
        <nav class="navbar" id="navbar">
            <div class="nav-container">
                <a href="#" class="nav-logo">J-TRIP</a>
                <ul class="nav-menu">
                <li><a href="#beranda" class="nav-link active">Beranda</a></li>
                <li><a href="#destinasi" class="nav-link">Wisata</a></li>
                <li><a href="#tentang" class="nav-link">Tentang</a></li>
            </ul>
                <div class="nav-auth">
                <a href="#" class="btn-login">Login</a>
                    <a href="#" class="btn-register">Register</a>
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

            <!-- CARD 1 -->
            <div class="dest-card">
                <div class="dest-img-wrap">
                    <img src="{{ asset('assets/images/pantai-papuma.jpg') }}">
                    <span class="dest-badge">Pantai</span>
                </div>
                <div class="dest-info">
                    <h3>Pantai Papuma</h3>
                    <p>Papuma adalah singkatan dari Pasir Putih Malikan, sebuah destinasi wisata pantai ikonik di Kabupaten Jember, Jawa Timur.</p>
                    <div class="dest-footer">
                        <span class="dest-price">Rp 15.000</span>
                        <button class="btn-dest"
                            data-title="Pantai Papuma"
                            data-desc="Papuma adalah singkatan dari Pasir Putih Malikan, sebuah destinasi wisata pantai ikonik di Kabupaten Jember, Jawa Timur."
                            data-img="{{ asset('assets/images/pantai-papuma.jpg') }}"
                            data-price="15000"
                            onclick="openModalFromBtn(this)">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="dest-card">
                <div class="dest-img-wrap">
                    <img src="{{ asset('assets/images/kebun-teh-gambir.jpg') }}">
                    <span class="dest-badge">Alam</span>
                </div>
                <div class="dest-info">
                    <h3>Kebun Teh Gambir</h3>
                    <p>Nikmati kesejukan udara di pegunungan di hamparan kebun teh peninggalan kolonial dengan jembatan.</p>
                    <div class="dest-footer">
                        <span class="dest-price">Rp 10.000</span>
                        <button class="btn-dest"
                            data-title="Kebun Teh Gambir"
                            data-desc="Nikmati kesejukan udara di pegunungan di hamparan kebun teh peninggalan kolonial dengan jembatan."
                            data-img="{{ asset('assets/images/kebun-teh-gambir.jpg') }}"
                            data-price="10000"
                            onclick="openModalFromBtn(this)">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="dest-card">
                <div class="dest-img-wrap">
                    <img src="{{ asset('assets/images/air-terjun-tancak.jpg') }}">
                    <span class="dest-badge">Air Terjun</span>
                </div>
                <div class="dest-info">
                    <h3>Air Terjun Tancak</h3>
                    <p>Air terjun tertinggi di Jember tersembunyi di kaki Gunung Argopuro, dikelilingi hutan kopi asri.</p>
                    <div class="dest-footer">
                        <span class="dest-price">Rp 5.000</span>
                        <button class="btn-dest"
                            data-title="Air Terjun Tancak"
                            data-desc="Air terjun tertinggi di Jember tersembunyi di kaki Gunung Argopuro, dikelilingi hutan kopi asri."
                            data-img="{{ asset('assets/images/air-terjun-tancak.jpg') }}"
                            data-price="5000"
                            onclick="openModalFromBtn(this)">
                            Lihat Detail
                        </button>
                    </div>
                </div>
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

        <script src="{{ asset('js/landing.js') }}"></script>

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

<script>
const detailData = {
    "Pantai Papuma": {
        breadcrumb: "Pantai Tanjung Papuma",
        lat: -8.432678, lng: 113.549728,
        badges: [{label:"Pantai", color:"#16a34a"},{label:"Conservation", color:"#0284c7"}],
        desc: "Papuma adalah singkatan dari Pasir Putih Malikan, sebuah destinasi wisata pantai ikonik di Kabupaten Jember, Jawa Timur. Nama ini menggambarkan karakteristik pantai yang memiliki pasir putih bersih dan keunikan batu karang yang seolah 'terbolak-balik' (Malikan). Papuma dikenal karena pemandangan matahari terbit, gugusan karang raksasa, dan hutan tropis di sekitarnya.",
        harga: 15000,
        foto: "{{ asset('assets/images/pantai-papuma.jpg') }}",
        thumb1: "{{ asset('assets/images/pantai-papuma.jpg') }}",
        thumb2: "{{ asset('assets/images/pantai-watu-ulo.jpg') }}",
        allPhotos: [
            "{{ asset('assets/images/pantai-papuma.jpg') }}",
            "{{ asset('assets/images/pantai-watu-ulo.jpg') }}",
            "{{ asset('assets/images/papuma.jpg') }}"
        ],
        mapsUrl: "https://www.google.com/maps/search/?api=1&query=Pantai+Papuma+Jember+-8.432678,113.549728"
    },
    "Kebun Teh Gambir": {
        breadcrumb: "Kebun Teh Gunung Gambir",
        lat: -8.035202, lng: 113.441566,
        badges: [{label:"Alam", color:"#16a34a"},{label:"Pegunungan", color:"#7c3aed"}],
        desc: "Nikmati kesejukan udara di pegunungan di hamparan kebun teh peninggalan kolonial dengan jembatan. Kebun teh peninggalan kolonial Belanda ini menawarkan pemandangan yang menakjubkan dengan jalur trekking yang menyenangkan bagi para wisatawan.",
        harga: 10000,
        foto: "{{ asset('assets/images/kebun-teh-gambir.jpg') }}",
        thumb1: "{{ asset('assets/images/kebun-teh-gambir.jpg') }}",
        thumb2: "{{ asset('assets/images/rembangan.jpg') }}",
        allPhotos: [
            "{{ asset('assets/images/kebun-teh-gambir.jpg') }}",
            "{{ asset('assets/images/rembangan.jpg') }}"
        ],
        mapsUrl: "https://www.google.com/maps/search/?api=1&query=Kebun+Teh+Gunung+Gambir+-8.035202,113.441566"
    },
    "Air Terjun Tancak": {
        breadcrumb: "Air Terjun Tancak",
        lat: -8.064874, lng: 113.618942,
        badges: [{label:"Air Terjun", color:"#0891b2"},{label:"Alam", color:"#16a34a"}],
        desc: "Air terjun tertinggi di Jember tersembunyi di kaki Gunung Argopuro, dikelilingi hutan kopi asri. Air terjun bertingkat yang spektakuler ini dikelilingi hutan tropis yang lebat, menawarkan keindahan alam yang masih alami dan udara yang sejuk menyegarkan.",
        harga: 5000,
        foto: "{{ asset('assets/images/air-terjun-tancak.jpg') }}",
        thumb1: "{{ asset('assets/images/air-terjun-tancak.jpg') }}",
        thumb2: "{{ asset('assets/images/air-terjun-antrokan.jpg') }}",
        allPhotos: [
            "{{ asset('assets/images/air-terjun-tancak.jpg') }}",
            "{{ asset('assets/images/air-terjun-antrokan.jpg') }}"
        ],
        mapsUrl: "https://www.google.com/maps/search/?api=1&query=Air+Terjun+Tancak+-8.064874,113.618942"
    }
};

let currentQty = 2;
let currentHarga = 0;
let currentPhotos = [];

function openModalFromBtn(btn) {
    const title = btn.getAttribute('data-title');
    const data = detailData[title];
    if (!data) return;

    document.getElementById('detailTitle').textContent = title;
    document.getElementById('detailBreadcrumb').textContent = data.breadcrumb;
    document.getElementById('detailDesc').textContent = data.desc;

    const badgeEl = document.getElementById('detailBadges');
    badgeEl.innerHTML = (data.badges || []).map(b =>
        `<span style="background:${b.color};color:#fff;font-size:.62rem;font-weight:700;padding:3px 10px;border-radius:50px;letter-spacing:.3px;box-shadow:0 2px 6px rgba(0,0,0,.18);">${b.label}</span>`
    ).join('');

    currentHarga = data.harga;
    document.getElementById('detailPrice').textContent = data.harga === 0 ? 'Gratis' : 'Rp ' + data.harga.toLocaleString('id-ID');
    document.getElementById('detailMainImg').src = data.foto;
    document.getElementById('detailThumbImg1').src = data.thumb1;
    document.getElementById('detailThumbImg2').src = data.thumb2;
    currentPhotos = data.allPhotos || [data.foto, data.thumb1, data.thumb2];

    document.getElementById('btnLihatLokasi').onclick = () => {
        const url = `https://www.google.com/maps/search/?api=1&query=${data.breadcrumb}+${data.lat},${data.lng}`;
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
    width:92%; max-width:920px;
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

    <div style="display:flex; overflow-y:auto; max-height:calc(90vh - 52px);">

        {{-- KOLOM KIRI: METODE PEMBAYARAN --}}
        <div style="flex:1; padding:28px 32px; border-right:1px solid #f3f4f6; min-width:0;">
            <h1 style="font-size:1.9rem;font-weight:900;color:#1a4a2e;margin:0 0 4px;letter-spacing:-.5px;">Pembayaran</h1>
            <p style="font-size:.8rem;color:#6b7280;margin:0 0 26px;">Ayo selesaikan pembayaranmu untuk segera menikmati liburan!</p>

            <div style="display:flex;align-items:center;gap:9px;margin-bottom:14px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#374151" stroke-width="1.8">
                    <rect x="2" y="7" width="20" height="14" rx="2"/>
                    <path d="M16 3H8L2 7h20l-6-4z"/>
                </svg>
                <span style="font-size:.95rem;font-weight:800;color:#111827;">Metode Pembayaran</span>
            </div>

            {{-- VIRTUAL ACCOUNT --}}
            <div style="border:1.5px solid #e5e7eb;border-radius:12px;margin-bottom:10px;overflow:hidden;">
                <div onclick="toggleAccordion('va')" style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px;cursor:pointer;background:#fff;transition:background .15s;"
                    onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='#fff'">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#374151" stroke-width="1.8">
                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                            <path d="M3 9h18"/><path d="M9 21V9"/>
                        </svg>
                        <span style="font-size:.88rem;font-weight:600;color:#374151;">Virtual Account</span>
                    </div>
                    <svg id="vaChevron" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2" style="transition:transform .25s;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <div id="vaContent" style="padding:6px 18px 18px;display:flex;gap:10px;flex-wrap:wrap;border-top:1px solid #f3f4f6;background:#fff;">
                    <div onclick="selectPayment(this, 'BCA VA')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                        <span style="font-size:.62rem;font-weight:800;color:#1a7a5e;letter-spacing:.3px;display:block;">BCA</span>
                        <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">BCA VA</span>
                    </div>
                    <div onclick="selectPayment(this, 'BNI VA')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                        <span style="font-size:.62rem;font-weight:800;color:#e65c00;letter-spacing:.3px;display:block;">BNI</span>
                        <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">BNI VA</span>
                    </div>
                    <div onclick="selectPayment(this, 'BRI VA')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                        <span style="font-size:.62rem;font-weight:800;color:#1655a2;letter-spacing:.3px;display:block;">BRI</span>
                        <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">BRI VA</span>
                    </div>
                    <div onclick="selectPayment(this, 'Mandiri Bill')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                        <span style="font-size:.62rem;font-weight:800;color:#f5a623;letter-spacing:.3px;display:block;">Mandiri</span>
                        <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">Mandiri Bill</span>
                    </div>
                </div>
            </div>

            {{-- E-WALLET & QRIS --}}
            <div style="border:1.5px solid #e5e7eb;border-radius:12px;margin-bottom:10px;overflow:hidden;">
                <div onclick="toggleAccordion('ewallet')" style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px;cursor:pointer;background:#fff;transition:background .15s;"
                    onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='#fff'">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#374151" stroke-width="1.8">
                            <rect x="2" y="5" width="20" height="14" rx="2"/>
                            <path d="M16 13a1 1 0 100-2 1 1 0 000 2z" fill="#374151"/>
                        </svg>
                        <span style="font-size:.88rem;font-weight:600;color:#374151;">E-Wallet & QRIS</span>
                    </div>
                    <svg id="ewalletChevron" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2" style="transition:transform .25s;transform:rotate(-90deg);">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <div id="ewalletContent" style="display:none;padding:14px 18px;border-top:1px solid #f3f4f6;">
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        <div onclick="selectPayment(this, 'GoPay')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                            <span style="font-size:.62rem;font-weight:800;color:#00aed6;display:block;">GoPay</span>
                            <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">GoPay</span>
                        </div>
                        <div onclick="selectPayment(this, 'OVO')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                            <span style="font-size:.62rem;font-weight:800;color:#4c3494;display:block;">OVO</span>
                            <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">OVO</span>
                        </div>
                        <div onclick="selectPayment(this, 'QRIS')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                            <span style="font-size:.62rem;font-weight:800;color:#e11d48;display:block;">QRIS</span>
                            <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">Scan QR</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CREDIT / DEBIT CARD --}}
            <div style="border:1.5px solid #e5e7eb;border-radius:12px;margin-bottom:22px;overflow:hidden;">
                <div onclick="toggleAccordion('card')" style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px;cursor:pointer;background:#fff;transition:background .15s;"
                    onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='#fff'">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#374151" stroke-width="1.8">
                            <rect x="2" y="5" width="20" height="14" rx="2"/>
                            <path d="M2 10h20"/>
                        </svg>
                        <span style="font-size:.88rem;font-weight:600;color:#374151;">Credit / Debit Card</span>
                    </div>
                    <svg id="cardChevron" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2" style="transition:transform .25s;transform:rotate(-90deg);">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <div id="cardContent" style="display:none;padding:14px 18px;border-top:1px solid #f3f4f6;">
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        <div onclick="selectPayment(this, 'Visa')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                            <span style="font-size:.62rem;font-weight:900;color:#1a1f71;display:block;letter-spacing:1px;">VISA</span>
                            <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">Visa</span>
                        </div>
                        <div onclick="selectPayment(this, 'Mastercard')" class="pay-option" style="padding:10px 14px;border-radius:10px;border:2px solid #e5e7eb;background:#fff;cursor:pointer;text-align:center;min-width:74px;transition:all .2s;">
                            <span style="font-size:.62rem;font-weight:800;color:#eb001b;display:block;">MC</span>
                            <span style="font-size:.7rem;color:#6b7280;margin-top:2px;display:block;">Mastercard</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display:flex;gap:13px;align-items:flex-start;padding:14px 18px;background:#f0fdf4;border-radius:12px;border:1px solid #bbf7d0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#1a7a5e" stroke-width="2" style="flex-shrink:0;margin-top:1px;">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <div>
                    <p style="font-size:.8rem;font-weight:700;color:#1a4a2e;margin:0 0 3px;">Secure Transaction</p>
                    <p style="font-size:.72rem;color:#6b7280;margin:0;line-height:1.5;">Your payment information is encrypted and processed securely. We never store your card details on our servers.</p>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: RINGKASAN --}}
        <div style="width:320px;flex-shrink:0;display:flex;flex-direction:column;">
            <div style="position:relative;height:160px;background:#c8e0d8;overflow:hidden;">
                <img id="payFotoDestinasi" src="" alt="" style="width:100%;height:100%;object-fit:cover;display:block;">
                <div style="position:absolute;bottom:0;left:0;right:0;background:linear-gradient(to top,rgba(0,0,0,.65) 0%,transparent 100%);padding:22px 18px 14px;">
                    <p style="font-size:.62rem;font-weight:700;color:rgba(255,255,255,.7);margin:0 0 2px;letter-spacing:.8px;text-transform:uppercase;">Destinasi Pilihan</p>
                    <p id="payNamaDestinasi" style="font-size:1.05rem;font-weight:800;color:#fff;margin:0;"></p>
                </div>
            </div>

            <div style="padding:20px 20px 0;flex:1;">
                <div style="display:flex;gap:20px;margin-bottom:20px;padding-bottom:18px;border-bottom:1px solid #f3f4f6;">
                    <div>
                        <p style="font-size:.6rem;font-weight:700;color:#9ca3af;letter-spacing:.8px;text-transform:uppercase;margin:0 0 5px;">Tanggal</p>
                        <div style="display:flex;align-items:center;gap:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="#374151" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <span id="payTanggal" style="font-size:.82rem;font-weight:700;color:#111827;"></span>
                        </div>
                    </div>
                    <div>
                        <p style="font-size:.6rem;font-weight:700;color:#9ca3af;letter-spacing:.8px;text-transform:uppercase;margin:0 0 5px;">Waktu</p>
                        <div style="display:flex;align-items:center;gap:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="#374151" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 6v6l4 2"/>
                            </svg>
                            <span style="font-size:.82rem;font-weight:700;color:#111827;">08:00 AM</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom:18px;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:10px;">
                        <span id="payLabelEntry" style="font-size:.82rem;color:#374151;">Standard Entry (x2)</span>
                        <span id="paySubtotal" style="font-size:.82rem;font-weight:700;color:#111827;"></span>
                    </div>
                    <div style="display:flex;justify-content:space-between;margin-bottom:10px;">
                        <span style="font-size:.82rem;color:#374151;">Local Guide Svc</span>
                        <span style="font-size:.82rem;font-weight:700;color:#111827;">Rp 0</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <span style="font-size:.75rem;color:#9ca3af;">Service Fee & Tax</span>
                        <span style="font-size:.75rem;color:#9ca3af;">Rp 0</span>
                    </div>
                </div>

                <div style="border-top:1.5px solid #f3f4f6;margin-bottom:16px;"></div>
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
                    <span style="font-size:.88rem;font-weight:700;color:#111827;">Total Pembayaran</span>
                    <div style="text-align:right;line-height:1.1;">
                        <div id="payTotal" style="font-size:1.45rem;font-weight:900;color:#1a7a5e;"></div>
                        <div style="font-size:.6rem;font-weight:700;color:#1a7a5e;letter-spacing:.5px;">ALL INCLUSIVE</div>
                    </div>
                </div>
            </div>

            <div style="padding:0 20px 20px;">
                <button onclick="prosespembayaran()" style="
                    width:100%;padding:14px;
                    background:#1a4a2e;color:#fff;
                    border:none;border-radius:12px;
                    font-size:.92rem;font-weight:800;
                    font-family:inherit;cursor:pointer;
                    display:flex;align-items:center;justify-content:center;gap:8px;
                    transition:background .2s,transform .15s,box-shadow .2s;
                    box-shadow:0 4px 14px rgba(26,74,46,.3);
                    margin-bottom:10px;
                " onmouseover="this.style.background='#143820';this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 20px rgba(26,74,46,.4)'"
                   onmouseout="this.style.background='#1a4a2e';this.style.transform='translateY(0)';this.style.boxShadow='0 4px 14px rgba(26,74,46,.3)'">
                    Bayar Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
                <p style="font-size:.65rem;color:#9ca3af;text-align:center;margin:0;line-height:1.5;">
                    Dengan menekan tombol di atas, Anda menyetujui
                    <a href="#" style="color:#1a7a5e;font-weight:600;text-decoration:underline;">Syarat & Ketentuan</a> yang berlaku di J-TRIP.
                </p>
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
    const paymentSteps = {
    'BCA VA': {
        title: 'BCA Virtual Account',
        color: '#1a7a5e', bg: '#e6f4ef',
        icon: '🏦',
        steps: [
            { title: 'Salin Nomor Virtual Account', desc: 'Gunakan nomor VA berikut untuk pembayaran:<br><strong>8808 1234 5678 9012</strong>' },

            { title: 'Metode 1: m-BCA (Mobile Banking)', desc: 'Login ke aplikasi <strong>m-BCA</strong> → pilih <strong>m-Transfer</strong> → <strong>BCA Virtual Account</strong>.' },
            { title: 'Input Nomor VA', desc: 'Masukkan nomor VA di atas, lalu tekan <strong>OK</strong>.' },
            { title: 'Konfirmasi Pembayaran', desc: 'Pastikan nama <strong>J-TRIP</strong> & nominal benar → masukkan PIN → <strong>Bayar</strong>.' },

            { title: 'Metode 2: ATM BCA', desc: 'Masukkan kartu ATM → PIN → pilih <strong>Transaksi Lainnya</strong> → <strong>Transfer</strong> → <strong>BCA Virtual Account</strong>.' },
            { title: 'Masukkan Nomor VA', desc: 'Ketik nomor VA → tekan <strong>Benar</strong>.' },
            { title: 'Selesaikan Pembayaran', desc: 'Cek detail → tekan <strong>Ya</strong> → simpan struk sebagai bukti.' },

            { title: 'Pembayaran Berhasil', desc: 'Tiket akan dikirim otomatis ke email kamu setelah pembayaran berhasil.' }
        ],
        note: '⏰ Batas waktu pembayaran: <strong>24 jam</strong>. Pesanan otomatis dibatalkan jika belum dibayar.'
    },

    'BNI VA': {
        title: 'BNI Virtual Account',
        color: '#e65c00', bg: '#fff4ed',
        icon: '🏦',
        steps: [
            { title: 'Salin Nomor Virtual Account', desc: 'Nomor VA:<br><strong>9880 8765 4321 000</strong>' },

            { title: 'm-Banking BNI', desc: 'Login ke <strong>BNI Mobile Banking</strong> → pilih <strong>Transfer</strong> → <strong>Virtual Account Billing</strong>.' },
            { title: 'Masukkan Nomor VA', desc: 'Input nomor VA → tekan <strong>Lanjut</strong>.' },
            { title: 'Konfirmasi', desc: 'Cek nama <strong>J-TRIP</strong> → masukkan PIN → <strong>Bayar</strong>.' },

            { title: 'ATM BNI', desc: 'Masukkan kartu → PIN → pilih <strong>Menu Lain</strong> → <strong>Transfer</strong> → <strong>Virtual Account Billing</strong>.' },
            { title: 'Input VA', desc: 'Masukkan nomor VA → tekan benar → lanjutkan pembayaran.' },

            { title: 'Selesai', desc: 'Struk keluar / notifikasi muncul. Tiket dikirim otomatis ke email.' }
        ],
        note: '⏰ Berlaku 24 jam setelah checkout.'
    },

    'BRI VA': {
        title: 'BRI Virtual Account',
        color: '#1655a2', bg: '#eff4ff',
        icon: '🏦',
        steps: [
            { title: 'Nomor BRIVA', desc: 'Gunakan nomor berikut:<br><strong>26215 0000 9876 543</strong>' },

            { title: 'BRImo (Mobile Banking)', desc: 'Login → pilih <strong>Pembayaran</strong> → <strong>BRIVA</strong>.' },
            { title: 'Masukkan Nomor', desc: 'Input nomor BRIVA → tekan lanjut.' },
            { title: 'Konfirmasi', desc: 'Cek detail → masukkan PIN → bayar.' },

            { title: 'ATM BRI', desc: 'Masukkan kartu → PIN → pilih <strong>Pembayaran</strong> → <strong>BRIVA</strong>.' },
            { title: 'Input BRIVA', desc: 'Masukkan nomor → konfirmasi → simpan struk.' },

            { title: 'Berhasil', desc: 'Tiket otomatis dikirim ke email kamu.' }
        ],
        note: '⏰ Maksimal pembayaran 24 jam.'
    },

    'Mandiri Bill': {
        title: 'Mandiri Bill Payment',
        color: '#f5a623', bg: '#fffbeb',
        icon: '🏦',
        steps: [
            { title: 'Kode Pembayaran', desc: 'Gunakan kode berikut:<br><strong>70012 8899 7766</strong>' },

            { title: 'Livin by Mandiri', desc: 'Login → pilih <strong>Bayar</strong> → <strong>Multipayment</strong>.' },
            { title: 'Pilih Penyedia', desc: 'Cari & pilih <strong>J-TRIP</strong>.' },
            { title: 'Input Kode', desc: 'Masukkan kode bayar → lanjut.' },
            { title: 'Konfirmasi', desc: 'Cek detail → masukkan PIN → bayar.' },

            { title: 'ATM Mandiri', desc: 'Masukkan kartu → PIN → pilih <strong>Bayar/Beli</strong> → <strong>Multipayment</strong>.' },
            { title: 'Masukkan Kode', desc: 'Input kode → konfirmasi → selesai.' },

            { title: 'Sukses', desc: 'Tiket dikirim otomatis ke email.' }
        ],
        note: '⏰ Pembayaran berlaku 24 jam.'
    },
        'GoPay': {
            title: 'GoPay',
            color: '#00aed6', bg: '#e8f8fd',
            icon: '💚',
            steps: [
                { title: 'Buka Aplikasi Gojek', desc: 'Pastikan saldo GoPay kamu mencukupi. Buka aplikasi Gojek di HP.' },
                { title: 'Pilih GoPay di J-TRIP', desc: 'Di halaman pembayaran J-TRIP, pilih <strong>GoPay</strong> sebagai metode.' },
                { title: 'Redirect ke GoPay', desc: 'Kamu akan diarahkan ke halaman konfirmasi GoPay secara otomatis.' },
                { title: 'Cek Detail Pembayaran', desc: 'Pastikan nama merchant <strong>J-TRIP</strong> dan nominal sudah benar.' },
                { title: 'Masukkan PIN GoPay', desc: 'Input 6 digit PIN GoPay kamu untuk mengotorisasi pembayaran.' },
                { title: 'Pembayaran Berhasil', desc: 'Saldo GoPay terpotong dan tiket langsung dikirim ke email kamu.' }
            ],
            note: '✅ Pembayaran GoPay bersifat <strong>instan</strong>, tiket terbit dalam hitungan detik.'
        },
        'OVO': {
            title: 'OVO',
            color: '#4c3494', bg: '#f5f0ff',
            icon: '💜',
            steps: [
                { title: 'Pastikan Saldo OVO Cukup', desc: 'Buka aplikasi OVO dan cek saldo OVO Cash / OVO Points kamu.' },
                { title: 'Pilih OVO di Halaman Pembayaran', desc: 'Di J-TRIP, pilih <strong>OVO</strong> sebagai metode pembayaran.' },
                { title: 'Masukkan Nomor HP OVO', desc: 'Ketikkan nomor HP yang terdaftar di akun OVO kamu.' },
                { title: 'Terima Notifikasi Push', desc: 'Buka notifikasi dari aplikasi OVO di HP kamu.' },
                { title: 'Konfirmasi di Aplikasi OVO', desc: 'Tap <strong>Bayar</strong> di aplikasi OVO dan masukkan PIN OVO.' },
                { title: 'Transaksi Selesai', desc: 'Saldo OVO terpotong. Tiket J-TRIP langsung dikirim ke email.' }
            ],
            note: '✅ Pembayaran OVO bersifat <strong>instan</strong>, pastikan notifikasi OVO aktif.'
        },
        'QRIS': {
            title: 'QRIS (Scan QR Code)',
            color: '#e11d48', bg: '#fff1f2',
            icon: '📱',
            steps: [
                { title: 'Pilih QRIS di J-TRIP', desc: 'Pilih metode <strong>QRIS</strong>. QR Code akan tampil di layar.' },
                { title: 'Buka Aplikasi Dompet Digital / m-Banking', desc: 'Buka GoPay, OVO, Dana, ShopeePay, m-BCA, BRImo, atau aplikasi lain yang mendukung QRIS.' },
                { title: 'Pilih Fitur Scan QR', desc: 'Tap ikon kamera / scan QR yang tersedia di aplikasi pilihan kamu.' },
                { title: 'Scan QR Code J-TRIP', desc: 'Arahkan kamera ke QR Code yang tampil. Pastikan tertera nama <strong>J-TRIP</strong>.' },
                { title: 'Cek & Konfirmasi Nominal', desc: 'Nominal otomatis terisi. Periksa, lalu masukkan PIN untuk konfirmasi.' },
                { title: 'Bukti Pembayaran Tersimpan', desc: 'Transaksi berhasil. Tiket dikirim ke email dalam 1–2 menit.' }
            ],
            note: '📲 QRIS dapat digunakan oleh semua aplikasi dompet digital & m-banking berlogo QRIS.'
        },
        'Visa': {
            title: 'Kartu Visa',
            color: '#1a1f71', bg: '#eff1ff',
            icon: '💳',
            steps: [
                { title: 'Pilih Visa di Halaman Pembayaran', desc: 'Klik opsi <strong>Visa</strong> dan pastikan kartu kamu aktif untuk transaksi online.' },
                { title: 'Isi Data Kartu', desc: 'Masukkan 16 digit nomor kartu Visa, nama pemegang kartu, masa berlaku (MM/YY).' },
                { title: 'Masukkan CVV', desc: 'Isi 3 digit CVV yang ada di belakang kartu kamu.' },
                { title: 'Verifikasi 3D Secure', desc: 'Kamu akan diarahkan ke halaman verifikasi bank (OTP dikirim via SMS/email).' },
                { title: 'Masukkan Kode OTP', desc: 'Salin kode OTP yang diterima dan masukkan di kolom verifikasi.' },
                { title: 'Pembayaran Dikonfirmasi', desc: 'Bank memproses transaksi. Tiket dikirim ke email setelah konfirmasi diterima.' }
            ],
            note: '🔒 Transaksi dilindungi Verified by Visa (3D Secure). Pastikan limit kartu mencukupi.'
        },
        'Mastercard': {
            title: 'Kartu Mastercard',
            color: '#eb001b', bg: '#fff1f1',
            icon: '💳',
            steps: [
                { title: 'Pilih Mastercard di J-TRIP', desc: 'Klik opsi <strong>Mastercard</strong> dan pastikan kartu aktif untuk transaksi online.' },
                { title: 'Isi Detail Kartu', desc: 'Masukkan nomor kartu 16 digit, nama lengkap pemegang kartu, dan expired date.' },
                { title: 'Masukkan CVC', desc: 'Isi 3 digit CVC yang tercetak di bagian belakang kartu Mastercard kamu.' },
                { title: 'Autentikasi Mastercard SecureCode', desc: 'Halaman verifikasi terbuka. OTP dikirim ke nomor HP yang terdaftar di bank.' },
                { title: 'Input Kode OTP', desc: 'Masukkan kode OTP dalam waktu yang ditentukan untuk menyelesaikan transaksi.' },
                { title: 'Konfirmasi Berhasil', desc: 'Transaksi diproses bank penerbit. Tiket J-TRIP langsung masuk ke emailmu.' }
            ],
            note: '🔒 Transaksi dilindungi Mastercard Identity Check. Pastikan limit online payment aktif.'
        }
    };

    let payState = {
        namaDestinasi: '',
        foto: '',
        tanggal: '',
        qty: 2,
        harga: 0,
        metode: ''
    };

    function openPayment(data) {
        payState = { namaDestinasi: data.namaDestinasi, foto: data.foto, tanggal: data.tanggal, qty: data.qty, harga: data.harga, metode: '' };

        const tgl = new Date(data.tanggal + 'T00:00:00');
        const bulanIndo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        const tglFormatted = `${tgl.getDate()} ${bulanIndo[tgl.getMonth()]} ${tgl.getFullYear()}`;

        document.getElementById('payNamaDestinasi').textContent = data.namaDestinasi;
        document.getElementById('payFotoDestinasi').src = data.foto;
        document.getElementById('payTanggal').textContent = tglFormatted;

        const subtotal = data.harga * data.qty;
        document.getElementById('payLabelEntry').textContent = `Standard Entry (x${data.qty})`;
        document.getElementById('paySubtotal').textContent = data.harga === 0 ? 'Gratis' : 'Rp ' + subtotal.toLocaleString('id-ID');
        document.getElementById('payTotal').textContent = data.harga === 0 ? 'Gratis' : 'Rp ' + subtotal.toLocaleString('id-ID');

        resetPaymentOptions();
        showAccordion(null);

        const overlay = document.getElementById('paymentOverlay');
        const modal = document.getElementById('paymentModal');
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
        modal.style.opacity = '0';
        modal.style.transform = 'translate(-50%, -50%) scale(0.94)';
        overlay.style.display = 'none';
        document.body.style.overflow = '';
        setTimeout(() => { modal.style.display = 'none'; }, 300);
    }

    function toggleAccordion(type) {
        const contents = { va:'vaContent', ewallet:'ewalletContent', card:'cardContent' };
        const chevrons = { va:'vaChevron', ewallet:'ewalletChevron', card:'cardChevron' };
        const el = document.getElementById(contents[type]);
        const ch = document.getElementById(chevrons[type]);
        const isOpen = window.getComputedStyle(el).display !== 'none';
        Object.values(contents).forEach(id => { document.getElementById(id).style.display = 'none'; });
        Object.values(chevrons).forEach(id => { document.getElementById(id).style.transform = 'rotate(-90deg)'; });
        if (!isOpen) { el.style.display = ''; ch.style.transform = 'rotate(0deg)'; }
    }

    function showAccordion(type) {
        const map = { va:'vaContent', ewallet:'ewalletContent', card:'cardContent' };
        const chv = { va:'vaChevron', ewallet:'ewalletChevron', card:'cardChevron' };
        Object.keys(map).forEach(k => {
            document.getElementById(map[k]).style.display = (k === type) ? '' : 'none';
            document.getElementById(chv[k]).style.transform = (k === type) ? 'rotate(0deg)' : 'rotate(-90deg)';
        });
    }

    function selectPayment(el, metode) {
        document.querySelectorAll('.pay-option').forEach(e => { e.classList.remove('pay-active'); e.style.backgroundColor='#fff'; e.style.border='2px solid #e5e7eb'; });
        el.classList.add('pay-active');
        el.style.backgroundColor = '#f0fdf4';
        el.style.border = '2px solid #1a7a5e';
        payState.metode = metode;
    }

    function resetPaymentOptions() {
        document.querySelectorAll('.pay-option').forEach(el => { el.classList.remove('pay-active'); el.style.backgroundColor='#fff'; el.style.border='2px solid #e5e7eb'; });
    }

    /* ============================================================
    PROSES PEMBAYARAN → TAMPILKAN LANGKAH
    ============================================================ */
    function prosespembayaran() {
        if (!payState.metode) {
            alert('Silakan pilih metode pembayaran terlebih dahulu.');
            return;
        }

        const data = paymentSteps[payState.metode];
        if (!data) return;

        // Isi konten modal langkah
        document.getElementById('stepsTitle').textContent = data.title;

        // Badge
        const badge = document.getElementById('stepsBadge');
        badge.style.background = data.bg;
        badge.style.color = data.color;
        badge.innerHTML = `<span style="font-size:1rem;">${data.icon}</span> ${data.title}`;

        // Steps
        const content = document.getElementById('stepsContent');
        content.innerHTML = data.steps.map((s, i) =>
            `<div class="step-item">
                <div class="step-num">${i+1}</div>
                <div class="step-text"><strong>${s.title}</strong>${s.desc}</div>
            </div>`
        ).join('') + `<div class="step-note">${data.note}</div>
        <div style="margin-top:18px;padding:14px;background:#f0fdf4;border-radius:12px;border:1px solid #bbf7d0;text-align:center;">
            <p style="font-size:.8rem;font-weight:700;color:#1a4a2e;margin:0 0 4px;">✅ Pesanan Dikonfirmasi</p>
            <p style="font-size:.75rem;color:#6b7280;margin:0;">Destinasi: <strong>${payState.namaDestinasi}</strong> · Tanggal: <strong>${document.getElementById('payTanggal').textContent}</strong> · ${payState.qty} orang · ${document.getElementById('payTotal').textContent}</p>
        </div>`;

        // Tampilkan modal langkah (di atas payment modal)
        const stepsOverlay = document.getElementById('stepsOverlay');
        const stepsModal = document.getElementById('stepsModal');
        stepsOverlay.style.display = 'block';
        stepsModal.style.display = 'block';
        requestAnimationFrame(() => requestAnimationFrame(() => {
            stepsModal.style.opacity = '1';
            stepsModal.style.transform = 'translate(-50%, -50%) scale(1)';
        }));
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
        if (!date) { alert('Silakan pilih tanggal terlebih dahulu.'); return; }
        const title = document.getElementById('detailTitle').textContent;
        const foto = document.getElementById('detailMainImg').src;
        const priceEl = document.getElementById('detailPrice').textContent;
        const hargaRaw = priceEl === 'Gratis' ? 0 : parseInt(priceEl.replace(/[^0-9]/g, ''), 10);
        openPayment({ namaDestinasi: title, foto: foto, tanggal: date, qty: currentQty, harga: hargaRaw });
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