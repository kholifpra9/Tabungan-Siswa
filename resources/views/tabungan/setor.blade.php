<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setor Tunai Tabungan Harian') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <p>NIS : {{ $siswa->nis }}</p>
                    <p>Nama : {{ $siswa->nama }}</p>
                    <p>Kelas : {{ $siswa->kelas->nama_kelas }}</p>
                    <!-- <p>id : {{ $kelas_id }}</p> -->
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('tabungan.store') }}" class="mt-6 space-y-6">
                        @csrf
                        
                        <input type="hidden" name="tabungan_id" value="{{ $tabungan->id }}">

                        <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">

                        
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="max-w-xl">
                            <x-input-label for="Tanggal" value="Tanggal" />
                            <input type="date" readonly name="tanggal" value="{{ now()->toDateString() }}">
                        </div>
                        

                        <div class="max-w-xl">
                            <x-input-label for="nominal" value="Nominal Setoran" />
                            <x-text-input id="nominal" type="number" name="nominal" class="mt-1 block w-full" 
                                        value="{{ old('nominal') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" readonly name="keterangan" class="mt-1 block w-full" 
                                        value="setor" required />
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