<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-100 leading-tight">
                {{ __('Edit Mapel: ') . $mapel->nama_mapel }}
            </h2>
            <a href="{{ route('guru-piket.mapel.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-300 text-sm font-medium rounded-lg transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm rounded-2xl">
                <div class="p-6 sm:p-8">
                    <form method="POST" action="{{ route('guru-piket.mapel.update', $mapel->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Nama Mapel --}}
                        <div>
                            <x-input-label for="nama_mapel" value="Nama Mata Pelajaran"
                                class="text-sm font-medium text-slate-700 dark:text-slate-300" />
                            <x-text-input id="nama_mapel"
                                class="block mt-1 w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 focus:ring-indigo-500 focus:border-indigo-500 transition"
                                type="text" name="nama_mapel" :value="old('nama_mapel', $mapel->nama_mapel)" required autofocus
                                placeholder="Masukkan nama mata pelajaran" />
                            <x-input-error :messages="$errors->get('nama_mapel')" class="mt-2" />
                        </div>

                        {{-- Tombol Aksi --}}
                        <div
                            class="flex items-center justify-end gap-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                            <a href="{{ route('guru-piket.mapel.index') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-300 text-sm font-medium rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Batal
                            </a>
                            <x-primary-button
                                class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
