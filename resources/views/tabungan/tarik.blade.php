<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tarik Tunai Tabungan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <p>NIS : {{ $siswa->nis }}</p>
                    <p>Nama : {{ $siswa->nama }}</p>
                    <p>Kelas : {{ $siswa->kelas->nama_kelas }}</p>
                    <p>Saldo Tabungan : Rp. {{ number_format($tabungan->saldo, 0, ',', '.') }}</p>
                    <!-- <p>id : {{ $kelas_id }}</p> -->
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('tabungan.store_tarik') }}" class="mt-6 space-y-6">
                        @csrf
                        
                        <input type="hidden" name="tabungan_id" value="{{ $tabungan->id }}">

                        <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">

                        
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="max-w-xl">
                            <x-input-label for="Tanggal" value="Tanggal" />
                            <input type="date" readonly name="tanggal" value="{{ now()->toDateString() }}">
                        </div>
                        

                        <div class="max-w-xl">
                            <x-input-label for="nominal" value="Nominal Tarik Tunai" />
                            <x-text-input id="nominal" type="number" name="nominal" class="mt-1 block w-full" 
                                        value="{{ old('nominal') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="kategori" value="Kategori Penarikan" />
                            <select id="kategori" name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <!-- Opsi kosong -->
                                <option value="" selected disabled>Pilih Kategori</option>
                                
                                <!-- Default: Kebutuhan Pribadi -->
                                
                                <!-- Penarikan Terkait Pendidikan -->
                                <option value="Pembayaran Seragam" {{ old('kategori') == 'Pembayaran Seragam' ? 'selected' : '' }}>
                                    Pembayaran Seragam
                                </option>
                                <option value="Pembayaran Buku LKS" {{ old('kategori') == 'Pembayaran Buku LKS' ? 'selected' : '' }}>
                                    Pembayaran Buku LKS
                                </option>
                                <option value="Biaya Semester" {{ old('kategori') == 'Biaya Semester' ? 'selected' : '' }}>
                                    Biaya Semester
                                </option>
                                <option value="Biaya Ujian" {{ old('kategori') == 'Biaya Ujian' ? 'selected' : '' }}>
                                    Biaya Ujian
                                </option>
                                <option value="Pembayaran Buku Pelajaran" {{ old('kategori') == 'Pembayaran Buku Pelajaran' ? 'selected' : '' }}>
                                    Pembayaran Buku Pelajaran
                                </option>
                                
                                <!-- Acara Khusus -->
                                <option value="Study Tour" {{ old('kategori') == 'Study Tour' ? 'selected' : '' }}>
                                    Study Tour
                                </option>
                                <option value="Biaya Wisuda" {{ old('kategori') == 'Biaya Wisuda' ? 'selected' : '' }}>
                                    Biaya Wisuda
                                </option>
                                <option value="Pendaftaran Lomba/Olimpiade" {{ old('kategori') == 'Pendaftaran Lomba/Olimpiade' ? 'selected' : '' }}>
                                    Pendaftaran Lomba/Olimpiade
                                </option>
                                
                                <!-- Infrastruktur -->
                                <option value="Iuran Pembangunan" {{ old('kategori') == 'Iuran Pembangunan' ? 'selected' : '' }}>
                                    Iuran Pembangunan
                                </option>
                                <option value="Renovasi Kelas" {{ old('kategori') == 'Renovasi Kelas' ? 'selected' : '' }}>
                                    Renovasi Kelas
                                </option>
                                
                                <!-- Kategori Lain -->
                                <option value="Sumbangan" {{ old('kategori') == 'Sumbangan' ? 'selected' : '' }}>
                                    Sumbangan
                                </option>
                            </select>

                        </div>
                        
                        <div class="max-w-xl">
                            <x-input-label for="detail_penarikan" value="Detail Penarikan" />
                            <x-text-input id="detail_penarikan" type="text" placeholder="Masukan Detail Penarikan (opsional)" name="detail_penarikan" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('detail_penarikan')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" readonly name="keterangan" class="mt-1 block w-full" 
                                        value="tarik" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>

                        <!-- Tombol -->
                        <x-secondary-button tag="a" href="{{route('tabungan.kelas', $kelas_id)}}">Cancel</x-secondary-button>
                        
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>