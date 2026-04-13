<div x-data="{ sidebarOpen: false }" class="relative">

    <div class="flex items-center justify-between w-full h-16 px-4 bg-white border-b border-gray-200 sm:hidden dark:bg-gray-800 dark:border-gray-700 shadow-sm fixed top-0 z-20">
        <div class="flex items-center">
            <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
            <span class="ml-2 font-semibold text-gray-800 dark:text-gray-200">Sistem Absensi</span>
        </div>
        <button @click="sidebarOpen = true" class="p-2 text-gray-500 focus:outline-none hover:text-gray-700 hover:bg-gray-100 rounded-md dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-black/50 sm:hidden transition-opacity duration-300" x-cloak></div>

    <nav :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
         class="fixed inset-y-0 left-0 z-40 w-64 px-4 py-6 overflow-y-auto transition duration-300 transform bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 sm:translate-x-0 flex flex-col shadow-lg pt-20 sm:pt-6">
        
        <div class="absolute top-4 right-4 sm:hidden">
            <button @click="sidebarOpen = false" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="flex items-center justify-center mb-8 shrink-0">
            <a href="{{ route('basecamp') }}" class="flex items-center hover:opacity-80 transition-opacity duration-200">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-800 dark:text-gray-200" />
                <span class="ml-3 text-lg font-bold text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                    Sistem Absensi
                </span>
            </a>
        </div>

        <div class="flex flex-col flex-1 space-y-1.5 mt-2">

            {{-- Guru Piket dan kurikulum --}}
            @if (auth()->user()->role === 'guru_piket' || auth()->user()->role === 'kurikulum')
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                    {{ __('Dashboard') }}
                </a>
                @if (auth()->user()->role === 'guru_piket')
                    <a href="{{ route('guru-piket.kelas.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs(['guru-piket.kelas.*', 'guru-piket.jadwal.*']) ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        {{ __('Kelas & Jadwal') }}
                    </a>
                    <a href="{{ route('guru-piket.mapel.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('guru-piket.mapel.*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        {{ __('Mapel') }}
                    </a>
                    <a href="{{ route('guru-piket.guru.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('guru-piket.guru*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        {{ __('Guru') }}
                    </a>
                    <a href="{{ route('guru-piket.shift.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('guru-piket.shift.*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        {{ __('Shift & Jam Mapel') }}
                    </a>
                    <a href="{{ route('guru-piket.absensi') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('guru-piket.absensi') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        {{ __('Absensi Guru') }}
                    </a>
                    <a href="{{ route('guru-piket.sistem-otomatis.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('guru-piket.sistem-otomatis.index') ? 'bg-green-50 text-green-700 dark:bg-green-900/50 dark:text-green-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        {{ __('Sistem Absensi Otomatis') }}
                    </a>
                @endif

            {{-- Kelas Siswa --}}
            @elseif (auth()->user()->role === 'kelas_siswa')
                <a href="{{ route('kelas-siswa.jadwal.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('kelas-siswa.jadwal.*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                    {{ __('Jadwal Mapel') }}
                </a>
                <a href="{{ route('kelas-siswa.qr-generate.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('kelas-siswa.qr-generate.*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                    {{ __('Generate QR') }}
                </a>

            {{-- Guru Mapel --}}
            @elseif (auth()->user()->role === 'guru_mapel')
                <a href="{{ route('guru-mapel.jadwal.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('guru-mapel.jadwal.*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                    {{ __('Jadwal Mengajar') }}
                </a>
                <a href="{{ route('guru-mapel.rekap-absensi') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('guru-mapel.rekap-absensi') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                    {{ __('Rekap Absensi') }}
                </a>
                <a href="{{ route('guru-mapel.scan-qr.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('guru-mapel.scan-qr.*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                    {{ __('Absen') }}
                </a>
            @endif
        </div>

        <div class="pt-4 pb-2 mt-6 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center px-4 mb-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 p-1 bg-gray-100 rounded-full text-gray-500 dark:bg-gray-700 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="ml-3 overflow-hidden">
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-900/20 dark:hover:text-blue-400 transition-colors">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                {{ __('Profile') }}
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center px-4 py-2 mt-1 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 dark:text-red-500 dark:hover:bg-red-900/20 transition-colors">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </nav>
</div>