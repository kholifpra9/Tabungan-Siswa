<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengelolaan Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->user()->hasRole('admin'))
                    <x-primary-button tag="a" href="{{ route('siswa.create') }}">Tambah Siswa</x-primary-button>
                    @endif
                    <x-primary-button tag="a" href="{{ route('pdf.siswaPrint') }}">Cetak PDF</x-primary-button>
                    <br>
                    <br>
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num=1 @endphp
                        @foreach($siswas as $s)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$s->nis}}</td>
                            <td>{{$s->nama}}</td>
                            <td>{{$s->kelas->nama_kelas}}</td>
                            <td>{{$s->tanggal_lahir}}</td>
                          
                            <td>
                                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'siswa-detail'); $dispatch('load-siswa-detail', {{$s->nis}})"> 
                                    {{ __('Detail') }}
                                </x-primary-button>
                                @if(auth()->user()->hasRole('admin'))
                                <x-primary-button tag="a" href="{{ route('siswa.edit', $s->nis) }}">Edit</x-primary-button>
                                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal',
                                    'confirm-siswa-deletion')" x-on:click="$dispatch('set-action',
                                    '{{ route('siswa.destroy', $s->nis) }}')"> {{ __('Delete')}}
                                </x-danger-button>
                                @endif
                            </td>
                        </tr>
                     
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<x-modal name="siswa-detail" focusable maxWidth="xl">
    <div class="p-6">
        <!-- Judul Modal -->
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">
            {{ __('Detail Siswa') }}
        </h2>

        <!-- Konten Siswa -->
        <div id="siswa-detail-content">
            <p class="text-gray-500">{{ __('Loading...') }}</p>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Close') }}
            </x-secondary-button>

        
        </div>
    </div>
</x-modal>

<x-modal name="confirm-siswa-deletion" focusable maxWidth="xl">
            <form method="post" x-bind:action="action" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Apakah anda yakin akan menghapus data?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Setelah proses dilakukan. Data akan dihilangkan secara permanen.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete Data') }}
                    </x-danger-button>
                </div>
            </form>
</x-modal>

<script>
    document.addEventListener('load-siswa-detail', (event) => {
        const siswaId = event.detail;
        fetch(`/siswa/${siswaId}`)
            .then((response) => response.json())
            .then((data) => {
                // Format data siswa dengan gaya yang lebih rapi
                document.querySelector('#siswa-detail-content').innerHTML = `
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <span class="font-semibold w-1/3">{{ __('NIS') }}:</span>
                            <span>${data.nis}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-1/3">{{ __('Nama') }}:</span>
                            <span>${data.nama}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-1/3">{{ __('Kelas') }}:</span>
                            <span>${data.kelas.nama_kelas}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-1/3">{{ __('Tanggal Lahir') }}:</span>
                            <span>${data.tanggal_lahir}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-1/3">{{ __('Alamat') }}:</span>
                            <span>${data.alamat}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-1/3">{{ __('No Hp') }}:</span>
                            <span>${data.no_hp}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-1/3">{{ __('Nama Ortu') }}:</span>
                            <span>${data.nama_ortu}</span>
                        </div>
                    </div>
                `;
            });
    });
</script>