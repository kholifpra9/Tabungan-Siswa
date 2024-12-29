<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengelolaan Tabungan') }} di {{ $kelas->nama_kelas }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if ($siswa->isEmpty())
                    <p class="text-gray-500">Tidak ada siswa di kelas ini.</p>
                @else
                <x-primary-button 
                    tag="a" 
                    href="{{ route('pdf.kelasPrint', $kelas->id) }}">
                    Cetak PDF
                </x-primary-button>
                <br>
                <br>
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Saldo</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    @php $num=1 @endphp
                    @foreach ($kelas->siswa as $siswa)
                    <tr>
                        <td>{{$num++}}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->kelas->nama_kelas }}</td>
                        <td>Rp.{{ number_format($siswa->tabungan->saldo, 0, ',', '.') }}</td>
                        <td>
                        <x-primary-button 
                                tag="a" 
                                href="{{ route('tabungan.riwayat', [$kelas->id, $siswa->tabungan?->id]) }}">
                                Riwayat
                            </x-primary-button>
                        @if(auth()->user()->hasRole('admin'))
                            <x-primary-button 
                                tag="a" 
                                href="{{ route('tabungan.setor', [$kelas->id, $siswa->tabungan?->id]) }}">
                                Setor
                            </x-primary-button>
                            <x-primary-button 
                                tag="a" 
                                href="{{ route('tabungan.tarik', [$kelas->id, $siswa->tabungan?->id]) }}">
                                Tarik
                            </x-primary-button>
                            @endif
                        </td>
                        
                    </tr>
                    
                    @endforeach
                </x-table>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>