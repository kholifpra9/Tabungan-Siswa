<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Halo Selamat Datang") }}
                    {{ Auth::user()->name }}!
                </div>
            </div>
        </div>

        {{-- Untuk Admin atau Kepala Sekolah --}}
        @hasrole('admin|kepala sekolah')
        <section class="text-gray-700 body-font">
            <div class="container px-8 py-8 mx-auto">
                <h5 class="text-xl font-bold dark:text-white">Chart Tabungan Harian</h5>
                <hr class="mb-3">

                <div class="w-full max-w-full lg:w-full h-auto">
                    {!! $chart->container() !!}
                </div>
            </div>
            <div class="container px-8 py-2 mx-auto">
                <h5 class="text-xl font-bold dark:text-white">Siswa yang mengikuti program Tabungan</h5>
                <hr class="mb-3">
                <div class="grid grid-cols-6 gap-4 text-center">
                    @for($i = 1; $i <= 6; $i++)
                        <div class="p-4">
                            <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                                <svg class="text-indigo-500 w-5 h-5 mb-3 inline-block" fill="#000000">
                                    <!-- SVG Content -->
                                </svg>
                                <h2 class="title-font font-medium text-2xl text-gray-900">
                                    {{ ${"jumlah_kelas" . $i} ?? 0 }}
                                </h2>
                                <p class="leading-relaxed">Jumlah Siswa Kelas {{ $i }}</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        @endhasrole

        {{-- Untuk Siswa --}}
        @if(isset($siswa))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="bg-white dark:bg-gray-800">
                        <div class="container px-8 py-8 mx-auto">
                            <h5 class="text-xl font-bold dark:text-white">Informasi Tabungan Siswa</h5>
                            <hr class="mb-3">
                            <div class="bg-white overflow-hidden shadow rounded-lg border max-w-md mx-auto">
                                <div class="px-4 py-5 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">
                                        Informasi tentang siswa dan tabungan Anda.
                                    </h3>
                                </div>
                                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                    <dl class="sm:divide-y sm:divide-gray-200">
                                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $siswa->nama }}
                                            </dd>
                                        </div>
                                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">NIS</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $siswa->nis }}
                                            </dd>
                                        </div>
                                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Kelas</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $siswa->kelas->nama_kelas ?? 'Tidak ada' }}
                                            </dd>
                                        </div>
                                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Saldo Tabungan</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                Rp.{{ number_format($siswa->tabungan->saldo ?? 0, 0, ',', '.') }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="py-1">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h5 class="text-xl font-bold dark:text-white">Riwayat Menabung</h5>
                                    <hr class="mb-3">
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
                                            <td>Rp.{{ number_format($t->saldo, 0, ',', '.') }}</td>
                                            <td>{{ $t->user->name }}</td>
                                        </tr>
                                        @endforeach
                                    </x-table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        @endif
    </div>

    {{-- Chart Script --}}
    @if(isset($chart))
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}
    @endif
</x-app-layout>
