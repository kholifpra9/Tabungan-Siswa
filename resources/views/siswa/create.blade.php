<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Siswa') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('siswa.store') }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <!-- NIS -->
                            <x-input-label for="nis" value="NIS" />
                            <x-text-input id="nis" type="number" name="nis" class="mt-1 block w-full"
                                value="{{ old('nis') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                        </div>

                        <div class="max-w-xl">
                            <!-- Nama -->
                            <x-input-label for="nama" value="Nama Siswa" />
                            <x-text-input id="nama" type="text" name="nama" class="mt-1 block w-full"
                                value="{{ old('nama') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="kelas" value="Kelas" />
                            <x-select-input id="kelas" name="kelas_id" class="mt-1 block w-full" required>
                                <option value="">Open this select menu</option>
                                @foreach($kelas as $key => $value)
                                @if(old('id') == $key)
                                <option value="{{ $key }}" selected>{{$value }}</option>
                                @else
                                <option value="{{ $key }}">{{ $value}}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <!-- Tanggal Lahir -->
                            <x-input-label for="tanggal_lahir" value="Tanggal Lahir" />
                            <x-text-input id="tanggal_lahir" type="date" name="tanggal_lahir" class="mt-1 block w-full"
                                value="{{ old('tanggal_lahir') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                        </div>

                        <div class="max-w-xl">
                            <!-- Alamat -->
                            <x-input-label for="alamat" value="Alamat" />
                            <x-text-input id="alamat" name="alamat" class="mt-1 block w-full"
                                required>{{ old('alamat') }}</x-text-input>
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>

                        <div class="max-w-xl">
                            <!-- Nomor HP -->
                            <x-input-label for="no_hp" value="Nomor HP" />
                            <x-text-input id="no_hp" type="tel" name="no_hp" class="mt-1 block w-full"
                                value="{{ old('no_hp') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
                        </div>

                        <div class="max-w-xl">
                            <!-- Nama Orang Tua -->
                            <x-input-label for="nama_ortu" value="Nama Orang Tua" />
                            <x-text-input id="nama_ortu" type="text" name="nama_ortu" class="mt-1 block w-full"
                                value="{{ old('nama_ortu') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_ortu')" />
                        </div>
                        <x-secondary-button tag="a" href="{{route('siswa.index')}}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>