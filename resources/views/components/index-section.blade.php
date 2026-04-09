@props(['title', 'createUrl' => null, 'createLabel' => 'Tambah'])

<x-slot name="header">
    <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-100 leading-tight">
        {{ $title }}
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

        @if (session('error'))
            <div x-data="{ show: true }" x-show="show"
                class="flex items-center justify-between bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-100 border border-red-300 dark:border-red-700 px-4 py-3 rounded-lg shadow-sm"
                role="alert">
                <span class="font-medium">{{ session('error') }}</span>
                <button @click="show = false"
                    class="text-lg font-bold hover:text-red-900 dark:hover:text-red-200">&times;</button>
            </div>
        @endif

        {{-- Tombol Tambah --}}
        @if ($createUrl)
            <div class="flex justify-end">
                <a href="{{ $createUrl }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 h-4 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ $createLabel }}
                </a>
            </div>
        @endif

        {{ $slot }}
    </div>
</div>
