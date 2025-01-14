<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header {
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .headerSection {
            display: flex;
            align-items: center; /* Vertikal sejajar */
            justify-content: space-between; /* Spasi di antara elemen */
        }
        .logo {
            flex: 1; /* Mengatur proporsi lebar logo */
            text-align: left;
        }
        .logo img {
            width: 100px;
        }
        .schoolInfo {
            flex: 3; /* Mengatur proporsi lebar info sekolah lebih besar dari logo */
            text-align: center; /* Teks di tengah */
        }
        .schoolInfo h1 {
            font-size: 18px;
            margin: 0;
        }
        .schoolInfo p {
            font-size: 12px;
            margin: 5px 0 0;
        }
        .title {
            margin-top: 10px;
        }
        h3 {
            font-size: 16px;
            margin: 10px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-bordered {
            border: 1px solid black;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .table-bordered th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        footer {
            text-align: center;
            font-size: 12px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #000;
        }
        .signature {
            margin-top: 30px;
        }
        .signature img {
            width: 100px;
        }
    </style>
</head>
<body>
    <header>
        <div class="headerSection">
            <div class="logo">
                <img src="{{ public_path('images/logo.png') }}" alt="Logo">
            </div>
            <div class="schoolInfo">
                <h1>MIS AL-HUDA HAURWANGI</h1>
                <p>Jl. Raya (eks) Tol Citarum Kp. Neglasari RT/RW 02/11 Ds. Haurwangi<br>
                Kec. Haurwangi Kab. Cianjur Jawa Barat 43282<br>
                Notelp: 081912202220</p>
            </div>
        </div>
    </header>

    <main>
        <div class="title">
            <h3>{{ $title }}</h3>
            <p><b>Tanggal:</b> {{ now()->translatedFormat('l, d F Y') }}</p>
        </div>
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
    </main>

    <footer>
        <div class="signature">
            <!-- Tanda tangan Kepala Sekolah (kiri) -->
            <div style="float: left; text-align: center; width: 45%;">
                <p>Kepala Sekolah:</p>
                <img src="{{ public_path('images/ttd.png') }}" alt="Tanda Tangan Kepala Sekolah" style="width: 100px;">
                <p>Yeti Suryati</p>
                <p>NIP: 123456789012345678</p>
            </div>
            
            <!-- Tanda tangan Admin Pengelola Tabungan (kanan) -->
            <div style="float: right; text-align: center; width: 45%;">
                <p>Admin Pengelola Tabungan:</p>
                <img src="{{ public_path('images/ttd1.png') }}" alt="Tanda Tangan Admin Pengelola" style="width: 100px;">
                <p>Pak Asep</p>
                <p>NIP: 987654321098765432</p>
            </div>
        </div>
        <div style="clear: both;"></div> <!-- Clear floats -->
        <br>
    </footer>
</body>
</html>
