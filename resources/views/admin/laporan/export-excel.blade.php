<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan J-TRIP</title>
</head>
<body>
<table border="1">
    <thead>
        <tr>
            <th colspan="8" style="font-size:18px;font-weight:bold;">
                LAPORAN TRANSAKSI J-TRIP
            </th>
        </tr>
        <tr>
            <th colspan="8">
                Periode: {{ \Carbon\Carbon::parse($start)->format('d M Y') }}
                -
                {{ \Carbon\Carbon::parse($end)->format('d M Y') }}
            </th>
        </tr>
        <tr>
            <th colspan="2">Total Tiket Terjual</th>
            <td colspan="2">{{ $summary['totalTiketTerjual'] }}</td>
            <th colspan="2">Total Transaksi</th>
            <td colspan="2">{{ $summary['totalTransaksi'] }}</td>
        </tr>
        <tr>
            <th colspan="2">Pendapatan Bulan Ini</th>
            <td colspan="2">Rp {{ number_format($summary['bulanIni'], 0, ',', '.') }}</td>
            <th colspan="2">Pendapatan Bulan Lalu</th>
            <td colspan="2">Rp {{ number_format($summary['bulanLalu'], 0, ',', '.') }}</td>
        </tr>
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
                <td>{{ (int) ($trx->grand_total ?? $trx->total_harga ?? 0) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Data transaksi belum ada</td>
            </tr>
        @endforelse
    </tbody>
</table>
</body>
</html>