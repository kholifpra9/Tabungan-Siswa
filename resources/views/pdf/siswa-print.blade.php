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
                <th>NIS</th>
                <th>Kelas</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Nama Orang Tua</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $item)
            <tr>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->kelas->nama_kelas}}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->nama_ortu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
</body>
</html>
