<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan Keseluruhan') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-primary-button class="mb-5" tag="a" href="{{ route('pdf.keseluruhanPrint') }}">Cetak Laporan Keseluruhan PDF</x-primary-button>
                    @foreach($kelasData as $kelasNama => $siswaList)
                        <h4 class="font-bold text-lg mb-3">Kelas: {{ $kelasNama }}</h4>
                        <x-table>
                            <x-slot name="header">
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Saldo Tabungan</th>
                            </x-slot>
                            <tbody>
                                @php $num = 1; @endphp
                                @foreach($siswaList as $s)
                                    <tr>
                                        <td class="bg-[#F3F6FF]">{{ $num++ }}</td>
                                        <td>{{ $s->nis }}</td>
                                        <td class="bg-[#F3F6FF]">{{ $s->nama }}</td>
                                        <td>{{ $kelasNama }}</td>
                                        <td class="bg-[#F3F6FF]">Rp.{{ number_format($s->tabungan?->saldo ?? 0, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
