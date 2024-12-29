<!DOCTYPE html>
<html>
<head>
    <title>Siswa PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { font-size: 24px; font-weight: bold; text-align: center; }
        .table { width: 100%; border-collapse: collapse; }
        .table-bordered { border: 1px solid black; }
        .table-bordered th, .table-bordered td { border: 1px solid black; padding: 8px; text-align: left; }
        .table-bordered th { background-color: #f2f2f2; font-weight: bold; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Saldo Tabungan</th>
            </tr>
        </thead>
        <tbody>
            @php $num=1; @endphp
            @foreach($siswa as $s)
            <tr>
                <td>{{ $num++ }}</td>
                <td>{{ $s->nis }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->kelas?->nama_kelas ?? 'Tidak Ada Kelas' }}</td>
                <td>Rp.{{ number_format($s->tabungan?->saldo ?? 0, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
</body>
</html>
