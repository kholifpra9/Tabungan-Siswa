<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Tabungan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <p>NIS : {{ $siswa->nis }}</p>
                <p>Nama : {{ $siswa->nama }}</p>
                <p>Kelas : {{ $siswa->kelas->nama_kelas }}</p>
                <p>Saldo Tabungan : Rp. {{ number_format($tabungan->saldo, 0, ',', '.') }}</p>
                <x-primary-button 
                    tag="a" 
                    href="{{ route('pdf.riwayatPrint', $tabungan->id) }}">
                    Cetak PDF
                </x-primary-button>
                <br>
                <br>
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Kategori</th>
                            <th>Saldo</th>
                            <th>Pencatat</th>
                        </tr>
                    </x-slot>
                    @php $num=1 @endphp
                    @foreach ($transaksis as $t)
                    <tr>
                        <td>{{$num++}}</td>
                        <td>{{ $t->tanggal }}</td>
                        <td>{{ $t->keterangan }}</td>
                        <td>Rp.{{ number_format($t->nominal, 0, ',', '.') }}</td>
                        <td>{{ !empty($t->kategori) ? $t->kategori : '-' }}</td>
                        <td>Rp.{{ number_format($t->saldo, 0, ',', '.') }}</td>
                        <td>{{ $t->user->name }}</td>
                    </tr>
                    @endforeach
                </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>