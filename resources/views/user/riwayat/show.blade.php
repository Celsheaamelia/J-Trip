<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="/css/landing.css?v=1">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Tiket - J-TRIP</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            background: #f4faf7;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        #navbar {
            background: #ffffff !important;
            border-bottom: 1px solid #e5e7eb !important;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04) !important;
        }

        #navbar .nav-logo {
            color: #1a7a5e !important;
        }

        #navbar .nav-link {
            color: #374151 !important;
        }

        #navbar .nav-link:hover,
        #navbar .nav-link.active {
            color: #1a7a5e !important;
        }

        #navbar .btn-register {
            background: #1a7a5e !important;
            color: #ffffff !important;
        }

        .nav-auth form {
            margin: 0;
        }

        .nav-auth button.btn-register {
            border: none;
            cursor: pointer;
            font-family: inherit;
        }

        .barcode-page {
            max-width: 1120px;
            margin: 0 auto;
            padding: 135px 24px 56px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
            color: #1a7a5e;
            font-weight: 800;
            font-size: .9rem;
            margin-bottom: 22px;
        }

        .summary-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            padding: 26px;
            box-shadow: 0 4px 16px rgba(0,0,0,.05);
            margin-bottom: 28px;
        }

        .summary-title {
            font-size: 1.65rem;
            font-weight: 900;
            color: #1a4a2e;
            margin: 0 0 12px;
            letter-spacing: -0.4px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 18px;
        }

        .summary-item {
            padding: 14px 16px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
        }

        .summary-label {
            display: block;
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .7px;
            color: #9ca3af;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .summary-value {
            color: #111827;
            font-size: .9rem;
            font-weight: 800;
        }

        .badge {
            display: inline-block;
            padding: 5px 11px;
            border-radius: 999px;
            font-size: .72rem;
            font-weight: 800;
        }

        .badge-paid {
            background: #dcfce7;
            color: #166534;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-used {
            background: #e5e7eb;
            color: #374151;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 900;
            color: #111827;
            margin: 0 0 16px;
        }

        .qr-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .qr-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 4px 16px rgba(0,0,0,.05);
        }

        .qr-title {
            font-size: 1rem;
            font-weight: 900;
            color: #111827;
            margin: 0 0 6px;
        }

        .qr-code-text {
            font-size: .78rem;
            color: #6b7280;
            word-break: break-all;
            margin: 0 0 16px;
        }

        .qr-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            padding: 14px;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            margin-bottom: 14px;
        }

        .qr-note {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 14px;
            padding: 15px 18px;
            font-size: .88rem;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .alert-warning {
            background: #fffbeb;
            border: 1px solid #fde68a;
            color: #92400e;
            border-radius: 14px;
            padding: 18px;
            font-size: .9rem;
            line-height: 1.7;
        }

        @media(max-width: 900px) {
            .qr-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 768px) {
            .barcode-page {
                padding: 120px 18px 40px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .qr-grid {
                grid-template-columns: 1fr;
            }

            .summary-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>

{{-- ===== NAVBAR USER ===== --}}
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="nav-logo">J-TRIP</a>

        <ul class="nav-menu">
            <li>
                <a href="{{ url('/') }}" class="nav-link">
                    Beranda
                </a>
            </li>

            <li>
                <a href="{{ url('/wisata') }}" class="nav-link">
                    Wisata
                </a>
            </li>

            <li>
                <a href="{{ url('/#tentang') }}" class="nav-link">
                    Tentang
                </a>
            </li>

            <li>
                <a href="{{ route('riwayat.pesanan.index') }}" class="nav-link active">
                    Riwayat Pesanan
                </a>
            </li>
        </ul>

        <div class="nav-auth">
            <form action="{{ route('logout') }}" method="POST" style="display:inline;margin:0;">
                @csrf
                <button type="submit" class="btn-register">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<main class="barcode-page">

    <a href="{{ route('riwayat.pesanan.index') }}" class="back-link">
        ← Kembali ke Riwayat Pesanan
    </a>

    {{-- ===== RINGKASAN PESANAN ===== --}}
    <section class="summary-card">
        <h1 class="summary-title">
            {{ $tiket->wisata->name ?? 'Wisata' }}
        </h1>

        @if ($tiket->status === 'paid')
            <span class="badge badge-paid">Paid</span>
        @elseif ($tiket->status === 'used')
            <span class="badge badge-used">Used</span>
        @else
            <span class="badge badge-pending">Pending</span>
        @endif

        <div class="summary-grid">
            <div class="summary-item">
                <span class="summary-label">Kode Booking</span>
                <span class="summary-value">{{ $tiket->kode_booking }}</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">Tanggal Kunjungan</span>
                <span class="summary-value">{{ $tiket->tanggal_kunjungan }}</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">Jumlah Tiket</span>
                <span class="summary-value">{{ $tiket->jumlah_pengunjung }} orang</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">Total Pembayaran</span>
                <span class="summary-value">
                    Rp {{ number_format($tiket->grand_total, 0, ',', '.') }}
                </span>
            </div>
        </div>
    </section>

    {{-- ===== QR / BARCODE TIKET ===== --}}
    @if ($tiket->status === 'paid' || $tiket->status === 'used')

        <div class="qr-note">
            Tunjukkan QR tiket ini kepada petugas saat masuk lokasi wisata.
            Setiap QR hanya bisa digunakan satu kali.
        </div>

        <h2 class="section-title">Barcode / QR Tiket Masuk</h2>

        <div class="qr-grid">
            @foreach ($tiket->detailTiket as $detail)
                <div class="qr-card">
                    <h3 class="qr-title">
                        Tiket {{ $loop->iteration }}
                    </h3>

                    <p class="qr-code-text">
                        {{ $detail->kode_tiket }}
                    </p>

                    <div class="qr-box">
                        {!! QrCode::size(180)->generate($detail->kode_tiket) !!}
                    </div>

                    <br>

                    @if ($detail->status === 'used')
                        <span class="badge badge-used">
                            Sudah Digunakan
                        </span>
                    @else
                        <span class="badge badge-paid">
                            Aktif
                        </span>
                    @endif
                </div>
            @endforeach
        </div>

    @else
        <div class="alert-warning">
            Barcode belum tersedia karena pembayaran belum berhasil.
            Selesaikan pembayaran terlebih dahulu agar tiket dapat digunakan.
        </div>
    @endif

</main>

</body>
</html>