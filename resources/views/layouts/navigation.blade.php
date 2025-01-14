<!-- component -->
@hasrole('admin|kepala sekolah')
<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
  <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
    <div class="flex items-center justify-center h-40 border-b">
        <x-application-logo class="block h-20 w-auto fill-current text-green-600 dark:text-gray-200" />
        <br>
    </div>
    <!-- Pastikan bagian ini menggunakan flex-grow flex flex-col -->
    <div class="overflow-y-auto overflow-x-hidden flex-grow flex flex-col">
      <ul class="flex flex-col py-4 space-y-1 h-full">
        <li class="px-5">
          <div class="flex flex-row items-center h-8">
            <div class="text-sm font-light tracking-wide text-gray-800">{{ Auth::user()->name }}</div>
          </div>
        </li>
        <li class="px-5">
          <div class="flex flex-row items-center h-8">
            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
          </div>
        </li>
        <li> 
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Beranda</span>
          </x-nav-link>
        </li>
        <li> 
          <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.index') || request()->routeIs('siswa.create') || request()->routeIs('siswa.edit')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" height="200px" width="200px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M116.738,231.551c0,23.245,14.15,43.315,34.513,49.107c15.262,42.368,55.574,70.776,100.582,70.776 s85.32-28.408,100.58-70.776c20.365-5.792,34.515-25.854,34.515-49.107c0-15.691-6.734-30.652-18.061-40.248l1.661-8.921 c0-3.323-0.229-6.568-0.491-9.821l-0.212-2.593l-2.213,1.374c-30.871,19.146-80.885,27.71-116.754,27.71 c-34.85,0-83.895-8.214-114.902-26.568l-2.259-0.59l-0.188,2.554c-0.192,2.632-0.384,5.256-0.357,8.23l1.632,8.649 C123.466,200.923,116.738,215.876,116.738,231.551z"></path> <path class="st0" d="M356.151,381.077c-9.635-5.97-18.734-11.607-26.102-17.43l-0.937-0.738l-0.972,0.691 c-6.887,4.914-31.204,30.17-51.023,51.172l-10.945-21.273l5.697-4.076v-20.854h-40.07v20.854l5.697,4.076l-10.949,21.281 c-19.825-21.009-44.154-46.265-51.034-51.18l-0.973-0.691l-0.937,0.738c-7.368,5.823-16.469,11.46-26.102,17.43 c-30.029,18.61-64.062,39.697-64.062,77.344c0,22.244,52.241,53.579,168.388,53.579c116.146,0,168.388-31.335,168.388-53.579 C420.213,420.774,386.178,399.687,356.151,381.077z"></path> <path class="st0" d="M131.67,131.824c0,18.649,56.118,42.306,119.188,42.306s119.188-23.656,119.188-42.306v-25.706l43.503-17.702 v55.962c-5.068,0.792-8.964,5.186-8.964,10.45c0,4.503,2.966,8.432,7.242,9.852l-8.653,57.111h40.704l-8.651-57.111 c4.27-1.421,7.232-5.35,7.232-9.852c0-5.295-3.919-9.697-9.014-10.466l-0.21-67.197c0.357-0.621,0.357-1.266,0.357-1.607 c0-0.342,0-0.978-0.149-0.978h-0.002c-0.262-2.446-2.011-4.612-4.56-5.652l-11.526-4.72L267.551,3.238 C262.361,1.118,256.59,0,250.858,0s-11.502,1.118-16.69,3.238L72.834,68.936c-2.863,1.172-4.713,3.773-4.713,6.622 c0,2.842,1.848,5.443,4.716,6.63l58.833,23.928V131.824z"></path> </g> </g></svg>
            </span>
            @if(auth()->user()->hasRole('admin'))
            <span class="ml-2 text-sm tracking-wide truncate">Kelola Siswa</span>
            @else
            <span class="ml-2 text-sm tracking-wide truncate">Laporan Data Siswa</span>
            @endif
          </x-nav-link>
        </li>
        <li>
            <x-nav-link  :active="request()->routeIs('tabungan*')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                    <svg viewBox="0 0 1024 1024" class="icon w-5 h-5" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M365.44 256.34h-57.05c57.54-45.47 128.96-71.11 203.27-71.11 160.55 0 296.58 114.66 323.45 272.64l72.1-12.25C874.34 252.36 707.99 112.1 511.66 112.1c-93.89 0-184.01 33.48-255.5 92.6v-56.23h-73.13v181.01h182.42v-73.14zM658.2 767.73h59.92c-58.07 47.06-130.82 73.7-206.47 73.7-160.66 0-296.69-114.75-323.49-272.87l-72.1 12.21c32.76 193.42 199.13 333.79 395.59 333.79 93.97 0 184.29-33.57 255.84-92.84v53.9h73.13V694.6H658.2v73.13z" fill="#0F1F3C"></path><path d="M582.53 389.14l-70.4 70.39-70.38-70.39-38.78 38.78 50.42 50.42h-39.23v54.85h70.54v23.91h-68.34v54.85h68.34v65.92h54.85v-65.92h68.37V557.1h-68.37v-23.91h70.56v-54.85h-39.23l50.43-50.42z" fill="#0F1F3C"></path></g></svg>
                </span>
                @if(auth()->user()->hasRole('admin'))
                <span class="ml-2 text-sm tracking-wide truncate">Kelola Tabungan</span>
                @endif
                @if(auth()->user()->hasRole('kepala sekolah'))
                <span class="ml-2 text-sm tracking-wide truncate">Laporan Data Tabungan</span>
                @endif
            </x-nav-link>

            <!-- Sub-menu kelas -->
            <ul class="ml-8 mt-2">
                @php
                    $kelas = App\Models\Kelas::withCount('siswa')->get();
                    $kelasDenganSiswa = $kelas->filter(fn($k) => $k->siswa_count > 0);
                @endphp
                
                @forelse ($kelasDenganSiswa as $kelasItem)
                    <li class="ml-1 text-sm text-gray-600 hover:text-gray-800">
                    
                    <x-nav-link :href="route('tabungan.kelas', ['kelas' => $kelasItem->id])"
                        :active="(request()->route('kelas') instanceof \App\Models\Kelas 
                        ? request()->route('kelas')->id 
                        : (string) request()->route('kelas')) == (string) $kelasItem->id"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-2">
                            <svg viewBox="0 0 1024 1024" class="icon w-5 h-5" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M427.84 547.52a193.6 193.6 0 1 0-193.6-193.6 193.92 193.92 0 0 0 193.6 193.6z m0-323.52a129.6 129.6 0 1 1-129.6 129.6A129.92 129.92 0 0 1 427.84 224zM822.72 937.28a32 32 0 0 0-45.44 0 32 32 0 0 0-6.72 10.56A32 32 0 0 0 768 960a32 32 0 1 0 64 0 32 32 0 0 0-2.56-12.16 32 32 0 0 0-6.72-10.56zM672 928h-128a32 32 0 0 0 0 64h128a32 32 0 0 0 0-64z" fill="#231815"></path><path d="M776.96 861.76h2.24a32 32 0 0 0 4.8-3.52l3.84-3.2a32 32 0 0 0 3.84-5.76 20.16 20.16 0 0 0 4.16-10.88 32 32 0 0 0 0-5.76 32 32 0 0 0 0-6.4 30.08 30.08 0 0 0 0-4.8 394.56 394.56 0 0 0-367.36-256A400.64 400.64 0 0 0 32 960a32 32 0 0 0 32 32h352a32 32 0 0 0 0-64H98.56a335.04 335.04 0 0 1 329.28-299.84A330.88 330.88 0 0 1 736 843.52v2.56a32 32 0 0 0 15.04 14.4h1.6a28.48 28.48 0 0 0 23.04 0zM565.76 124.8a110.08 110.08 0 1 1 123.84 179.84 32 32 0 1 0 28.8 57.28 174.08 174.08 0 1 0-196.16-284.16 32 32 0 1 0 43.52 47.04zM675.2 389.44a32 32 0 0 0-6.4 64 293.44 293.44 0 0 1 256 256H832a32 32 0 0 0 0 64h128a32 32 0 0 0 32-32 359.36 359.36 0 0 0-316.8-352z" fill="#231815"></path></g></svg>
                        </span>
                            <span class="ml-2 text-sm tracking-wide truncate"> {{ $kelasItem->nama_kelas }}</span>
                        </x-nav-link>
                    </li>
                @empty
                    <li class="ml-4 text-sm text-gray-500">
                        Tidak ada kelas untuk dikelola
                    </li>
                @endforelse
            </ul>
        </li>
        <li> 
          <x-nav-link :href="route('laporan.keseluruhan')" :active="request()->routeIs('laporan.keseluruhan')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-5 h-5" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>report-linechart</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="add" fill="#000000" transform="translate(42.666667, 85.333333)"> <path d="M341.333333,1.42108547e-14 L426.666667,85.3333333 L426.666667,341.333333 L3.55271368e-14,341.333333 L3.55271368e-14,1.42108547e-14 L341.333333,1.42108547e-14 Z M330.666667,42.6666667 L42.6666667,42.6666667 L42.6666667,298.666667 L384,298.666667 L384,96 L330.666667,42.6666667 Z M106.666667,85.3333333 L106.666333,217.591333 L167.724208,141.269742 L232.938667,173.866667 L280.864376,130.738196 L295.135624,146.595138 L236.398693,199.458376 L173.589333,168.064 L120.324333,234.666333 L341.333333,234.666667 L341.333333,256 L85.3333333,256 L85.3333333,85.3333333 L106.666667,85.3333333 Z" id="Combined-Shape"> </path> </g> </g> </g></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Laporan Keseluruhan</span>
          </x-nav-link>
        </li>
        <br>
        <li class="mt-auto">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" class="relative flex flex-row items-center h-11 focus:outline-none bg-red-400 hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6"
                onclick="event.preventDefault();
                         this.closest('form').submit();">
              <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
              </span>
              {{ __('Logout') }}
            </x-responsive-nav-link>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>

@else
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
               
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard Siswa') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

@endhasrole