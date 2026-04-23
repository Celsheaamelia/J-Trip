<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata - J-TRIP</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:       #1a7a5e;
            --primary-dark:  #14624b;
            --primary-light: #e6f4ef;
            --text-dark:     #192e26;
            --text-muted:    #6b8a80;
            --bg:            #f4faf7;
            --card-bg:       #ffffff;
            --border:        #ddeee7;
            --shadow-sm:     0 1px 5px rgba(26,122,94,.07);
            --shadow-lg:     0 8px 36px rgba(26,122,94,.18);
            --radius:        14px;
            --radius-sm:     8px;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text-dark);
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: sticky; top: 0; z-index: 200;
            background: #fff;
            border-bottom: 1.5px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 48px; height: 62px;
        }
        .brand {
            font-size: 1.35rem; font-weight: 800; color: var(--primary);
            letter-spacing: -.5px; text-decoration: none;
        }
        .nav-links { display: flex; gap: 30px; list-style: none; }
        .nav-links a {
            text-decoration: none; font-size: .9rem; font-weight: 600;
            color: var(--text-muted); padding-bottom: 3px;
            border-bottom: 2px solid transparent; transition: all .2s;
        }
        .nav-links a.active,
        .nav-links a:hover { color: var(--primary); border-bottom-color: var(--primary); }
        .avatar-btn {
            width: 36px; height: 36px; border-radius: 50%;
            background: var(--primary-light); border: none; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            color: var(--primary); transition: background .2s;
        }
        .avatar-btn:hover { background: #c5e3d8; }

        /* ── PAGE HEADER ── */
        .ph { max-width: 1160px; margin: 0 auto; padding: 38px 40px 0; }
        .ph h1 {
            font-size: 2rem; font-weight: 800;
            letter-spacing: -.5px; line-height: 1.15;
        }
        .ph p {
            color: var(--text-muted); font-size: .9rem;
            margin-top: 7px; max-width: 500px; line-height: 1.65;
        }

        /* ── SEARCH + FILTER ── */
        .sf-bar {
            max-width: 1160px; margin: 22px auto 0; padding: 0 40px;
            display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
        }
        .sw { position: relative; flex: 1; min-width: 200px; max-width: 370px; }
        .sw svg {
            position: absolute; left: 13px; top: 50%;
            transform: translateY(-50%);
            color: #aac5bb; width: 16px; height: 16px; pointer-events: none;
        }
        .si {
            width: 100%; padding: 10px 14px 10px 38px;
            border: 1.5px solid var(--border); border-radius: var(--radius-sm);
            font-size: .89rem; font-family: inherit; background: #fff;
            outline: none; color: var(--text-dark); transition: border-color .2s;
        }
        .si:focus { border-color: var(--primary); }
        .si::placeholder { color: #b2c8bf; }

        .ftabs { display: flex; gap: 8px; flex-wrap: wrap; }
        .ft {
            padding: 7.5px 18px; border-radius: 50px;
            border: 1.5px solid var(--border); background: #fff;
            font-size: .85rem; font-weight: 600; color: var(--text-muted);
            cursor: pointer; transition: all .2s; font-family: inherit;
        }
        .ft:hover { border-color: var(--primary); color: var(--primary); }
        .ft.on { background: var(--primary); border-color: var(--primary); color: #fff; }

        /* ── GRID ── */
        .ww { max-width: 1160px; margin: 0 auto; padding: 26px 40px 48px; }
        .wg {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        /* ── CARD ── */
        .card {
            background: var(--card-bg); border-radius: var(--radius);
            border: 1.5px solid var(--border); overflow: hidden;
            box-shadow: var(--shadow-sm); display: flex; flex-direction: column;
            transition: transform .22s, box-shadow .22s;
            animation: fadeUp .38s ease both;
        }
        .card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
        .card:nth-child(1){animation-delay:.04s}
        .card:nth-child(2){animation-delay:.09s}
        .card:nth-child(3){animation-delay:.13s}
        .card:nth-child(4){animation-delay:.17s}
        .card:nth-child(5){animation-delay:.21s}
        .card:nth-child(6){animation-delay:.25s}
        @keyframes fadeUp {
            from{opacity:0;transform:translateY(20px)}
            to  {opacity:1;transform:translateY(0)}
        }

        .ci { position: relative; height: 190px; overflow: hidden; background: #c8e0d8; }
        .ci img {
            width:100%;height:100%;object-fit:cover;display:block;
            transition:transform .38s;
        }
        .card:hover .ci img { transform: scale(1.07); }

        .bcat {
            position:absolute;top:11px;left:11px;
            padding:4px 10px;border-radius:50px;
            font-size:.7rem;font-weight:700;letter-spacing:.4px;
            text-transform:uppercase;color:#fff;
        }
        .cp,
        .cg,
        .cat,
        .cpk,
        .ct,
        .cw{
            background: var(--primary);
}

        .brate {
            position:absolute;bottom:10px;right:10px;
            background:rgba(0,0,0,.52);color:#fff;
            font-size:.77rem;font-weight:700;padding:3px 9px;
            border-radius:50px;display:flex;align-items:center;gap:4px;
            backdrop-filter:blur(5px);
        }
        .brate .s { color:#fbbf24; }

        .cbody { padding:15px 16px 18px; flex:1; display:flex; flex-direction:column; }
        .cbody h3 {
            font-size:.98rem;font-weight:700;
            margin-bottom:6px;line-height:1.3;
        }
        .cbody p {
            font-size:.81rem;color:var(--text-muted);line-height:1.55;
            flex:1;display:-webkit-box;
            -webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
        }
        .cfoot {
            display:flex;align-items:center;justify-content:space-between;
            margin-top:14px;
        }
        .hl { font-size:.71rem;color:var(--text-muted);display:block;margin-bottom:1px; }
        .hn { font-size:.91rem;font-weight:800;color:var(--primary); }
        .bd {
            padding:8px 17px;background:var(--primary);color:#fff;
            border:none;border-radius:var(--radius-sm);
            font-size:.82rem;font-weight:700;cursor:pointer;
            font-family:inherit;text-decoration:none;
            transition:background .2s,transform .15s;display:inline-block;
        }
        .bd:hover { background:var(--primary-dark); transform:scale(1.04); }

        /* ── EMPTY ── */
        .empty {
            grid-column:1/-1;text-align:center;
            padding:70px 20px;color:var(--text-muted);
        }
        .empty svg { width:60px;height:60px;opacity:.35;margin-bottom:14px; }

        /* ── PAGINATION ── */
        .pgw {
            display:flex;justify-content:center;
            align-items:center;gap:6px;margin-top:30px;
        }
        .pb {
            width:36px;height:36px;border-radius:50%;
            border:1.5px solid var(--border);background:#fff;
            font-size:.86rem;font-weight:600;color:var(--text-muted);
            cursor:pointer;display:flex;align-items:center;justify-content:center;
            transition:all .2s;font-family:inherit;
        }
        .pb:hover:not([disabled]):not(.dots) { border-color:var(--primary);color:var(--primary); }
        .pb.on { background:var(--primary);border-color:var(--primary);color:#fff; }
        .pb.dots { border:none;background:transparent;cursor:default; }
        .pb[disabled] { opacity:.35;cursor:default; }
        .pb svg { width:13px;height:13px; }

        /* ── RESPONSIVE ── */
        @media(max-width:900px){
            .wg{grid-template-columns:repeat(2,1fr)}
            .ph,.sf-bar,.ww{padding-left:20px;padding-right:20px}
            .navbar{padding:0 20px}
        }
        @media(max-width:580px){
            .wg{grid-template-columns:1fr}
            .nav-links{display:none}
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a href="{{ url('/home') }}" class="brand">J-TRIP</a>
    <ul class="nav-links">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/wisata') }}">Wisata</a>
    </ul>
    <button class="avatar-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="8" r="4"/>
            <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
        </svg>
    </button>
</nav>

<!-- PAGE HEADER -->
<div class="ph">
    <h1>Eksplorasi Keajaiban Jember</h1>
    <p>Temukan keindahan tersembunyi mulai dari pesisir selatan hingga puncak pegunungan yang asri.</p>
</div>

<!-- SEARCH + FILTER -->
<div class="sf-bar">
    <div class="sw">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/>
            <path d="m21 21-4.35-4.35"/>
        </svg>
        <input class="si" id="sInput" type="text"
               placeholder="Cari nama destinasi..." autocomplete="off">
    </div>
    <div class="ftabs" id="ftabs">
        <button class="ft on" data-k="Semua">Semua</button>
        <button class="ft" data-k="Pantai">Pantai</button>
        <button class="ft" data-k="Taman">Taman</button>
        <button class="ft" data-k="Kebun">Kebun</button>
        <button class="ft" data-k="Air Terjun">Air Terjun</button>
    </div>
</div>

<!-- GRID + PAGINATION -->
<div class="ww">
    <div class="wg" id="wgrid"></div>
    <div class="pgw" id="pgw"></div>
</div>

<script>
/* ════════ DATA DUMMY ════════
   Ganti nilai 'foto' dengan path foto asli kamu,
   contoh: foto: "{{ asset('images/pantai-papuma.jpg') }}"
   ════════════════════════════ */
const DATA = [
    {
        id:1,
        nama:"Pantai Papuma",
        kategori:"Pantai",
        deskripsi:"Tanjung Pasir Putih Malikan yang ikonik dengan gugusan pulau karang di tengah laut selatan.",
        harga:15000,
        rating:4.9,
        foto:"{{ asset('images/pantai-papuma.jpg') }}"
    },
    {
        id:2,
        nama:"Kebun Teh Gunung Gambir",
        kategori:"Gunung",
        deskripsi:"Nikmati kesejukan udara di pegunungan di hamparan kebun teh peninggalan kolonial dengan jembatan.",
        harga:10000,
        rating:4.7,
        foto:"{{ asset('images/kebun-teh-gambir.jpg') }}"
    },
    {
        id:3,
        nama:"Air Terjun Tancak",
        kategori:"Air Terjun",
        deskripsi:"Air terjun tertinggi di Jember tersembunyi di kaki Gunung Argopuro, dikelilingi hutan kopi asri.",
        harga:0,
        rating:4.8,
        foto:"{{ asset('images/air-terjun-tancak.jpg') }}"
    },
    {
        id:4,
        nama:"Puncak Rembangan",
        kategori:"Puncak",
        deskripsi:"Puncak legendaris untuk melihat kerlip lampu kota Jember terkenal di perkebunan buah-buahan.",
        harga:7500,
        rating:4.6,
        foto:"{{ asset('images/rembangan.jpg') }}"
    },
    {
        id:5,
        nama:"Pantai Watu Ulo",
        kategori:"Pantai",
        deskripsi:"Pantai penuh legenda dengan susunan batu panjang yang menyerupai ular dan ombak yang memukau.",
        harga:10000,
        rating:4.5,
        foto:"{{ asset('images/pantai-watu-ulo.jpg') }}"
    },
    {
        id:6,
        nama:"Teluk Love",
        kategori:"Pantai",
        deskripsi:"Pemandangan teluk berbentuk hati yang sempurna jika dilihat dari atas Bukit Sianyo di Payangan.",
        harga:5000,
        rating:4.9,
        foto:"{{ asset('images/teluk-love.jpg') }}"
    },
    {
        id:7,
        nama:"Pantai Bandealit",
        kategori:"Pantai",
        deskripsi:"Pantai tersembunyi dalam kawasan Taman Nasional Meru Betiri, pasir putih bersih dan alami.",
        harga:20000,
        rating:4.8,
        foto:"{{ asset('images/pantai-bandealit.jpg') }}"
    },
    {
        id:8,
        nama:"Puncak Pondok 50",
        kategori:"Puncak",
        deskripsi:"Puncak Pondok 50 adalah spot perbukitan di Jember dengan panorama hijau luas dan udara sejuk, cocok untuk menikmati sunrise dan suasana tenang jauh dari keramaian kota.",
        harga:25000,
        rating:4.7,
        foto:"{{ asset('images/puncak-pondok-50.jpg') }}"
    },
    {
        id:9,
        nama:"Air Terjun Antrokan",
        kategori:"Air Terjun",
        deskripsi:"Air terjun bertingkat di kaki Gunung Raung dengan kolam alami jernih yang memanjakan mata.",
        harga:5000,
        rating:4.6,
        foto:"{{ asset('images/air-terjun-antrokan.jpg') }}"
    },
    {
    id: 10,
    nama: "Kebun Gunung Pasang",
    kategori: "Kebun",
    deskripsi: "Perkebunan kopi dan karet dengan suasana pegunungan yang tenang dan alami.",
    harga: 5000,
    rating: 4.5,
    foto: "{{ asset('images/gunung-pasang.jpeg') }}"
},

    {
        id:11,
        nama:"Pantai Payangan",
        kategori:"Pantai",
        deskripsi:"Pantai eksotis dengan ombak besar dan tebing karang dramatis, cocok untuk fotografi pemandangan.",
        harga:10000,
        rating:4.7,
        foto:"{{ asset('images/pantai-payangan.jpg') }}"
    },
    {
        id:12,
        nama:"Taman Botani Sukorambi",
        kategori:"Taman",
        deskripsi:"Kebun botani dengan koleksi tanaman tropis langka, wahana keluarga dan pemandian air hangat alami.",
        harga:35000,
        rating:4.5,
        foto:"{{ asset('images/taman-botani-sukorambi.jpg') }}"
    }
];
/* ════════ BADGE CLASS ════════ */
function bc(k){
    return 'cg';
}

/* ════════ STATE ════════ */
const PER = 6;
let page = 1, kat = 'Semua', q = '';

/* ════════ RENDER ════════ */
function render(){
    const grid = document.getElementById('wgrid');
    let data = DATA.filter(w =>
        (kat==='Semua'||w.kategori===kat) &&
        w.nama.toLowerCase().includes(q.toLowerCase())
    );
    const total = Math.max(1, Math.ceil(data.length/PER));
    if(page>total) page=total;
    const slice = data.slice((page-1)*PER, page*PER);

    if(!slice.length){
        grid.innerHTML=`<div class="empty">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="1.2">
                <path d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01
                         M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p>Tidak ada wisata ditemukan.</p></div>`;
    } else {
        grid.innerHTML = slice.map(w=>`
        <div class="card">
            <div class="ci">
                <img src="${w.foto}" alt="${w.nama}" loading="lazy"
                     onerror="this.src='https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&q=80'">
                <span class="bcat ${bc(w.kategori)}">${w.kategori}</span>
                <span class="brate"><span class="s">★</span>${w.rating.toFixed(1)}</span>
            </div>
            <div class="cbody">
                <h3>${w.nama}</h3>
                <p>${w.deskripsi}</p>
                <div class="cfoot">
                    <div>
                        <span class="hl">Mulai dari</span>
                        <span class="hn">${w.harga===0?'Gratis':'Rp '+w.harga.toLocaleString('id-ID')}</span>
                    </div>
                    <a href="javascript:void(0)" 
   class="bd"
   data-title="${w.nama}"
   onclick="openModalFromBtn(this)">
   Lihat Detail
</a>
                </div>
            </div>
        </div>`).join('');
    }
    renderPagi(total);
}

/* ════════ PAGINATION ════════ */
function renderPagi(total){
    const w = document.getElementById('pgw');
    if(total<=1){w.innerHTML='';return;}
    const arr = n => `<button class="pb${page===n?' on':''}" onclick="go(${n})">${n}</button>`;
    let h = `<button class="pb" ${page===1?'disabled':''} onclick="go(${page-1})">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
    </button>`;
    for(let p=1;p<=total;p++){
        if(p===1||p===total||Math.abs(p-page)<=1) h+=arr(p);
        else if(Math.abs(p-page)===2) h+=`<span class="pb dots">...</span>`;
    }
    h+=`<button class="pb" ${page===total?'disabled':''} onclick="go(${page+1})">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
    </button>`;
    w.innerHTML=h;
}

function go(p){ page=p; render(); window.scrollTo({top:0,behavior:'smooth'}); }

/* ════════ EVENTS ════════ */
document.getElementById('ftabs').addEventListener('click',e=>{
    const b=e.target.closest('.ft'); if(!b) return;
    document.querySelectorAll('.ft').forEach(x=>x.classList.remove('on'));
    b.classList.add('on'); kat=b.dataset.k; page=1; render();
});

let timer;
document.getElementById('sInput').addEventListener('input',e=>{
    clearTimeout(timer);
    timer=setTimeout(()=>{ q=e.target.value.trim(); page=1; render(); },280);
});

/* ════════ INIT ════════ */
render();

</script>
 <script src="{{ asset('js/landing.js') }}"></script>
        
 {{-- ===== DETAIL DESTINASI SLIDE ===== --}}

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

    {{-- MINI NAVBAR --}}
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

    {{-- KONTEN AREA — full lebar layar --}}
    <div style="
        width:100%;
        padding:28px 32px 80px;
        box-sizing:border-box;
    ">

        {{-- CARD UTAMA --}}
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

            {{-- BREADCRUMB --}}
            <div style="padding:12px 22px 4px; font-size:.72rem; color:#9ca3af;">
                &rsaquo; <span id="detailBreadcrumb"></span>
            </div>

            {{-- BODY: FOTO KIRI + INFO KANAN --}}
            <div style="
                display:flex;
                gap:0;
                padding:10px 22px 28px;
                flex-wrap:wrap;
                align-items:flex-start;
            ">

                {{-- KOLOM FOTO --}}
                <div style="flex:0 0 500px; max-width:500px;">

                    {{-- FOTO UTAMA --}}
                    <div style="
                        position:relative;
                        border-radius:13px;
                        overflow:hidden;
                        height:230px;
                        background:#c8e0d8;
                        box-shadow:0 4px 18px rgba(0,0,0,.1);
                    ">
                        <img id="detailMainImg" src="" alt=""
                            style="width:100%; height:100%; object-fit:cover; display:block;
                                   transition:transform .4s ease;">

                        {{-- BADGE ATAS KIRI --}}
                        <div style="position:absolute; top:11px; left:11px; display:flex; gap:5px;" id="detailBadges">
                        </div>
                    </div>

                    {{-- ROW THUMBNAIL --}}
                    <div style="display:flex; gap:9px; margin-top:11px; align-items:center;">
                        <div style="
                            width:80px; height:64px; border-radius:10px;
                            overflow:hidden; cursor:pointer; flex-shrink:0;
                            border:2px solid #e5e7eb;
                            transition:border-color .2s, transform .2s;
                        " onmouseover="this.style.borderColor='#1a7a5e';this.style.transform='scale(1.04)'"
                           onmouseout="this.style.borderColor='#e5e7eb';this.style.transform='scale(1)'">
                            <img id="detailThumbImg1" src="" alt=""
                                style="width:100%; height:100%; object-fit:cover;"
                                onclick="switchMainImg(this)">
                        </div>
                        <div style="
                            width:80px; height:64px; border-radius:10px;
                            overflow:hidden; cursor:pointer; flex-shrink:0;
                            border:2px solid #e5e7eb;
                            transition:border-color .2s, transform .2s;
                        " onmouseover="this.style.borderColor='#1a7a5e';this.style.transform='scale(1.04)'"
                           onmouseout="this.style.borderColor='#e5e7eb';this.style.transform='scale(1)'">
                            <img id="detailThumbImg2" src="" alt=""
                                style="width:100%; height:100%; object-fit:cover;"
                                onclick="switchMainImg(this)">
                        </div>

                        {{-- TOMBOL TAMPILKAN LEBIH --}}
                        <div onclick="openGallery()" style="
                            width:80px; height:64px; border-radius:10px;
                            background:#f3f4f6; flex-shrink:0;
                            display:flex; flex-direction:column;
                            align-items:center; justify-content:center; gap:4px;
                            cursor:pointer;
                            border:2px solid #e5e7eb;
                            transition:border-color .2s, background .2s, transform .2s;
                        " onmouseover="this.style.borderColor='#1a7a5e';this.style.background='#ecfdf5';this.style.transform='scale(1.04)'"
                           onmouseout="this.style.borderColor='#e5e7eb';this.style.background='#f3f4f6';this.style.transform='scale(1)'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                 viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="1.8">
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
                    <h2 id="detailTitle" style="
                        font-size:1.65rem; font-weight:900; line-height:1.15;
                        color:#111827; margin:0 0 13px;
                        letter-spacing:-.5px;
                    "></h2>

                    <p id="detailDesc" style="
                        font-size:.8rem; color:#6b7280; line-height:1.78;
                        margin:0 0 18px;
                    "></p>

                    {{-- HARGA --}}
                    <div style="
                        display:flex; align-items:center; justify-content:space-between;
                        margin-bottom:18px;
                        padding:12px 16px;
                        background:#f0fdf4;
                        border-radius:10px;
                        border:1px solid #bbf7d0;
                    ">
                        <span style="font-size:.78rem; color:#374151; font-weight:600;">Harga Tiket</span>
                        <div style="text-align:right; line-height:1.1;">
                            <span id="detailPrice" style="font-size:1.1rem; font-weight:900; color:#1a7a5e;"></span>
                            <span style="font-size:.68rem; color:#9ca3af; display:block;">/ orang</span>
                        </div>
                    </div>

                    {{-- PILIH TANGGAL --}}
                    <div style="margin-bottom:14px;">
                        <label style="
                            display:block; font-size:.65rem; font-weight:700;
                            color:#374151; letter-spacing:.6px;
                            text-transform:uppercase; margin-bottom:7px;
                        ">Pilih Tanggal</label>
                        {{--
                            PERBAIKAN: Hapus SVG custom icon karena browser sudah
                            otomatis render native calendar icon pada input[type=date].
                            Sembunyikan native icon via CSS lalu pakai SVG kita sendiri
                            dengan wrapper position:relative.
                        --}}
                        <div style="position:relative; display:flex; align-items:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none"
                                 viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2"
                                 style="position:absolute; left:11px; pointer-events:none; z-index:1;">
                                <rect x="3" y="4" width="18" height="18" rx="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <input type="date" id="detailDate" style="
                                width:100%; padding:10px 12px 10px 34px;
                                border:1.5px solid #d1d5db; border-radius:9px;
                                font-size:.82rem; font-family:inherit;
                                color:#374151; outline:none; background:#fff;
                                box-sizing:border-box;
                                transition:border-color .2s;
                            "
                            onfocus="this.style.borderColor='#1a7a5e'"
                            onblur="this.style.borderColor='#d1d5db'">
                        </div>
                    </div>

                    {{-- JUMLAH --}}
                    <div style="margin-bottom:22px;">
                        <label style="
                            display:block; font-size:.65rem; font-weight:700;
                            color:#374151; letter-spacing:.6px;
                            text-transform:uppercase; margin-bottom:7px;
                        ">Jumlah</label>
                        <div style="
                            display:inline-flex; align-items:center;
                            border:1.5px solid #d1d5db; border-radius:9px;
                            overflow:hidden; background:#fff;
                        ">
                            <button onclick="changeQty(-1)" style="
                                width:40px; height:40px; border:none;
                                background:#f9fafb; font-size:1.15rem;
                                cursor:pointer; color:#374151; font-weight:700;
                                line-height:1; transition:background .15s;
                                border-right:1.5px solid #e5e7eb;
                            " onmouseover="this.style.background='#f3f4f6'"
                               onmouseout="this.style.background='#f9fafb'">−</button>
                            <span id="detailQty" style="
                                min-width:44px; text-align:center;
                                font-size:.95rem; font-weight:800; color:#111827;
                            ">02</span>
                            <button onclick="changeQty(1)" style="
                                width:40px; height:40px; border:none;
                                background:#f9fafb; font-size:1.15rem;
                                cursor:pointer; color:#374151; font-weight:700;
                                line-height:1; transition:background .15s;
                                border-left:1.5px solid #e5e7eb;
                            " onmouseover="this.style.background='#f3f4f6'"
                               onmouseout="this.style.background='#f9fafb'">+</button>
                        </div>
                    </div>

                    {{-- TOTAL HARGA DINAMIS --}}
                    <div style="
                        display:flex; align-items:center; justify-content:space-between;
                        margin-bottom:18px;
                        padding:10px 16px;
                        background:#f9fafb;
                        border-radius:9px;
                        border:1px dashed #d1d5db;
                    ">
                        <span style="font-size:.75rem; color:#6b7280; font-weight:500;">Total</span>
                        <span id="detailTotal" style="font-size:1rem; font-weight:900; color:#111827;"></span>
                    </div>

                    {{-- TOMBOL PESAN --}}
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

                    {{-- TOMBOL LIHAT LOKASI --}}
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                             viewBox="0 0 24 24" stroke="#92400e" stroke-width="2.2">
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

{{-- ===== CSS ANIMASI ===== --}}
<style>
@keyframes fadeInModal {
    from { opacity:0; }
    to   { opacity:1; }
}

/* Sembunyikan native calendar icon di semua browser */
input[type="date"]::-webkit-calendar-picker-indicator {
    opacity: 1;        /* tampilkan lagi */
    cursor: pointer;
}

input[type="date"]::-webkit-inner-spin-button {
    display: none;
}
input[type="date"]::-ms-clear {
    display: none;
}

/* Animasi konten slide masuk */
#detailCard.card-visible {
    opacity: 1 !important;
    transform: translateY(0) !important;
}

/* Animasi shimmer loading foto */
@keyframes shimmer {
    0%   { background-position: -600px 0; }
    100% { background-position: 600px 0; }
}
.img-loading {
    background: linear-gradient(90deg, #e5e7eb 25%, #f3f4f6 50%, #e5e7eb 75%);
    background-size: 600px 100%;
    animation: shimmer 1.4s infinite;
}
</style>

<script>
const detailData = {
    "Pantai Papuma": {
        breadcrumb: "Pantai Tanjung Papuma",
        badges: [{label:"Nature", color:"#16a34a"}, {label:"Conservation", color:"#0284c7"}],
        desc: "Papuma adalah singkatan dari Pasir Putih Malikan, sebuah destinasi wisata pantai ikonik di Kabupaten Jember, Jawa Timur. Nama ini menggambarkan karakteristik pantai yang memiliki pasir putih bersih dan keunikan batu karang yang seolah \"terbolak-balik\" (Malikan). Papuma dikenal karena pemandangan matahari terbit, gugusan karang raksasa, dan hutan tropis di sekitarnya.",
        harga: 15000,
        foto: "{{ asset('images/pantai-papuma.jpg') }}",
        thumb1: "{{ asset('images/pantai-papuma.jpg') }}",
        thumb2: "{{ asset('images/pantai-watu-ulo.jpg') }}",
        allPhotos: [
            "{{ asset('images/pantai-papuma.jpg') }}",
            "{{ asset('images/pantai-watu-ulo.jpg') }}",
            "{{ asset('images/pantai-papuma.jpg') }}",
            "{{ asset('images/pantai-watu-ulo.jpg') }}"
        ],
        mapsUrl: "https://maps.google.com/?q=Pantai+Papuma+Jember"
    },
    "Kebun Teh Gambir": {
        breadcrumb: "Kebun Teh Gunung Gambir",
        badges: [{label:"Alam", color:"#16a34a"}, {label:"Pegunungan", color:"#7c3aed"}],
        desc: "Hamparan kebun teh hijau yang menyejukkan dengan udara pegunungan segar. Kebun teh peninggalan kolonial Belanda ini menawarkan pemandangan yang menakjubkan dengan jalur trekking yang menyenangkan bagi para wisatawan.",
        harga: 10000,
        foto: "{{ asset('images/kebun-teh-gambir.jpg') }}",
        thumb1: "{{ asset('images/kebun-teh-gambir.jpg') }}",
        thumb2: "{{ asset('images/puncak-rembangan.jpg') }}",
        allPhotos: [
            "{{ asset('images/kebun-teh-gambir.jpg') }}",
            "{{ asset('images/puncak-rembangan.jpg') }}"
        ],
        mapsUrl: "https://maps.google.com/?q=Kebun+Teh+Gambir+Jember"
    },
    "Air Terjun Tancak": {
        breadcrumb: "Air Terjun Tancak",
        badges: [{label:"Air Terjun", color:"#0891b2"}, {label:"Alam", color:"#16a34a"}],
        desc: "Air terjun bertingkat yang spektakuler dikelilingi hutan tropis yang lebat. Air terjun tertinggi di Jember ini tersembunyi di kaki Gunung Argopuro, menawarkan keindahan alam yang masih alami dan udara yang sejuk menyegarkan.",
        harga: 5000,
        foto: "{{ asset('images/air-terjun-tancak.jpg') }}",
        thumb1: "{{ asset('images/air-terjun-tancak.jpg') }}",
        thumb2: "{{ asset('images/air-terjun-antrokan.jpg') }}",
        allPhotos: [
            "{{ asset('images/air-terjun-tancak.jpg') }}",
            "{{ asset('images/air-terjun-antrokan.jpg') }}"
        ],
        mapsUrl: "https://maps.google.com/?q=Air+Terjun+Tancak+Jember"
    }
};

let currentQty    = 2;
let currentHarga  = 0;
let currentPhotos = [];

/* ============================================================
   OPEN SLIDE
============================================================ */
function openModalFromBtn(btn) {
    const title = btn.getAttribute('data-title');

    // ambil dari detailData dulu
    let data = detailData[title];

    // 🔥 kalau tidak ada → ambil dari DATA (fallback)
    if (!data) {
        const w = DATA.find(x => x.nama === title);
        if (!w) return;

        data = {
            breadcrumb: w.nama,
            badges: [{ label: w.kategori, color: "#1a7a5e" }],
            desc: w.deskripsi,
            harga: w.harga,
            foto: w.foto,
            thumb1: w.foto,
            thumb2: w.foto,
            allPhotos: [w.foto],
            mapsUrl: "https://maps.google.com/?q=" + encodeURIComponent(w.nama + " Jember")
        };
    }

    /* ================= ISI DATA ================= */
    document.getElementById('detailTitle').textContent = title;
    document.getElementById('detailBreadcrumb').textContent = data.breadcrumb;
    document.getElementById('detailDesc').textContent = data.desc;

    /* Badge */
    const badgeEl = document.getElementById('detailBadges');
    badgeEl.innerHTML = (data.badges || []).map(b =>
        `<span style="
            background:${b.color};color:#fff;font-size:.62rem;
            font-weight:700;padding:3px 10px;border-radius:50px;
        ">${b.label}</span>`
    ).join('');

    /* Harga */
    currentHarga = data.harga;
    document.getElementById('detailPrice').textContent =
        data.harga === 0 ? 'Gratis' : 'Rp ' + data.harga.toLocaleString('id-ID');

    /* Foto */
    document.getElementById('detailMainImg').src = data.foto;
    document.getElementById('detailThumbImg1').src = data.thumb1;
    document.getElementById('detailThumbImg2').src = data.thumb2;
    currentPhotos = data.allPhotos;

    /* Maps */
    document.getElementById('btnLihatLokasi').onclick =
        () => window.open(data.mapsUrl, '_blank');

    /* Reset */
    currentQty = 2;
    updateQtyDisplay();
    document.getElementById('detailDate').value = '';

    /* Animasi */
    const slide = document.getElementById('detailSlide');
    const card = document.getElementById('detailCard');

    card.classList.remove('card-visible');
    slide.style.display = 'block';
    document.body.style.overflow = 'hidden';

    requestAnimationFrame(() => {
        slide.style.transform = 'translateX(0)';
        setTimeout(() => card.classList.add('card-visible'), 180);
    });
}

/* ============================================================
   CLOSE SLIDE
============================================================ */
function closeDetailSlide() {
    const slide = document.getElementById('detailSlide');
    const card  = document.getElementById('detailCard');
    card.classList.remove('card-visible');
    slide.style.transform = 'translateX(100%)';
    document.body.style.overflow = '';
    setTimeout(() => { slide.style.display = 'none'; }, 420);
}

/* ============================================================
   GALLERY MODAL
============================================================ */
function openGallery() {
    const modal = document.getElementById('galleryModal');
    const thumbsEl = document.getElementById('galleryThumbs');

    /* Foto besar = foto utama saat ini */
    const mainSrc = document.getElementById('detailMainImg').src;
    document.getElementById('galleryBigImg').src = mainSrc;

    /* Render thumbnails */
    thumbsEl.innerHTML = currentPhotos.map((src, i) =>
        `<img src="${src}" alt="Foto ${i+1}" onclick="setGalleryBig('${src}', this)"
            style="
                width:72px; height:56px; object-fit:cover;
                border-radius:8px; cursor:pointer;
                border:2.5px solid ${src === mainSrc ? '#1a7a5e' : 'transparent'};
                transition:border-color .2s, transform .2s;
                opacity:${src === mainSrc ? '1' : '.7'};
            "
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
        >`
    ).join('');

    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function setGalleryBig(src, thumbEl) {
    document.getElementById('galleryBigImg').src = src;
    /* Update border aktif */
    document.querySelectorAll('#galleryThumbs img').forEach(img => {
        img.style.borderColor   = 'transparent';
        img.style.opacity       = '.7';
    });
    thumbEl.style.borderColor = '#1a7a5e';
    thumbEl.style.opacity     = '1';
}

function closeGallery() {
    document.getElementById('galleryModal').style.display = 'none';
    /* Jangan kembalikan overflow jika slide masih terbuka */
    if (document.getElementById('detailSlide').style.display === 'block') {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
}

/* ============================================================
   SWITCH THUMBNAIL → MAIN
============================================================ */
function switchMainImg(thumbImg) {
    const mainImg  = document.getElementById('detailMainImg');
    const tmp      = mainImg.src;
    mainImg.src    = thumbImg.src;
    thumbImg.src   = tmp;

    /* Animasi zoom kecil */
    mainImg.style.transform = 'scale(1.03)';
    setTimeout(() => mainImg.style.transform = 'scale(1)', 300);
}

/* ============================================================
   QTY
============================================================ */
function changeQty(delta) {
    currentQty = Math.max(1, currentQty + delta);
    updateQtyDisplay();
}

function updateQtyDisplay() {
    document.getElementById('detailQty').textContent = String(currentQty).padStart(2, '0');

    /* Update total */
    const totalEl = document.getElementById('detailTotal');
    if (currentHarga === 0) {
        totalEl.textContent = 'Gratis';
    } else {
        const total = currentHarga * currentQty;
        totalEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
}

/* ============================================================
   PESAN
============================================================ */
function handlePesan() {
    const date = document.getElementById('detailDate').value;
    if (!date) {
        alert('Silakan pilih tanggal terlebih dahulu.');
        return;
    }
    const title = document.getElementById('detailTitle').textContent;
    const total = currentHarga === 0 ? 'Gratis' : 'Rp ' + (currentHarga * currentQty).toLocaleString('id-ID');
    alert(`✅ Pesanan Berhasil!\n\nDestinasi : ${title}\nJumlah   : ${currentQty} orang\nTanggal  : ${date}\nTotal    : ${total}`);
}

/* ============================================================
   KEYBOARD
============================================================ */
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        if (document.getElementById('galleryModal').style.display === 'flex') {
            closeGallery();
        } else {
            closeDetailSlide();
        }
    }
});

/* ============================================================
   CLOSE GALLERY KLIK LUAR FOTO
============================================================ */
document.getElementById('galleryModal').addEventListener('click', function(e) {
    if (e.target === this) closeGallery();
});
</script>

</body>
</html>