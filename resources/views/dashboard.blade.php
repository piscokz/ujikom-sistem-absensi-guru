<x-layout title="Dashboard">
    <x-sidebar>
        <x-sidebar-group title="Menu Utama">
            <x-sidebar-item href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" icon="home">
                Dashboard
            </x-sidebar-item>

            @if(auth()->user()->role !== 'kurikulum')
            <x-sidebar-item href="{{ route('guru.index') }}" :active="request()->routeIs('guru.*')" icon="users">
                Data Guru
            </x-sidebar-item>

            <x-sidebar-item href="{{ route('mapel.index') }}" :active="request()->routeIs('mapel.*')" icon="book-open">
                Mata Pelajaran
            </x-sidebar-item>

            <x-sidebar-item href="{{ route('shift.index') }}" :active="request()->routeIs('shift.*')" icon="clock">
                Shift
            </x-sidebar-item>

            <x-sidebar-item href="{{ route('kelas.index') }}" :active="request()->routeIs('kelas.*')" icon="building">
                Kelas
            </x-sidebar-item>
            @endif
        </x-sidebar-group>

        @if(auth()->user()->role !== 'kurikulum')
        <x-sidebar-group title="Laporan">
            <x-sidebar-item href="{{ route('absensi.index') }}" :active="request()->routeIs('absensi.*')" icon="file-bar-chart">
                Absensi
            </x-sidebar-item>

            <x-sidebar-item href="{{ route('jadwal.index') }}" :active="request()->routeIs('jadwal.*')" icon="calendar">
                Jadwal
            </x-sidebar-item>
        </x-sidebar-group>
        @endif
    </x-sidebar>

    <x-page-header title="Dashboard" description="Ringkasan sistem absensi guru">
        <x-slot name="actions">
            <x-button-action href="#" variant="secondary" icon="download-cloud">
                Export Data
            </x-button-action>
        </x-slot>
    </x-page-header>

    <div class="mt-8">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <x-stats-card title="Total Guru" :value="App\Models\Guru::count()" icon="users" color="indigo" />

            <x-stats-card title="Total Mapel" :value="App\Models\Mapel::count()" icon="book-open" color="green" />

            <x-stats-card title="Total Kelas" :value="App\Models\Kelas::count()" icon="building" color="blue" />

            <x-stats-card title="Total Shift" :value="App\Models\Shift::count()" icon="clock" color="slate" />
        </div>

        <!-- Recent Activity -->
        <div class="mt-8">
            <x-card header="Aktivitas Terbaru">
                <x-card-body>
                    <x-empty-state title="Belum ada aktivitas"
                        description="Aktivitas terbaru akan muncul di sini setelah ada perubahan data."
                        icon="clock" />
                </x-card-body>
            </x-card>
        </div>

        @if(auth()->user()->role !== 'kurikulum')
        <!-- Quick Actions -->
        <div class="mt-8">
            <x-card header="Aksi Cepat">
                <x-card-body>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        <x-button-action href="{{ route('guru.create') }}" variant="primary" icon="plus"
                            class="w-full justify-center">
                            Tambah Guru
                        </x-button-action>

                        <x-button-action href="{{ route('mapel.create') }}" variant="primary" icon="plus"
                            class="w-full justify-center">
                            Tambah Mapel
                        </x-button-action>

                        <x-button-action href="{{ route('kelas.create') }}" variant="primary" icon="plus"
                            class="w-full justify-center">
                            Tambah Kelas
                        </x-button-action>

                        <x-button-action href="{{ route('shift.create') }}" variant="primary" icon="plus"
                            class="w-full justify-center">
                            Tambah Shift
                        </x-button-action>
                    </div>
                </x-card-body>
            </x-card>
        </div>
        @endif
    </div>
</x-layout>
