<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="/css/landing.css?v=50">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - J-TRIP</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            background: #f4faf7;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        /* ===== NAVBAR PUTIH UNTUK HALAMAN RIWAYAT ===== */
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

        #navbar .btn-login {
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

        /* ===== RIWAYAT PESANAN CONTENT ===== */
        .riwayat-page {
            max-width: 1120px;
            margin: 0 auto;
            padding: 135px 24px 56px;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 900;
            color: #1a4a2e;
            margin: 0 0 8px;
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            color: #6b7280;
            margin: 0 0 30px;
            font-size: .95rem;
            line-height: 1.7;
        }

        .riwayat-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .riwayat-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 4px 16px rgba(0,0,0,.05);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .riwayat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(26,122,94,.12);
        }

        .riwayat-card h3 {
            margin: 0 0 10px;
            font-size: 1.15rem;
            font-weight: 900;
            color: #111827;
            line-height: 1.35;
        }

        .info {
            margin: 6px 0;
            font-size: .9rem;
            color: #374151;
            line-height: 1.6;
        }

        .info strong {
            font-weight: 800;
            color: #1f2937;
        }

        .badge {
            display: inline-block;
            margin-top: 12px;
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

        .btn-barcode {
            display: inline-block;
            margin-top: 16px;
            background: #1a7a5e;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: .85rem;
            font-weight: 800;
            transition: background .2s ease, transform .15s ease;
        }

        .btn-barcode:hover {
            background: #14624b;
            transform: translateY(-1px);
        }

        .btn-detail {
            background: #9ca3af;
        }

        .btn-detail:hover {
            background: #6b7280;
        }

        .empty {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 28px;
            color: #6b7280;
            box-shadow: 0 4px 16px rgba(0,0,0,.04);
        }

        @media(max-width: 768px) {
            .riwayat-page {
                padding: 120px 18px 40px;
            }

            .riwayat-grid {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 1.7rem;
            }
        }
    </style>
</head>

<body>

{{-- ===== NAVBAR USER ===== --}}
@include('komponen.user-navbar')

{{-- ===== RIWAYAT PESANAN ===== --}}
<main class="riwayat-page">
    <h1 class="page-title">Riwayat Pesanan</h1>
    <p class="page-subtitle">
        Lihat daftar pesanan tiket wisata dan barcode tiket yang sudah dibayar.
    </p>

    @if ($tikets->isEmpty())
        <div class="empty">
            Kamu belum memiliki riwayat pesanan.
        </div>
    @else
        <div class="riwayat-grid">
            @foreach ($tikets as $tiket)
                <div class="riwayat-card">
                    <h3>{{ $tiket->wisata->name ?? 'Wisata' }}</h3>

                    <p class="info">
                        <strong>Kode Booking:</strong>
                        {{ $tiket->kode_booking }}
                    </p>

                    <p class="info">
                        <strong>Tanggal Kunjungan:</strong>
                        {{ $tiket->tanggal_kunjungan }}
                    </p>

                    <p class="info">
                        <strong>Jumlah Tiket:</strong>
                        {{ $tiket->jumlah_pengunjung }} orang
                    </p>

                    <p class="info">
                        <strong>Total:</strong>
                        Rp {{ number_format($tiket->grand_total, 0, ',', '.') }}
                    </p>

                    @if ($tiket->status === 'paid')
                        <span class="badge badge-paid">Paid</span>
                    @elseif ($tiket->status === 'used')
                        <span class="badge badge-used">Used</span>
                    @else
                        <span class="badge badge-pending">Pending</span>
                    @endif

                    <br>

                    @if ($tiket->status === 'paid' || $tiket->status === 'used')
                        <a href="{{ route('riwayat.pesanan.show', $tiket->id_tiket) }}" class="btn-barcode">
                            Lihat Barcode
                        </a>
                    @else
                        <a href="{{ route('riwayat.pesanan.show', $tiket->id_tiket) }}" class="btn-barcode btn-detail">
                            Detail Pesanan
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</main>

</body>
</html>