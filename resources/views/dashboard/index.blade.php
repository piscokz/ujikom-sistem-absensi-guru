<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-100">
            Statistik Absensi Guru
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- Filter + Tombol -->
        <form method="GET" action="{{ route('dashboard') }}"
            class="bg-white dark:bg-slate-800 rounded-2xl shadow-md p-4 sm:p-6 flex flex-col md:flex-row md:items-end md:justify-between gap-4 transition">

            <div class="flex flex-col sm:flex-row gap-4 w-full">
                <div class="flex flex-col w-full sm:w-1/2 md:w-auto">
                    <label for="start_date" class="text-sm font-medium text-slate-700 dark:text-slate-300">Dari</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $start }}"
                        class="mt-1 rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>

                <div class="flex flex-col w-full sm:w-1/2 md:w-auto">
                    <label for="end_date" class="text-sm font-medium text-slate-700 dark:text-slate-300">Sampai</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $end }}"
                        class="mt-1 rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>
            </div>

            <div class="flex flex-wrap gap-3 md:justify-end">
                <button type="submit"
                    class="flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg shadow transition">
                    🔍 Filter
                </button>

                {{-- @if (auth()->user()->role === 'guru_piket')
                    <a href="{{ route('guru-piket.sistem-otomatis.index') }}"
                        class="flex items-center justify-center gap-2 px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white font-medium text-sm rounded-lg shadow transition">
                        ⚙️ Kelola Sistem Otomatis
                    </a>
                @endif --}}

                <a href="{{ route('dashboard.statistik.pdf', request()->query()) }}"
                    class="flex items-center justify-center gap-2 px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white font-medium text-sm rounded-lg shadow transition">
                    🧾 Ekspor PDF
                </a>
            </div>
        </form>

        <!-- Ringkasan -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 text-center">
            <div
                class="bg-green-50 dark:bg-green-900/40 p-5 rounded-2xl shadow hover:shadow-lg hover:scale-105 transition-all duration-300 border border-green-200 dark:border-green-800">
                <p class="text-3xl font-bold text-green-700 dark:text-green-300">{{ $totalHadir }}</p>
                <p class="text-sm text-slate-600 dark:text-slate-300">Total Hadir</p>
            </div>

            <div
                class="bg-rose-50 dark:bg-rose-900/40 p-5 rounded-2xl shadow hover:shadow-lg hover:scale-105 transition-all duration-300 border border-rose-200 dark:border-rose-800">
                <p class="text-3xl font-bold text-rose-700 dark:text-rose-300">{{ $totalTidakHadir }}</p>
                <p class="text-sm text-slate-600 dark:text-slate-300">Total Tidak Hadir</p>
            </div>

            <div
                class="col-span-2 bg-indigo-50 dark:bg-indigo-900/40 p-5 rounded-2xl shadow hover:shadow-lg hover:scale-105 transition-all duration-300 border border-indigo-200 dark:border-indigo-800">
                <p class="text-base sm:text-lg text-indigo-800 dark:text-indigo-200 font-semibold">
                    Periode:
                    <br class="sm:hidden">
                    {{ \Carbon\Carbon::parse($start)->translatedFormat('d M Y') }}
                    –
                    {{ \Carbon\Carbon::parse($end)->translatedFormat('d M Y') }}
                </p>
            </div>
        </div>

        <!-- Status Sistem Absensi Otomatis -->
        @if (auth()->user()->role === 'guru_piket')
            <div
                class="bg-white dark:bg-slate-800 rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300 p-5 sm:p-8">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-4">Status Sistem Absensi Otomatis
                </h3>
                <div
                    class="text-center p-4 rounded-xl bg-slate-50 dark:bg-slate-700/50 hover:bg-slate-100 dark:hover:bg-slate-600/50 transition-colors duration-300">
                    <p class="text-sm text-slate-600 dark:text-slate-300 mb-2">Status Saat Ini</p>
                    @if ($sistemOtomatis->enabled)
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Aktif
                        </span>
                    @else
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Nonaktif
                        </span>
                    @endif
                </div>
            </div>
        @endif

        <!-- Grafik -->
        <div
            class="bg-white dark:bg-slate-800 rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300 p-5 sm:p-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-100">Grafik Kehadiran</h3>
            </div>

            <div class="relative h-[300px] sm:h-[400px] animate-fade-in">
                <canvas id="absensiChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        const ctx = document.getElementById('absensiChart');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($stats->pluck('tanggal')),
                datasets: [{
                        label: 'Hadir',
                        data: @json($stats->pluck('hadir')),
                        borderColor: 'rgb(34,197,94)',
                        backgroundColor: 'rgba(34,197,94,0.15)',
                        fill: true,
                        tension: 0.35,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    },
                    {
                        label: 'Tidak Hadir',
                        data: @json($stats->pluck('tidak_hadir')),
                        borderColor: 'rgb(239,68,68)',
                        backgroundColor: 'rgba(239,68,68,0.15)',
                        fill: true,
                        tension: 0.35,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: '#9ca3af'
                        },
                        grid: {
                            color: 'rgba(156,163,175,0.1)'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#9ca3af'
                        },
                        grid: {
                            color: 'rgba(156,163,175,0.1)'
                        }
                    },
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#475569',
                            font: {
                                size: 13
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        titleColor: '#fff',
                        bodyColor: '#e2e8f0',
                        padding: 10,
                        cornerRadius: 8,
                    }
                }
            }
        });
    </script>
</x-app-layout>
