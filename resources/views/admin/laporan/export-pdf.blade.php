<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan J-TRIP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #111827;
            margin: 24px;
        }

        .header {
            text-align: center;
            margin-bottom: 24px;
        }

        .header h1 {
            margin: 0;
            color: #155c43;
            font-size: 24px;
        }

        .header p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 13px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .summary-card {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px;
            background: #f9fafb;
        }

        .summary-label {
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .summary-value {
            font-size: 15px;
            font-weight: bold;
            color: #155c43;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th {
            background: #155c43;
            color: white;
            padding: 9px;
            border: 1px solid #155c43;
        }

        td {
            padding: 8px;
            border: 1px solid #e5e7eb;
        }

        .nominal {
            font-weight: bold;
            color: #155c43;
        }

        .actions {
            margin-bottom: 18px;
            text-align: right;
        }

        .print-btn {
            background: #155c43;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 9px 14px;
            cursor: pointer;
            font-weight: bold;
        }

        @media print {
            .actions {
                display: none;
            }

            body {
                margin: 12px;
            }
        }
    </style>
</head>
<body>

<div class="actions">
    <button onclick="window.print()" class="print-btn">
        Download / Print PDF
    </button>
</div>

<div class="header">
    <h1>Laporan Transaksi J-TRIP</h1>
    <p>
        Periode:
        {{ \Carbon\Carbon::parse($start)->format('d M Y') }}
        -
        {{ \Carbon\Carbon::parse($end)->format('d M Y') }}
    </p>
</div>

<div class="summary">
    <div class="summary-card">
        <div class="summary-label">Total Tiket Terjual</div>
        <div class="summary-value">{{ number_format($summary['totalTiketTerjual'], 0, ',', '.') }}</div>
    </div>

    <div class="summary-card">
        <div class="summary-label">Total Transaksi</div>
        <div class="summary-value">{{ number_format($summary['totalTransaksi'], 0, ',', '.') }}</div>
    </div>

    <div class="summary-card">
        <div class="summary-label">Pendapatan Bulan Ini</div>
        <div class="summary-value">Rp {{ number_format($summary['bulanIni'], 0, ',', '.') }}</div>
    </div>

    <div class="summary-card">
        <div class="summary-label">Pendapatan Bulan Lalu</div>
        <div class="summary-value">Rp {{ number_format($summary['bulanLalu'], 0, ',', '.') }}</div>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pesanan</th>
            <th>Kode Booking</th>
            <th>Destinasi</th>
            <th>Tanggal</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transaksis as $index => $trx)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $trx->kode_pesanan ?? $trx->id_transaksi }}</td>
                <td>{{ $trx->kode_booking ?? '-' }}</td>
                <td>{{ $trx->nama_wisata ?? '-' }}</td>
                <td>{{ $trx->dibuat_pada ? \Carbon\Carbon::parse($trx->dibuat_pada)->format('d M Y H:i') : '-' }}</td>
                <td>{{ $trx->metode_pembayaran ?? '-' }}</td>
                <td>{{ $trx->status_pembayaran ?? '-' }}</td>
                <td class="nominal">
                    Rp {{ number_format($trx->grand_total ?? $trx->total_harga ?? 0, 0, ',', '.') }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align:center;">
                    Data transaksi belum ada
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<script>
    window.onload = function () {
        // Biarkan admin klik manual agar tidak langsung muncul print dialog.
    };
</script>

</body>
</html>