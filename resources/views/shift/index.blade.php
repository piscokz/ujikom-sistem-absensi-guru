<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-100">
            Manajemen Shift
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Notifikasi --}}
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show"
                    class="flex items-center justify-between bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-100 border border-green-300 dark:border-green-700 px-4 py-3 rounded-lg shadow-sm"
                    role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                    <button @click="show = false"
                        class="text-lg font-bold hover:text-green-900 dark:hover:text-green-200">&times;</button>
                </div>
            @endif

            {{-- Tombol Tambah Shift --}}
            <div class="flex justify-end">
                <a href="{{ route('guru-piket.shift.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 h-4 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Shift
                </a>
            </div>

            {{-- Tampilan Mobile (Card View) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:hidden gap-4">
                @forelse ($shifts as $shift)
                    <div
                        class="bg-white dark:bg-slate-800 p-5 rounded-2xl shadow hover:shadow-lg hover:scale-105 transition-all duration-300 border border-slate-200 dark:border-slate-700">
                        <div class="mb-3">
                            <h3 class="text-lg font-semibold text-slate-800 dark:text-white">
                                {{ $shift->nama }}
                            </h3>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <a href="{{ route('guru-piket.shift.jam-mapel.index', $shift) }}"
                                class="px-3 py-1.5 bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-200 rounded-md hover:bg-blue-200 dark:hover:bg-blue-700 transition text-sm">
                                Jam Mapel
                            </a>
                            <a href="{{ route('guru-piket.shift.edit', $shift) }}"
                                class="px-3 py-1.5 bg-indigo-100 text-indigo-700 dark:bg-indigo-800 dark:text-indigo-200 rounded-md hover:bg-indigo-200 dark:hover:bg-indigo-700 transition text-sm">
                                Edit
                            </a>
                            <form action="{{ route('guru-piket.shift.destroy', $shift) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus shift ini? (semua data yang berhubungan akan dihapus)');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1.5 bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200 rounded-md hover:bg-red-200 dark:hover:bg-red-700 transition text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-slate-500 dark:text-slate-400 py-6">
                        Belum ada shift yang terdaftar.
                    </div>
                @endforelse
            </div>

            {{-- Tampilan Desktop (Table View) --}}
            <div class="hidden lg:block bg-white dark:bg-slate-800 overflow-hidden shadow-sm rounded-2xl">
                <div class="p-6">
                    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                        <thead class="bg-slate-50 dark:bg-slate-900/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Nama
                                    Shift</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                            @forelse ($shifts as $shift)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                    <td class="px-6 py-4 text-sm text-slate-700 dark:text-slate-200">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-slate-800 dark:text-slate-100">
                                        {{ $shift->nama }}
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-medium">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('guru-piket.shift.jam-mapel.index', $shift) }}"
                                                class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-200 rounded-md hover:bg-blue-200 dark:hover:bg-blue-700 transition text-sm">
                                                Jam Mapel
                                            </a>
                                            <a href="{{ route('guru-piket.shift.edit', $shift) }}"
                                                class="inline-flex items-center px-3 py-1.5 bg-indigo-100 text-indigo-700 dark:bg-indigo-800 dark:text-indigo-200 rounded-md hover:bg-indigo-200 dark:hover:bg-indigo-700 transition text-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('guru-piket.shift.destroy', $shift) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus shift ini? (semua data yang berhubungan akan dihapus)');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200 rounded-md hover:bg-red-200 dark:hover:bg-red-700 transition text-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="px-6 py-4 text-center text-slate-500 dark:text-slate-400">
                                    Belum ada shift yang terdaftar.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
