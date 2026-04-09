    <nav x-data="{ open: false }"
        class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-lg">
        <!-- Primary Navigation Menu -->
        <div class="max-w-screen-2xl mx-auto px-2 sm:px-4 lg:px-6">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo + Teks -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('basecamp') }}"
                            class="flex items-center hover:opacity-80 transition-opacity duration-200">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                            <span
                                class="ml-2 text-lg font-semibold text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                Sistem Absensi Guru
                            </span>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-4 sm:-my-px sm:ms-8 sm:flex items-center justify-center flex-1">

                        {{-- Guru Piket dan kurikulum --}}
                        @if (auth()->user()->role === 'guru_piket' || auth()->user()->role === 'kurikulum')
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            @if (auth()->user()->role === 'guru_piket')
                                <x-nav-link :href="route('guru-piket.kelas.index')" :active="request()->routeIs(['guru-piket.kelas.*', 'guru-piket.jadwal.*'])">
                                    {{ __('Kelas & Jadwal') }}
                                </x-nav-link>
                                <x-nav-link :href="route('guru-piket.mapel.index')" :active="request()->routeIs('guru-piket.mapel.*')">
                                    {{ __('Mapel') }}
                                </x-nav-link>
                                <x-nav-link :href="route('guru-piket.guru.index')" :active="request()->routeIs('guru-piket.guru*')">
                                    {{ __('Guru') }}
                                </x-nav-link>
                                <x-nav-link :href="route('guru-piket.shift.index')" :active="request()->routeIs('guru-piket.shift.*')">
                                    {{ __('Shift & Jam Mapel') }}
                                </x-nav-link>
                                <x-nav-link :href="route('guru-piket.absensi')" :active="request()->routeIs('guru-piket.absensi')">
                                    {{ __('Absensi Guru') }}
                                </x-nav-link>
                                <x-nav-link :href="route('guru-piket.sistem-otomatis.index')" :active="request()->routeIs('guru-piket.sistem-otomatis.index')">
                                    {{ __('Sistem Absensi Otomatis') }}
                                </x-nav-link>
                            @endif
                        @elseif (auth()->user()->role === 'kelas_siswa')
                            <x-nav-link :href="route('kelas-siswa.jadwal.index')" :active="request()->routeIs('kelas-siswa.jadwal.*')">
                                {{ __('Jadwal Mapel') }}
                            </x-nav-link>
                            <x-nav-link :href="route('kelas-siswa.qr-generate.index')" :active="request()->routeIs('kelas-siswa.qr-generate.*')">
                                {{ __('Generate QR') }}
                            </x-nav-link>
                        @elseif (auth()->user()->role === 'guru_mapel')
                            <x-nav-link :href="route('guru-mapel.jadwal.index')" :active="request()->routeIs('guru-mapel.jadwal.*')">
                                {{ __('Jadwal Mengajar') }}
                            </x-nav-link>
                            <x-nav-link :href="route('guru-mapel.rekap-absensi')" :active="request()->routeIs('guru-mapel.rekap-absensi')">
                                {{ __('Rekap Absensi') }}
                            </x-nav-link>
                            <x-nav-link :href="route('guru-mapel.scan-qr.index')" :active="request()->routeIs('guru-mapel.scan-qr.*')">
                                {{ __('Absen') }}
                            </x-nav-link>
                        @endif

                        {{-- guru-mapel.jadwal.index --}}
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-4">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm leading-4 font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 hover:border-gray-400 dark:hover:border-gray-500 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out transform hover:scale-105 hover:-translate-y-0.5">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    <span class="truncate max-w-32">{{ Auth::user()->name }}</span>
                                </div>

                                <div class="ms-2 transition-transform duration-200" :class="{ 'rotate-180': open }">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')"
                                class="flex items-center hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="flex items-center hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150">
                                    <svg class="w-4 h-4 mr-3 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 focus:text-gray-500 transition-all duration-200 ease-in-out transform hover:scale-105">
                        <svg class="h-6 w-6 transition-transform duration-200" :class="{ 'rotate-90': open }"
                            stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }"
                                class="inline-flex transition-opacity duration-200" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }"
                                class="hidden transition-opacity duration-200" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }"
            class="hidden sm:hidden bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 border-t border-gray-200 dark:border-gray-700 transition-all duration-300 ease-in-out overflow-hidden">
            <div class="pt-2 pb-3 space-y-1 px-2" x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-2">
                {{-- Guru Piket --}}
                @if (auth()->user()->role === 'guru_piket' || auth()->user()->role === 'kurikulum')
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('guru-piket.kelas.index')" :active="request()->routeIs(['guru-piket.kelas.*', 'guru-piket.jadwal.*'])"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Kelas & Jadwal') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('guru-piket.mapel.index')" :active="request()->routeIs('guru-piket.mapel.*')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Mapel') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('guru-piket.guru.index')" :active="request()->routeIs('guru-piket.guru.*')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Guru') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('guru-piket.shift.index')" :active="request()->routeIs(['guru-piket.shift.*', 'guru-piket.jam-mapel.*'])"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Shift & Jam Mapel') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('guru-piket.absensi')" :active="request()->routeIs('guru-piket.absensi.index')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Absensi Guru') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('guru-piket.sistem-otomatis.index')" :active="request()->routeIs('guru-piket.sistem-otomatis.index')"
                        class="hover:bg-green-50 dark:hover:bg-green-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Sistem Absensi Otomatis') }}
                    </x-responsive-nav-link>
                @elseif (auth()->user()->role === 'kelas_siswa')
                    <x-responsive-nav-link :href="route('kelas-siswa.jadwal.index')" :active="request()->routeIs('kelas-siswa.jadwal.*')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Jadwal Mapel') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('kelas-siswa.qr-generate.index')" :active="request()->routeIs('kelas-siswa.qr-generate.*')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Generate QR') }}
                    </x-responsive-nav-link>
                @elseif (auth()->user()->role === 'guru_mapel')
                    <x-responsive-nav-link :href="route('guru-mapel.jadwal.index')" :active="request()->routeIs('guru-mapel.jadwal.*')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Jadwal Mengajar') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('guru-mapel.rekap-absensi')" :active="request()->routeIs('guru-mapel.rekap-absensi')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Rekap Absensi') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('guru-mapel.scan-qr.index')" :active="request()->routeIs('guru-mapel.scan-qr.*')"
                        class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 transform hover:translate-x-1">
                        {{ __('Absen') }}
                    </x-responsive-nav-link>
                @endif
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800">
                <div class="px-2 py-2">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                                {{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                                {{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 space-y-1 px-2">
                    <x-responsive-nav-link :href="route('profile.edit')"
                        class="flex items-center hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors duration-150">
                        <svg class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="flex items-center hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150">
                            <svg class="w-4 h-4 mr-3 text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
