<!DOCTYPE html>
<html>
<head>
    <title>Tabungan Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { font-size: 24px; text-align: center; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Riwayat Tabungan</h1>
    <p><strong>Nama Siswa:</strong> {{ $siswa->nama }}</p>
    <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
    <p><strong>Saldo Tabungan:</strong> Rp.{{ number_format($tabungan->saldo, 0, ',', '.') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Nominal</th>
                <th>Saldo</th>
                <th>Pencatat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $index => $transaksi)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaksi->tanggal }}</td>
                <td>{{ ucfirst($transaksi->keterangan) }}</td>
                <td>Rp.{{ number_format($transaksi->nominal, 0, ',', '.') }}</td>
                <td>Rp.{{ number_format($transaksi->saldo, 0, ',', '.') }}</td>
                <td>{{ $transaksi->user->name ?? 'Tidak Diketahui' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
