<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            Kelola Sistem Absensi Otomatis
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-2xl p-6 space-y-6">

                @if (session('success'))
                    <div
                        class="p-3 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100 rounded-lg text-sm font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="space-y-4">
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-5">
                        <p class="text-sm text-gray-600 dark:text-gray-300">Status sistem absensi otomatis saat ini:</p>
                        <p
                            class="mt-2 text-lg font-semibold {{ $sistem->enabled ? 'text-green-700 dark:text-green-300' : 'text-red-700 dark:text-red-300' }}">
                            {{ $sistem->enabled ? 'Aktif' : 'Nonaktif' }}
                        </p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <form method="POST" action="{{ route('guru-piket.sistem-otomatis.enable') }}">
                            @csrf
                            <x-primary-button type="submit" class="w-full">
                                Nyalakan Sistem Otomatis
                            </x-primary-button>
                        </form>

                        <form method="POST" action="{{ route('guru-piket.sistem-otomatis.disable') }}">
                            @csrf
                            <x-danger-button type="submit" class="w-full">
                                Matikan Sistem Otomatis
                            </x-danger-button>
                        </form>
                    </div>

                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-5">
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Ketika sistem dimatikan, proses absensi otomatis tidak akan dijalankan.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
